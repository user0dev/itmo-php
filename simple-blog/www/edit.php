<?php
require_once __DIR__ . '/../init.php';
    //var_dump($_POST['post']);
    //var_dump($_POST);
//var_dump($_GET);
//var_dump($_POST);
$title = '';
$content = '';
$id = 0;
$update = false;
if (isset($_GET['id'])) {
    $id = (int) htmlspecialchars($_GET['id']);
}
if ($id) {
    $post = postGetById($id);
    if (is_array($post)) {
        $update = true;
        $title = $post['title'];
        $content = $post['content'];
    } else {
        $post = [];
    }
} else {
    $post = [];
}
$status = false;
if (isset($_POST['post'])) {
    $newPost = $_POST['post'];
    if (is_array($newPost)) {
        $post = array_merge($post, $newPost);
        //$post = $new
        $status = postSave($post);
    }
}

?>

<?php include ROOT_DIR . '/app/views/layout/header.php'; ?>

<?php if(!isset($_POST['post'])): ?>
    <h1><?= $update ? "Обновить" : "Добавить" ?> запись</h1>

    <form method="post">
        <div>
            <label for="post_title">Заголовок</label>
            <input type="text" id="post_title" name="post[title]" value="<?= $title ?>">
        </div>
        <div>
            <label for="post_content">Содержимое</label>
            <textarea id="post_content" name="post[content]"><?= $content ?></textarea>
        </div>
        <div><input type="submit" value="Отправить"></div>
    </form>
<?php elseif ($status): ?>
    <h1>Запись успешно <?= $update ? 'обновлена' : 'добавлена' ?></h1>
<?php else: ?>
    <h1>Ошибка <?= $update ? 'обновления' : "добавления" ?> записи</h1>
<?php endif; ?>

<?php include ROOT_DIR . '/app/views/layout/footer.php'; ?>
