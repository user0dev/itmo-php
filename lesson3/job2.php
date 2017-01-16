<?php

const REG_SPACES = "[\s,.’'\"!—]";

function isPalindrome($str) {
    $str = (string) $str;
    $str = mb_strtolower($str);
    $str = mb_ereg_replace(REG_SPACES, '', $str);
    if ($str === false) {
        return false;
    }
    //var_dump($str);
    $len = mb_strlen($str);
    if ($len == 0) {
        return false;
    }
    while ($len > 1) {
        $c1 = mb_substr($str, 0, 1);
        $c2 = mb_substr($str, -1, 1);
        if ($c1 !== $c2) {
            return false;
        }
        $str = mb_substr($str, 1, $len - 2);
        $len = mb_strlen($str);
        // var_dump($c1, $c2, $str, $len);
    }
    return true;
}
//echo (isPalindrome('А роза ипала на лапу Азора') ? "" : "не ") . "полиндром";
//echo (isPalindrome('АрозаупаланалапуАзора') ? "" : "не ") . "полиндром";


$inputStr = '';
if (isset($_GET['inputStr']) && !mb_ereg_match('^\s*$', $_GET['inputStr'])) {
    $inputStr = $_GET['inputStr'];
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2. Является ли переданная строка полиандром</title>
</head>
<body>
    <h1>Задание 2. Является ли переданная строка полиандром</h1>
    <form>
        <div><label>
            <span>Текст для проверки</span>
            <input type="text" require name="inputStr"
                <?php if ($inputStr != ''): ?>
                    value="<?= $inputStr ?>"
                <?php endif; ?> 
            >
        </label><div>
        <div><input type="submit" value="Проверить" name="test"></div>
    </form>
    <?php if ($inputStr != ''): ?>
        <div>Текст <?= "<b>". $inputStr . "</b>" . (isPalindrome($inputStr) ? '' : ' не') ?> является полиндромом</div>
    <?php endif; ?>
</body>
</html>