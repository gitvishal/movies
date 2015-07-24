<?php
require('con.php');
$rec_limit = 10;
$lang=trim($_GET{'lan'});
$genre=trim($_GET{'gen'});
$sorts=trim($_GET{'srt'});
$query="SELECT * FROM movies";
if (strcmp($lang,'ALL') and strcmp($genre,'ALL'))
{
$query.=" WHERE id IN (SELECT movie_id FROM relationship WHERE taxonomy_id IN ";
$query.=" (SELECT id FROM category WHERE type='Language' AND value='$lang')) ";
$query.=" AND id IN ";
$query.=" (SELECT id FROM movies ";
$query.=" WHERE id IN (SELECT movie_id FROM relationship WHERE taxonomy_id IN ";
$query.=" (SELECT id FROM category WHERE type='Genre' AND value='$genre'))) ";
}
elseif (strcmp($lang,'ALL') )
{
$query.=" WHERE id IN (SELECT movie_id FROM relationship WHERE taxonomy_id IN ";
$query.=" (SELECT id FROM category WHERE type='Language' AND value='$lang'))";
}

elseif(strcmp($genre,'ALL'))
{
$query.=" WHERE id IN (SELECT movie_id FROM relationship WHERE taxonomy_id IN ";
$query.=" (SELECT id FROM category WHERE type='Genre' AND value='$genre')) ";
}
$qry_result1 = mysql_query($query) or die(mysql_error());

if(strcmp($sorts,'Freshnes'))
{
if ($sorts=='Length')
{
$val='movie_length';
}
else{
$val='movie_release';
}
$query.=" ORDER BY $val";
}


if (isset($_GET{'offset'}))
{
$lim=($_GET{'offset'}*$rec_limit);
$query.=" LIMIT  $lim, $rec_limit";
}
else
{
$query.=" LIMIT $rec_limit ";
}

$display_string = "<div>";
$qry_result = mysql_query($query) or die(mysql_error());

$display_string .= "</div>";
$display_string .= "<div>";
while($row = mysql_fetch_array($qry_result))
{
$display_string .="<div>";
$display_string .="<h3>";
$display_string .="$row[title]";
$display_string .="</h3>";
$display_string .="<p>";
$display_string .="$row[description]";
$display_string .="</p>";
$display_string .="<p>";
$display_string .="$row[movie_length]";
$display_string .="</p>";
$display_string .="<p>";
$display_string .="$row[movie_release]";

$display_string .="</p>";
$display_string .="</div>";
}
$display_string .= "</div>";
if (isset($_GET{'cnt'}))
{
echo mysql_num_rows($qry_result1);
}
else
{
echo $display_string;
}
?>
