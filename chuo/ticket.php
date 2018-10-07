<?php
$i = 0;
$tk = "";
$file = fopen('ticket.txt','r');
while ($data = fgetcsv($file,1024,",")) {
	$i++;
	print $i . ". ". $data[0] . " " . $data[1]. "–‡" . "<br />";  
}
fclose($file);
?>