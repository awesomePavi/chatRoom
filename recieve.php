<?php
//header('Content-type: application/json');
//$dataIn= $_POST['data'];
//$dateEncode = json_encode($dataIn); //only way to get data out of a recieved json file
//$data = json_decode($dateEncode, true); //only way to convert to array
//echo $data;

$file="log.txt";
$linecount = 0;
$handle = fopen($file, "r");
while(!feof($handle)){
  $line = fgets($handle);
  $linecount++;
}
fclose($handle);

echo $linecount;

/*
$tmpFile = fopen("log.txt", "w") or die("Unable to open file!");
fwrite($tmpFile, "---------------\n");
fwrite($tmpFile, $data['Name']);
fwrite($tmpFile, "\n");
fwrite($tmpFile, $data['Info']);
fwrite($tmpFile, "\n---------------\n");




/*
$decoded['userName'];
$decoded['Message'];

$jsonFile = fopen("data1.json", "r") or die("Unable to open file!");
$posFind = json_encode(fread($jsonFile,filesize("data1.json")));
$allPos = json_decode($posFind, true);
fclose($jsonFile);

$getVals = json_decode(json_encode($allPos['0']),true);

fwrite($tmpFile, "---------------\n");
fwrite($tmpFile, $getVals['Name']);
fwrite($tmpFile, "\n");
fwrite($tmpFile, $getVals['Info']);
fwrite($tmpFile, "\n---------------\n");
fclose($tmpFile);



$jsonFile = fopen("data1.json", "w") or die("Unable to open file!");
$allPos[count($allPos)] = $decoded;
fwrite($jsonFile, json_encode($allPos));
fclose($jsonFile);
*/
?>
