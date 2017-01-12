<?php
$tmp = fopen("newfile.txt", "r") or die("Unable to open file!");
echo fread($tmp,filesize("newfile.txt"));
fclose($tmp);
?>
