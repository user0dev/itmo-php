<?php

require_once __DIR__ . '/../init.php';

/**/

$post = $posts[$_GET['id']-1] ?? null;

if (!$post) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not found');
    exit('Запись не найдена');
}

//var_dump($post);

?>

<?php include  ROOT_DIR . '/app/views/layout/header.php'; ?>


<acticle>
    <header>
        <h1><?= $post['title'] ?></h1>
        <time datetime="<?= date('Y-m-d', $post['created']) ?>">
            <?= date('Y-m-d H:i', $post['created']) ?>
        </time>
    </header>
    <div>
        <?= $post['content'] ?>
    </div>
    <footer>
        <p>
            Эта статья была обновлена
            <time datetime="<?= date('Y-m-d', $post['updated']) ?>">
                <?= date('Y-m-d H:i', $post['updated']) ?>
            </time>
    </footer>
</acticle>

<?php include ROOT_DIR . '/app/views/layout/footer.php'; ?>