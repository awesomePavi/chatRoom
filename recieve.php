<?php
header('Content-type: application/json');
$dataIn= $_POST['data'];
$dateEncode = json_encode($dataIn);
$data = json_decode($dateEncode, true);
echo $data;

$tmpFile = fopen("log.txt", "w") or die("Unable to open file!");
fwrite($tmpFile, "---------------\n");
fwrite($tmpFile, $data['Name']);
fwrite($tmpFile, "\n");
fwrite($tmpFile, $data['Info']);
fwrite($tmpFile, "\n---------------");
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
