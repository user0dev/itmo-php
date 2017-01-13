<?php
    $binPattern = '[01]{1,16}';
    $decPattern = '/\d{1,6}/';
    $valBin = '';
    $valDec = '';
    if (isset($_GET['to_bin']) && preg_match($decPattern, $_GET['dec']) == 1) {
        $valDec = (int) $_GET['dec'];
        $valBin = decbin($valDec);
    } elseif (isset($_GET['to_dec']) && preg_match('/' . $binPattern . '/', $_GET['bin']) == 1) {
        $valBin = $_GET['bin'];
        $valDec = bindec($valBin);
    }
?>
<!DOCTYPE html>
<html lang="ru">
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
            <input type="number" name="dec" value="<?= $valDec ?>">
        </label></div>
        <div><label>
            <span>Двоичная</span>
            <input type="text" name="bin" pattern="<?= $binPattern ?>" value="<?= $valBin ?>">
        </label></div>
        <input type="submit" value="Перевести в двоичную" name="to_bin">
        <input type="submit" value="Перевести в десятичную" name="to_dec">
    </form>
</body>
</html>