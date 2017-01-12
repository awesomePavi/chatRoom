<?php
header('Content-type: application/json');
$dataIn= $_POST['data'];
$dateEncode = json_encode($dataIn); //only way to get data out of a recieved json file
$data = json_decode($dateEncode, true); //only way to convert to array


$file = fopen("CHAT.txt", "a") or die("Unable to open file!");
fwrite($file, $data);
fwrite($file, "<br>");
fclose($file);

echo $data
?>