<?php 

require_once __DIR__ . '/../init.php'; 
$posts = postGetAll();

?>


<?php include ROOT_DIR . '/app/views/layout/header.php'; ?>

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

<?php include  ROOT_DIR . '/app/views/layout/footer.php'; ?>
