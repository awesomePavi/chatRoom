<?php
header('Content-type: application/json');
$data= $_POST['data'];
echo '<pre>';
print_r($data);
echo '</pre>';
$decoded = json_encode($data);
echo $decoded;

$tmpFile = fopen("newfile.txt", "a") or die("Unable to open file!");
fwrite($tmpFile, "Test");
fclose($tmpFile);
?>
