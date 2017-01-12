<?php
header('Content-type: application/json');
$data= $_POST['data'];
$tmp = json_encode($data);
$decoded = json_decode($tmp, true);
echo $decoded;

$tmpFile = fopen("newfile.txt", "a") or die("Unable to open file!");
fwrite($tmpFile, "\r\n");
fwrite($tmpFile, $decoded['Info']);
fwrite($tmpFile, " recieved at ");
fwrite($tmpFile, $decoded['Time']);
fclose($tmpFile);
?>
