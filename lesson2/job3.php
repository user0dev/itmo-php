<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задача 3. Сортировка пузырьковым методом</title>
</head>
<body>
    <h1>Задача 3. Сортировка пузырьковым методом</h1>
<?php
    function mySort(&$arr) {
        for ($j = 1; $j < count($arr); $j++) {
            for ($i = 1; $i <= count($arr) - $j; $i++) {
                if ($arr[$i - 1] > $arr[$i]) {
                    $t = $arr[$i - 1];
                    $arr[$i - 1] = $arr[$i];
                    $arr[$i] = $t;
                }
            }
        }
    }
    $arr = [];//[1, 2, 3, 8, 14, 89, 45];
    for ($i = 0; $i < rand(10, 20); $i++) {
        $arr[] = rand(-50, 50);
    }
    echo '<div>Исходный массив: [' . implode(', ', $arr) . ']</div>';
    mySort($arr);
    echo '<div>Отсортированный массив: [' . implode(', ', $arr) . ']</div>';
?>

</body>
</html>