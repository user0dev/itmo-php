<?php

$count = $_COOKIE['counter'] ?? 0;

setcookie('counter', $count + 1);

echo 'Вы посетили данную страницу: ' . $count . ' раз.';