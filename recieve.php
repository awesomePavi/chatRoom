<?php
header('Content-type: application/json');
$data= $_POST['data'];
echo $data;

$tmpFile = fopen("log.txt", "w") or die("Unable to open file!");
fwrite($tmpFile, "---------------");
fwrite($tmpFile, $data);
fwrite($tmpFile, "---------------");
fclose($tmpFile);



/*
$decoded['userName'];
$decoded['Message'];


$jsonFile = fopen("data1.json", "r") or die("Unable to open file!");
$posFind = json_encode(fread($jsonFile,filesize("data1.json")));
$allPos = json_decode($posFind, true);
fclose($jsonFile);



$jsonFile = fopen("data1.json", "w") or die("Unable to open file!");
$allPos[count($allPos)] = $decoded;
fwrite($jsonFile, json_encode($allPos));
fclose($jsonFile);
*/
?>
