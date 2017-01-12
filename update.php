<?php
header('Content-Type: application/json');
$tmp = fopen("CHAT.txt", "r") or die("Unable to open file!");
echo fread($tmp,filesize("CHAT.txt"));
fclose($tmp);
?>
