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
        'id' => 2,
        'title' => 'Record №2',
        'content' => 'Text for record 2',
        'created' => 44834823,
        'updated' => 77949444,
    ],
    [
        'id' => 3,
        'title' => 'Record №3',
        'content' => 'Text for record 3',
        'created' => 44834823,
        'updated' => 77949444,
    ],
];

const ROOT_DIR = __DIR__;

require_once ROOT_DIR . '/libs/storage.php';
require_once ROOT_DIR . '/libs/sanitize.php';
require_once ROOT_DIR . '/libs/models/user.php';
require_once ROOT_DIR . '/libs/auth.php';
require_once ROOT_DIR . '/libs/view.php';
require_once ROOT_DIR . '/app/models/post.php';
