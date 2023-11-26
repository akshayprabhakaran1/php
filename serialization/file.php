<?php
$handle = fopen("store.txt","r");
$content = fread($handle, filesize("store.txt"));
print_r($content);
fclose($handle);
?>