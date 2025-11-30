<?php
$date_jour = strtotime(date("Y-m-d"));
$date1 = strtotime(datetime: "2025-01-01");
echo '<br>';


$days = ($date_jour - $date1) / 60 / 60 / 24;

echo $days;

?>