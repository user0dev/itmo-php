<?php
require_once __DIR__ . '/../init.php';

/*$title = '';
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
}*/

// $data = isset($_POST['post']) ? $_POST['post'] : [];
$data = $_POST['post'] ?? []; // PHP 7.0
$error = [];
$post = [];
$id = $data['id'] ?? $_GET['id'] ?? null;

if ($id) {
    $post = postGetById((int) $id);
    if (!$post) {
        header('$_SERVER'['SERVER_PROTOCOL'] . ' 404 Not found');
        exit('Запись не найдена!');
    }
}

if ($data) {
    $msg = 'Запись успешно ' . ($id ? 'обновлена' : 'добавлена');
    $post = postSave($data, $error);
    if (!$errors) {
        // всплывающее сообщение об успехе
        header('location: edit.php?id=' . $post['id']);
        exit;
    }
    // высплывающее сообщение с ошибками
}

?>

<?php include ROOT_DIR . '/app/views/layout/header.php'; ?>

<h1>
    <?= isset($post['id']) ? ' Редактировать запись' : 'Новая запись' ?>
</h1>
    <form method="post">
        <div>
            <label for="post_title">Заголовок</label>
            <input type="text" id="post_title" name="post[title]" value="<?= $post['title'] ?? '' ?>">
        </div>
        <div>
            <label for="post_content">Содержимое</label>
            <textarea id="post_content" name="post[content]"><?= $post['content'] ?? '' ?></textarea>
        </div>
        <?php if (isset($post['id'])): ?>
            <input type="hidden" name="post[id]" value="<?= $post['id'] ?>">
        <?php endif; ?>
        <div><input type="submit" value="Отправить"></div>
    </form>

<?php include ROOT_DIR . '/app/views/layout/footer.php'; ?>
