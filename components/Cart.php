<?php


class Cart
{
    public static function addProduct($id)
    {
        $id = intval($id);
        $productInCart = array();

        if (isset($_SESSION['products'])) {
            $productInCart = $_SESSION['products'];
        }

        if (array_key_exists($id, $productInCart)) {
            //если товар есть увеличиваем  количество на 1
            $productInCart[$id] ++;
        } else {
            //добавляем  новый товар в  корзину
            $productInCart[$id] = 1;
        }

        $_SESSION['products'] = $productInCart;

        return self::countItems();
    }

    public static function deleteProduct($id)
    {
        $productInCart = self::getProducts();

        unset($productInCart[$id]);

        $_SESSION['products'] = $productInCart;
    }

    /**
     * Подсчет кол-ва товаров в корзине
     * "return int
     */

    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $ID => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        if ($productsInCart) {
            $total = 0;
            foreach ($products as $item) {
                $total +=$item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }



}