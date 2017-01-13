<?php
    $binPattern = '[01]{1,12}';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задача 4. Преобразовать из десятичной системы счисления в двоичную и наоборот</title>
    <style type="text/css">
        form > input {
            margin-right: 5px;
        }
        label span {
            display: inline-block;
            width: 100px;
        }
        form > div {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Задача 4. Преобразовать из десятичной системы счисления в двоичную и наоборот</h1>
    <form>
        <div><label>
            <span>Десятичная</span>
            <input type="number">
        </label></div>
        <div><label>
            <span>Двоичная</span>
            <input type="text" pattern="<?= $binPattern ?>">
        </label></div>
        <input type="submit" value="Перевести в двоичную" name="to_bin">
        <input type="submit" value="Перевести в десятичную" name="to_dec">
    </form>
</body>
</html>