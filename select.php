<?php
require('con.php');
$language_query="select * from category where type='Language'";
$genre_query="select * from category where type='Genre'";

$display_string = "<p>";
$display_string .= "<form name='filter_sort'>";
$display_string .= "<p><label>language</label>";
$display_string .= "<select id='language' onchange='sortAndFilterRequest();getControllersRequest();'>";
$display_string .="<option value='ALL' selected='selected'>ALL</option>";
$qry_result = $mysqli->query($language_query) or die("Error: (" . $mysqli->errno . ") " . $mysqli->error);
while($row = $qry_result->fetch_assoc()){
$display_string .="<option value = '$row[value]'>";
$display_string .="$row[value]</option>";
}

$display_string .= "</select></p>";
$display_string .= "<p><label>genre</label>";
$display_string .= "<select id = 'genre' onchange='sortAndFilterRequest();getControllersRequest();' >";
$display_string .="<option value='ALL' selected='selected'>ALL</option>";

$qry_result = $mysqli->query($genre_query) or die("Error: (" . $mysqli->errno . ") " . $mysqli->error);
while($row = $qry_result->fetch_assoc()){
$display_string .="<option value = '$row[value]'>";
$display_string .="$row[value]</option>";
}


$display_string .= "</select></p>";

$display_string .= "<p><label>sort</label>";
$display_string .= "<select  id = 'sorts' onchange='sortAndFilterRequest();getControllersRequest();' >";
$display_string .= "<option value = 'Freshnes' selected='selected'> Freshnes </option>";
$display_string .= "<option value = 'Length' > Length </option>";
$display_string .= "<option value = 'Rel_date'> Release Date </option>";
$display_string .= "</select></p>";
$display_string .= "</form>";
$display_string .= "</p>";
echo $display_string;
?>
