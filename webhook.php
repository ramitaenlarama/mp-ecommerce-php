<?php

$fp = fopen('logfile.txt', 'a');
fwrite($fp, date("d-m-Y").' | '.json_encode($_POST));
fclose($fp);
?>