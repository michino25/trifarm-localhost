<?php
require_once "modules/db_module.php";

class ModelCart
{
    function modifyCookie($name, $value)
    {
        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;

        setcookie($name, '', time() - 1, '/trifarm-release', $domain, false);
        setcookie($name, $value, time() + 86400, '/trifarm-release', $domain, false);

        return;
    }

    function add($id, $quantity)
    {
        if (isset($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart'], true);
            if (!isset($cart[$id])) {
                $cart[$id] = $quantity;
            } else {
                $cart[$id] += $quantity;
            }

            $this->modifyCookie('cart', json_encode($cart));
        }
    }

    function remove($id)
    {
        if (isset($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart'], true);

            unset($cart[$id]);

            $this->modifyCookie('cart', json_encode($cart));
        }
    }

    function update($id, $quantity)
    {
        if (isset($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart'], true);

            $cart[$id] = $quantity;

            $this->modifyCookie('cart', json_encode($cart));
        }
    }
}
