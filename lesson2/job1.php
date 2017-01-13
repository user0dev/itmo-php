<?php
    $regForPlates = "/\d{1,4}/";
    $regForFairy = "/\d{1,4}(,5)?/";
    $platesCount = 1;
    if (isset($_GET["plates"])) {
        if (preg_match($regForPlates, $_GET["plates"]) == 1) {
            $platesCount = (int) $_GET["plates"];
        }
    }
    $fairyCount =  0.5;
    if (isset($_GET["fairy"])) {
        if (preg_match($regForFairy, $_GET["fairy"]) == 1) {
            $fairyCount = (float) $_GET["fairy"];
        }
    }
//    var_dump($platesCount, $fairyCount);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задача 1. Количество тарелок и моющего средства</title>
    <style type="text/css">
        label {
            display: block;
            margin-bottom: 10px;
        }
        label span {
            display: inline-block;
            width: 160px;
        }
    </style>
</head>
<body>
    <h1>Задача 1. Количество тарелок и моющего средства</h1>
    <form>
        <label>
            <span>Количество тарелок</span>
            <input name="plates" type="number" min="1" required
                value="<?= $platesCount ?>" pattern="<?= $regForPlates ?>">
        </label>
        <label>
            <span>Количество моющего средства</span>
            <input name="fairy" type="number" min="0.5" step="0.5" required
                value="<?= $fairyCount ?>" pattern="<?= $regForFairy ?>">
        </label>
        <input type="submit" value="Посчитать" name="compute">
    </form>
    <?php if (isset($_GET["compute"])): ?>
        <table>
            <tr><th>Тарелки</th><th>Моющее средство</th></tr>
            
            <?php 
                $p = $platesCount;
                $f = $fairyCount;
                while ($p > 0 && $f > 0):
            ?>
                <tr><td><?= $p ?></td><td><?= $f ?></td></tr>
            <?php $p--; $f -= 0.5; endwhile; ?>
            <tr><td><?= $p ?></td><td><?= $f ?></td></tr>
        </table>
        <div>Осталось тарелок: <?= $p ?></div>
        <div>Осталось моющего средства: <?= $f ?></div>
    <?php endif; ?>
</body>
</html>