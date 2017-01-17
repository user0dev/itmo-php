
<?php

function formatDate(DateTime $date) {
    //var_dump($date);
    $withouHours = clone $date;
    $withouHours->setTime(0, 0);
    $diff = $withouHours->diff(new DateTime());
    //var_dump($diff->days);
    //var_dump($diff);
    if ($diff->days === 0) {
        return "сегодня в " . $date->format("H:i");
    } elseif ($diff->days === 1 && $diff->invert == 0) {
        return "вчера в " . $date->format("H:i");
    } else {
        $dateFormat = new IntlDateFormatter("ru_RU", IntlDateFormatter::LONG, IntlDateFormatter::SHORT,
            null, null, "d MMMM y года в HH:mm");
    }
    return $dateFormat->format($date);
}

$inputDate = "";
if (isset($_GET['date'])) {
    $inputDate = htmlspecialchars($_GET['date']);
}

$formatedStr = "";

try {
    if ($inputDate != '') {
        $formatedStr = formatDate(new DateTime($inputDate));
    }
} catch (Exception $e) {
    $formatedStr = "Не верный формат даты";    
}

//var_dump(formatDate(new DateTime("12.03.2016 19:50")));
//var_dump(formatDate(new DateTime("14.01.2017 23:50")));
//formatDate("12.03.2016 19:50");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задача 3. Функция форматирования даты</title>
</head>
<body>
    <h1>Задача 3. Функция форматирования даты</h1>
    <form>
        <div><label>
            <span>Введите дату<span>
            <input type="text" name="date" value="<?= $inputDate ?>">
        </label></div>
        <input type="submit">
    </form>
    <?php if ($inputDate != ""): ?>
        <div><?= $formatedStr ?></div>
    <?php endif; ?>
</body>
</html>