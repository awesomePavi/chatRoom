<?php
echo "Hello World!";
$tmpFile = fopen("newfile.txt", "w") or die("Unable to open file!");
fwrite($tmpFile, "Hello World");
fclose($tmpFile);
?>
