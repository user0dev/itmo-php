<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.02.17
 * Time: 17:53
 */

require_once __DIR__ . '../../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . "../Templates");

$twig = new Twig_Environment($loader, array('cache' => '/));