<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.02.2017
 * Time: 13:24
 */
require_once __DIR__ . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . "/src/Templates");

$twig = new Twig_Environment($loader, array('cache' => __DIR__ . '/cache', 'debug' => true));

$dsn = "mysql:host=localhost;dbname=twigtemplate;";

$pdo = new PDO($dsn, "root", "1122334455");

