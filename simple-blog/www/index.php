<?php

$posts = [
    [
        'id' => 1,
        'title' => 'Запись №1',
        'content' => 'Text for record 1',
        'created' => 44834823,
        'updated' => 77949444,
    ],
    [
        'id' => 1,
        'title' => 'Record №2',
        'content' => 'Text for record 2',
        'created' => 44834823,
        'updated' => 77949444,
    ],
    [
        'id' => 1,
        'title' => 'Record №3',
        'content' => 'Text for record 3',
        'created' => 44834823,
        'updated' => 77949444,
    ],
];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Простой блог на PHP</title>
</head>
<body>
    <?php foreach ($posts as $post): ?>
        <sections class="post">
            <header>
                <h2>
                    <a href="show.php?id=<?= $post['id'] ?>">
                        <?= $post['title'] ?>
                    </a>
                </h2>
                <ul>
                    <li>Создан <?= date('Y-m-d H:i:s', $post['created']) ?></li>
                    <li>Обновлен  <?= date('Y-m-d H:i:s', $post['updated']) ?></li>
                </ul>
                <div>
                    <?= $post['content'] ?>
                </div>
            </header>
            <footer></footer>
        </sections>        
    <?php endforeach; ?>
    
</body>
</html>