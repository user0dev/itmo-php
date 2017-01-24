<?php 

const ENTITY_POST = 'post';

function postGetAll()
{
    $posts = storageGetAll(ENTITY_POST);

    uasort($post, function  ($a, $b) {
        return $b['created'] <=> $a['created'];
    });
    return $posts;
}

function postGetById($id)
{
    return storageGetItemById(ENTITY_POST, $id);
}

function postSave(array $post, array &$errors = null)
{
    // очистка и валидация данных
    //var_dump($errors);
    //return;
    $status = storageSaveItem(ENTITY_POST, $post);
    //$status = false;
    if (!$status) {
        $errors['db'] = 'Не удалось сохранить данные в базу';
        //var_dump($errors);
    }
    return $post;
}