<?php
require_once __DIR__ . '/../init.php';

if (isAuthorized()) {
    logout();
}
header("location: index.php");

?>
