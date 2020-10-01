<?php

$fp = fopen('logfile.txt', 'a');
fwrite($fp, date("d-m-Y H:m:s").' | '.file_get_contents('php://input').'\n');
fclose($fp);
?>