<?php
require_once "controllers/controller.php";

if (!isset($_COOKIE['cart']))
    setcookie('cart', json_encode([]), time() + 86400, '/trifarm-localhost', $domain, false);

$controller = new Controller();
$controller->invoke();
