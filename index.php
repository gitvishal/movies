<?xml version = "1.0" encoding = "utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>

<script language = "javascript" type = "text/javascript">
var count=0;
var ofset=0;
function selectOptionRequest()
{

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("controller").innerHTML=xmlhttp.responseText;
    }
}
xmlhttp.open("GET","select.php",true);
xmlhttp.send(null);
}

function sortAndFilterRequest()
{

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("display").innerHTML=xmlhttp.responseText;
    }
}
var language=document.getElementById('language').value;
var genre=document.getElementById('genre').value;
var sorts=document.getElementById('sorts').value;
var queryString="?lan=" ;
queryString+=language;
queryString+="&gen=";
queryString+=genre;
queryString+="&srt=";
queryString+=sorts;
xmlhttp.open("GET","display.php" + queryString,true);
xmlhttp.send(null);
}

function pagingRequest()
{
var srch=this.value;
var tmp=count/10;
if(srch.search(/^>$/))
{
if(srch.search(/^>>$/))
{
ofset=Number(srch)-1;

}
else
{

ofset=parseInt(count/10);

}

}
else
{
if(ofset <(parseInt(count/10)))
{
ofset+=1;
}
}
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("display").innerHTML=xmlhttp.responseText;
    }
}
var language=document.getElementById('language').value;
var genre=document.getElementById('genre').value;
var sorts=document.getElementById('sorts').value;
var queryString="?lan=" ;
queryString+=language;
queryString+="&gen=";
queryString+=genre;
queryString+="&srt=";
queryString+=sorts;
queryString+="&offset=";
queryString+=ofset;
xmlhttp.open("GET","display.php" + queryString,true);
xmlhttp.send(null);

}

function getControllersRequest(){

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    count=Number(xmlhttp.responseText);
var div=document.getElementById('moves');
div.innerHTML="";
var buttons=0;

if (count >20){buttons=3;}
else if (count >10){buttons=2;}
else {buttons=1;}
for (var i=1;i<=buttons;i++)
{
var but=document.createElement("input");
but.setAttribute("type","button");
but.setAttribute("value",String(i));
but.setAttribute("id","btn"+String(i));
div.appendChild(but);
document.getElementById("btn"+String(i)).onclick=pagingRequest;
}
var but=document.createElement("input");
but.setAttribute("type","button");
but.setAttribute("value",">");
but.setAttribute("id","nxt");
div.appendChild(but);
document.getElementById("nxt").onclick=pagingRequest;

var but=document.createElement("input");
but.setAttribute("type","button");
but.setAttribute("value",">>");
but.setAttribute("id","lst");
div.appendChild(but);
document.getElementById("lst").onclick=pagingRequest;

    }
}
var language=document.getElementById('language').value;
var genre=document.getElementById('genre').value;
var sorts=document.getElementById('sorts').value;
var queryString="?lan=" ;
queryString+=language;
queryString+="&gen=";
queryString+=genre;
queryString+="&srt=";
queryString+=sorts;
queryString+="&cnt=0";
xmlhttp.open("GET","display.php" + queryString,true);
xmlhttp.send(null);
}

selectOptionRequest();
</script>

<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body onload="sortAndFilterRequest();getControllersRequest();">
<h1>movies</h1>
<div id = "container" >
<div id ="controller">
</div>
<div id="moves"></div>
<div id = "display" >
</div>
</div>
</body>
</html>
