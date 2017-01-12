<?php
header('Content-Type: application/json');
$tmp = fopen("data1.json", "r") or die("Unable to open file!");
echo json_encode(fread($tmp,filesize("data1.json")));
fclose($tmp);
?>
