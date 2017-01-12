<?php
header('Content-type: application/json');
$data= $_POST['data'];
$decoded = json_encode($data);
echo $decoded;

$tmpFile = fopen("newfile.txt", "a") or die("Unable to open file!");
fwrite($tmpFile, "Test");
fclose($tmpFile);
?>
