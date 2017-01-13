<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Задача №2. Перевернуть массив без копирования элемнтов и использования встроенных фунцкий</h1>
<?php

    function mySwap(&$v1, &$v2) {
        $v1 = $v1 + $v2;
        $v2 = $v1 - $v2;
        $v1 = $v1 - $v2;
    }
    function myCount($arr) {
        $i = 0;
        while (isset($arr[$i])) {
            $i++;
        }
        return $i;
    }
    function arrayToStr($arr) {
        $result = "[";
        foreach($arr as $key) {
            $result = $result . $key . ', ';
        }
        return substr($result, 0, strlen($result) - 2) . ']';
    }

    $arr = [1, 2, 3, 8, 14, 89, 45];
    echo '<div>Исходный массив: ' . arrayToStr($arr) . '</div>';
    $count = myCount($arr);
    for($i = 0, $j = $count - 1; $i < $j; $i++, $j--) {
        mySwap($arr[$i], $arr[$j]);
    }
    echo '<div>Массив перевертышь: ' . arrayToStr($arr) . '</div>';
    
?>
        
</body>
</html>
