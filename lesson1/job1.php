<?php
//echo time() . "\n";
$minutes = (int) date('i');
$cicle = $minutes % 5;
echo $cicle < 3 ? 'green' : 'red';
?>