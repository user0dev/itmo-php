
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Простой блог на PHP</title>
</head>
<body>
<?php if (isAuthorized()): ?>
    <div>Вы зашли как <?= $_SESSION['user']['username'] ?> <a href="logout.php">Выйти</a></div>
<?php endif; ?>