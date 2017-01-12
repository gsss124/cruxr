<?php
ini_set('display_errors',0);
$stringinput=$_POST['stringinput'];
$dbconn = pg_connect("host=localhost port=5432 dbname=<<enter postgresql database name>> user=<<enter postgresql username>> password=<<enter postgresql password>>");

$humaninput="'%".$stringinput."%'";

$result = pg_query($dbconn, "SELECT dwfilename, completetext, allocrtext FROM test WHERE completetext || allocrtext ILIKE ".$humaninput);

while ($row = pg_fetch_row($result)) {
	if (stripos($row[0], 'pdf') !== false){
		echo "<font face=\"calibri\" color=\"red\">PDF: " . $row[0] . "</font> [<a href=\"<<local htdocs folder with all files>>\\".$row[0]."\">open</a>]<BR>";
		if (stripos($row[2], $stringinput) !== false) {
		preg_match("/................".$stringinput."................/i", (string)$row[2], $temp);
		echo "<font face=\"calibri\" color=\"red\">...".substr($temp[0], 0, 16)."<strong><i>".$stringinput."</i></strong>".substr($temp[0], -16)."...</font> <img src=\"ocrimage.png\" alt=\"text in image\" /><BR><BR>";
		}
		else {
		preg_match("/................".$stringinput."................/i", (string)$row[1], $temp);
		echo "<font face=\"calibri\" color=\"red\">...".substr($temp[0], 0, 16)."<strong><i>".$stringinput."</i></strong>".substr($temp[0], -16)."...</font><BR><BR>";
		}
	} elseif (stripos($row[0], 'pptx') !== false) {
		echo "<font face=\"calibri\" color=\"blue\">Presentation: " . $row[0] . "</font> [<a href=\"<<local htdocs folder with all files>>\\".$row[0]."\">open</a>]<BR>";
		if (stripos($row[2], $stringinput) !== false) {		
		preg_match("/................".$stringinput."................/i", (string)$row[2], $temp);
		echo "<font face=\"calibri\" color=\"blue\">...".substr($temp[0], 0, 16)."<strong><i>".$stringinput."</i></strong>".substr($temp[0], -16)."...</font> <img src=\"ocrimage.png\" alt=\"text in image\" /><BR><BR>";		
		}
		else {		
		preg_match("/................".$stringinput."................/i", (string)$row[1], $temp);
		echo "<font face=\"calibri\" color=\"blue\">...".substr($temp[0], 0, 16)."<strong><i>".$stringinput."</i></strong>".substr($temp[0], -16)."...</font><BR><BR>";
		}
	} else {
		echo "<font face=\"calibri\" color=\"black\">Other: " . $row[0] . "</font> [<a href=\"<<local htdocs folder with all files>>\\".$row[0]."\">open</a>]<BR>";
		if (stripos($row[2], $stringinput) !== false) {		
		preg_match("/................".$stringinput."................/i", (string)$row[2], $temp);
		echo "<font face=\"calibri\" color=\"black\">...".substr($temp[0], 0, 16)."<strong><i>".$stringinput."</i></strong>".substr($temp[0], -16)."...</font> <img src=\"ocrimage.png\" alt=\"text in image\" /><BR><BR>";
		}
		else {			
		preg_match("/................".$stringinput."................/i", (string)$row[1], $temp);
		echo "<font face=\"calibri\" color=\"black\">...".substr($temp[0], 0, 16)."<strong><i>".$stringinput."</i></strong>".substr($temp[0], -16)."...</font><BR><BR>";
		}
	}
}
?>
