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

function postSave(array $post)
{
    // очистка и валидация данных

    return storageSaveItem(ENTITY_POST, $post);

}