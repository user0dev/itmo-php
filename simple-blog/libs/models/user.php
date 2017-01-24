<?php 

const ENTITY_USER = 'user';

function userGetAll()
{
    $users = storageGetAll(ENTITY_USER);

    return $users;
}

function userGetById($id)
{
    return storageGetItemById(ENTITY_USER, $id);
}

function userGetByName($name) {
    return null;
}

function userSave(array $user, array &$errors = null)
{
    // очистка и валидация данных
    //var_dump($errors);
    //return;
    $status = storageSaveItem(ENTITY_USER, $user);
    //$status = false;
    if (!$status) {
        $errors['db'] = 'Не удалось сохранить данные в базу';
        //var_dump($errors);
    }
    return $user;
}
