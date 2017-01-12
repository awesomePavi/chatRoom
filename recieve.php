<?php
header('Content-type: application/json');
$data= $_POST['data'];
$decoded = = json_decode($data, true);
echo $decoded;

$tmpFile = fopen("newfile.txt", "a") or die("Unable to open file!");
fwrite($tmpFile, "\n");
fwrite($tmpFile, $decoded['Info']);
fwrite($tmpFile, " recieved at ");
fwrite($tmpFile, $decoded['Time']);
fclose($tmpFile);
?>
