<?php
require_once __DIR__ . '/../init.php';

if (isAuthorized) {
    header('location: index.php');
}

const REG_NAME = '/^[a-z][\w\d]*$/i';
const REG_PASS = '/^[\d\w.$#@!&?\/\\\^]{6,20}$/i';
const REG_MAIL = '/^[a-z][\w\d_-]*\@[\w\d]+\.\w{2,6}$/i';

$name = '';
$pass1 = '';
$pass2 = '';
$mail = '';
$userDouble = false;


$user = $_POST['user'] ?? [];
//var_dump($user);
if ($user) {
    $name = trim($user['name'] ?? '');
    if (preg_match(REG_NAME, $name) != 1) {
        $name = '';
    }
    $pass1 = trim($user['password'] ?? '');
    if (preg_match(REG_PASS, $pass1) != 1) {
        $pass1 = '';
    }
    $pass2 = trim($user['password2'] ?? '');
    if (preg_match(REG_PASS, $pass2) != 1) {
        $pass2 = '';
    }
    $mail = trim($user['mail'] ?? '');
    var_dump($mail);
    if (preg_match(REG_MAIL, $mail) != 1) {
        $mail = '';
    }
    $errors = [];
    $userDouble = false;
    if ($mail !== '' && $pass2 !== '' && $pass1 !== '' && $name !== '' && $pass1 === $pass2) {
        //if (userGetByName($name) == null) {
            $newUser = [ 'mail' => $mail, 'password' => password_hash($pass1, PASSWORD_DEFAULT), 'username' => $name ];
            userSave($newUser, $errors);
            if (!$errors) {
                // всплывающее сообщение об успехе
                header('location: index.php');
                exit;
            }           
        // } else {
        //     $userDouble = true;
        // }
    }
}





?>

<?php include ROOT_DIR . '/app/views/layout/header.php'; ?>

<h1>Регистрация нового пользователя</h1>
    <form method="post">
        <div>
            <label for="user_name">Имя пользователя:</label>
            <input id="user_name" type="text" name="user[name]" value="<?=$name?>">
            <?php if ($userDouble): ?>
                <span style="color: red;">Такое имя пользователя уже используется</span>
            <?php elseif ($user && $name == ''): ?>
                <span style="color: red;">Не верное имя пользователя</span>
            <?php endif; ?>
        </div>
        <div>
            <label for="user_mail">Почтовый ящик:</label>
            <input id="user_mail" type="email" name="user[mail]" value="<?= $mail ?>">
            <?php if ($user && $mail == ''): ?>
                <span style="color: red;">Не верный email</span>
            <?php endif; ?>
        </div>
        <div>
            <label for="user_password">Пароль:</label>
            <input type="password" name="user[password]" id="user_password" value="">
            <?php if ($user && $pass1 == ''): ?>
                <span style="color: red;">Не верный пароль</span>
            <?php endif; ?>
        </div>
        <?php if ($pass1 != '' && $pass2 != $pass1): ?>
            <div  style="color: red;">Пароли не совпадают</div>
        <?php endif; ?>
        <div>
            <label for="user_password2">Повторите пароль:</label>
            <input type="password" name="user[password2]" id="user_password2" value="">
            <?php if ($user && $pass2 == ''): ?>
                <span style="color: red;">Не верный пароль</span>
            <?php endif; ?>
        </div>
        
        <div><input type="submit" value="Зарегистрироваться"></div>
    </form>

<?php include ROOT_DIR . '/app/views/layout/footer.php'; ?>
