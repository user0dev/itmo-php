<?php

//<title>Задача 3. Проверка является ли триугольник прямоугольным</title>

function sqrLength($x1, $y1, $x2, $y2) {
    return ($x1 - $x2) ** 2 + ($y1 - $y2) ** 2;
}

function isRightTriangle($tr) {
    if (!is_array($tr) || count($tr) !== 6) {
        // echo "wrong parameter";
        return false;
    }
    // var_dump($triangle);
    $arr = array(sqrLength($tr[0], $tr[1], $tr[2], $tr[3]),
                 sqrLength($tr[0], $tr[1], $tr[4], $tr[5]),
                 sqrLength($tr[2], $tr[3], $tr[4], $tr[5]));
    sort($arr);
    //var_dump($arr);
    return $arr[0] + $arr[1] === $arr[2];
}
$tr1 = array(0, 1, 2, 0, 4, 1);
$tr2 = array(1, 2, 3, 4, 3, 0);

echo isRightTriangle($tr1) ? "triangle is right" : "triangle is not right";
echo "\n";
echo isRightTriangle($tr2) ? "triangle is right" : "triangle is not right";
//echo isRightTriangle(1);
// var_dump(sqrLength(1, 2, 3, 4));

?>