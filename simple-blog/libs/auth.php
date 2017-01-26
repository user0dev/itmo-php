<?php

function authorize($username, $password)
{

    $user = userGetBy('username', $username);
    //var_dump($user);
    if (count($user) != 1) {
        return false;
    }
    
    $user = $user[0];
    var_dump($user['password']);
    if (!password_verify($password, $user['password'])) {
        return false;
    }
    
    $_SESSION['user'] = [
        'id' => $user['id'],
        'username' => $user['username'],
    ];
    
    return true;
}


function isAuthorized()
{
    return isset($_SESSION['user']);
}


function logout()
{
    unset($_SESSION['user']);
}
