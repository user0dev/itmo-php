
<?php

function formatDate(DateTime $date) {
    $locale = 'ru_RU';
    $withouHours = clone $date;
    $withouHours->setTime(0, 0);
    $diff = $withouHours->diff(new DateTime());
    $secondDiff = $date->diff(new DateTime());
    if ($diff->days === 0 && $secondDiff->invert == 0) {
        $h = $secondDiff->h;
        if ($h > 0) {
            return MessageFormatter::formatMessage($locale, '{0} час{1, choice, 0 #ов| 1 # | 2 #а | 5 #ов}  назад' ,
                array($h, $h >= 20 ? $h % 10 : $h));
        } elseif ($secondDiff->i > 0) {
            $i = $secondDiff->i;
            return MessageFormatter::formatMessage($locale,
                '{0} минут{1, choice, 0 #| 1 #а | 2 #ы | 5 #}  назад', array($i, $i < 20 ? $i : $i % 10));
        } elseif ($secondDiff->s > 0) {
            $s = $secondDiff->s;
            return MessageFormatter::formatMessage($locale,
                '{0} секунд{1, choice, 0 #| 1 #а | 2 #ы | 5 #}  назад', array($s, $s < 20 ? $s : $s % 10));
        }
        return "сегодня в " . $date->format("H:i");
    } elseif ($diff->days === 1 && $diff->invert == 0) {
        return "вчера в " . $date->format("H:i");
    } else {
        $dateFormat = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::SHORT,
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
    $formatedStr = "Неверный формат даты";    
}

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