<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.02.17
 * Time: 17:53
 */

require_once __DIR__ . '/../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . "/../src/Templates");

$twig = new Twig_Environment($loader, array('cache' => __DIR__ . '/../cache', 'debug' => true));

$template = $twig->load("base.twig.html");

$lorem = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias asperiores, aut, beatae delectus deserunt dignissimos doloribus illo iure laudantium molestiae obcaecati omnis possimus quaerat quia, reiciendis sapiente tempora temporibus totam.";

$template->display(["title" => "Мой первый шаблон", "text" => $lorem]);