<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.02.17
 * Time: 17:53
 */

require_once __DIR__ . "../init.php";

$template = $twig->load("main.twig");

$template->display();