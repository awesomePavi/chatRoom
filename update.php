<?php
header('Content-Type: application/json');
$tmp = fopen("data1.json", "r") or die("Unable to open file!");
echo fread($tmp,filesize("CHAT.txt"));
fclose($tmp);
?>
