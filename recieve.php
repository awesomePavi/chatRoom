<?php
header('Content-type: application/json');
$data= $_POST['data'];
$tmp = json_encode($data);
$decoded = json_decode($tmp, true);
//echo $decoded;

/*
$decoded['userName'];
$decoded['Message'];
*/

$jsonFile = fopen("data1.json", "r") or die("Unable to open file!");
$posFind = json_encode(fread($jsonFile,filesize("data1.json")));
$allPos = json_decode($posFind, true);
fclose($jsonFile);
echo $allPos;

/*
$jsonFile = fopen("data1.json", "w") or die("Unable to open file!");
$allPos[count($allPos)] = $decoded;
fwrite($jsonFile, json_encode($allPos););
fclose($jsonFile);
*/
?>
