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
    $post = sanitize($post, postSanitizeRules(), $errors);
    $status = storageSaveItem(ENTITY_POST, $post);
    //$status = false;
    if (!$status) {
        $errors['db'] = 'Не удалось сохранить данные в базу';
        //var_dump($errors);
    }
    return $post;
}

function postSanitizeRules() {
    return [
        'id' => [
            'filter' => FILTER_VALIADTE_INT,
            'options' => [
                'min_range' => 1,
            ]
        ],
        'title' => [
            'required' => true,
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
        ],
        'content' => [
            'required' => true,
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
        ],
    ];
}