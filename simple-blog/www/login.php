<?php
require_once __DIR__ . '/../init.php';

$login = $_POST["login"] ?? [];

$name = '';
$pass = '';
// $errorAuth = true;

if ($login) {
    if (isAuthorized()) {
        logout();
    }
    $name = $login["name"] ?? '';
    $pass = $login['password'] ?? '';
    if ($name && $pass) {
        if (!isset($_SESSION)) {
                    session_start();

        }
        //var_dump("login.php " . $pass);
        if (authorize($name, $pass)) {
            header("location: index.php");
            exit();
        }
    }
    
}

?>

<?php include ROOT_DIR . '/app/views/layout/header.php'; ?>

<form action="" method="post">
    <?php if ($login): ?>
        <div style="color: red;">Не верное имя пользователя или пароль</div>
    <?php endif; ?>
    <div><label for="login-name">Имя пользователя:</label><input type="text" name="login[name]" id="login-name" value="user"></div>
    <div><label for="login-password">Пароль:</label><input type="password" name="login[password]" id="login-password" value="aaaaaa"></div>
    <div><input type="submit" value="Зайти"></div>
</form>

<?php include  ROOT_DIR . '/app/views/layout/footer.php'; ?>