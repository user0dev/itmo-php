<?php

function daysForNewYear() {
    return 364 - (int) date('z') + (int) date('L');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задание 1. Количество дней до нового года</title>
</head>
<body>
    <h1>Задание 1. Количество дней до нового года</h1>
    <h2>Дней до нового года: <?= daysForNewYear() ?></h2>
</body>
</html>