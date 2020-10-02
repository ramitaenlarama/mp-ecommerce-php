<?php

$fp = fopen('logfile.txt', 'a');
fwrite($fp,file_get_contents('php://input'));
fclose($fp);
?>