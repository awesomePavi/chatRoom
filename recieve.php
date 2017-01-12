<?php
$data = $_POST['data'] or $_REQUEST['data'];
echo $data;
$tmpFile = fopen("newfile.txt", "a") or die("Unable to open file!");
fwrite($tmpFile, $data);
fclose($tmpFile);
?>
