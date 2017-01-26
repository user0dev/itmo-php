<?php

const STORAGE_FILENAME_PATTERN = '%d.json';
const STORAGE_DB_DIR = ROOT_DIR . DIRECTORY_SEPARATOR . 'db';

function storageCreateFilename($entity, $id)
{
    return storageGetDir($entity) . DIRECTORY_SEPARATOR . sprintf(STORAGE_FILENAME_PATTERN, $id);
}

function storageGetDir($entity)
{
    return STORAGE_DB_DIR . DIRECTORY_SEPARATOR . str_replace(['/','\\'], '_', $entity);
}

function getItemBy($entity, $attribute, $criteria)
{

}

function storageGetIdFromFilename($filename)
{
    $filename = basename($filename);
    sscanf($filename, STORAGE_FILENAME_PATTERN, $id);
    return (int) $id;
}


function storageGetNextId($entity)
{
    $dir = storageGetDir($entity);

    if (!is_readable($dir)) {
        return 0;
    }

    $ids = array_map('storageGetIdFromFilename', scandir($dir));
    $ids = array_filter($ids);
    return $ids ? max($ids) + 1 : 1;
}


function storageGetItemById($entity, $id)
{
    $filename = storageCreateFilename($entity, $id);
    if (is_readable($filename)) {
        return json_decode(file_get_contents($filename), true);
    }
    return null;
}

function storageGetAll($entity)
{
    $items = [];
    $files = scandir(storageGetDir($entity));
    //var_dump($files);
    foreach ($files as $filename) {
        $id = storageGetIdFromFilename($filename);
        $item = storageGetItemById($entity, $id);
        //var_dump($item);
        if ($item) {
            $items[] = $item;
        }
    }
    //var_dump('$items ',$items);
    return $items;
}

function storageGetItemBy($entity, $attribute, $criteria)
{
//    array_filter(storageGetAll($entity), function ($item) {
//        if (isset($item[$attribute])) {
//
//        }
//    });

    $items = [];
    $storedItems = storageGetAll($entity);
    // var_dump($storedItems);
    foreach ($storedItems as $storedItem) {
        var_dump($storedItem[$attribute], $criteria);
        if (
            isset($storedItem[$attribute]) &&
            $storedItem[$attribute] == $criteria
        ) {
            $items[] = $storedItem;
        }
    }
    //var_dump($entity, $attribute, $criteria, $items);
    return $items;
}

function storageSaveItem($entity, array &$item)
{
    $dir = storageGetDir($entity);
    //var_dump($dir, file_exists($dir), dirname($dir), is_writable(dirname($dir)));
    $success = true;
    if (!file_exists($dir)) {
        $success = mkdir($dir, 0755, true);
    }
    if (!$success) {
        return false;
    }
    // доп проверка

    $id = $item['id'] ?? 0;
    $storedItem = storageGetItemById($entity, $id);
    //var_dump("storageSaveItem", $item, $storedItem);
    if ($id && !$storedItem) {
        return false;
    }
    if(!is_array($storedItem)) {
        $storedItem = [];
    }

    $item = array_merge($storedItem, $item);

    if (!$id) {
        $id = storageGetNextId($entity);
        if ($id == 0) {
            return false;
        }
        $item['created'] = time();
    }
    //var_dump($id);

    $item['id'] = (int) $id;
    $item['updated'] = time();

    $filename = storageCreateFilename($entity, $id);

    return file_put_contents($filename, json_encode($item), LOCK_EX);
}