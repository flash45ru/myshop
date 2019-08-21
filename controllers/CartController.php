<?php


class CartController
{
    const GUEST_ID = 2;

    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);

        return true;
    }

    public function actionDelete($id)
    {
        //удаляем товар в корзине
        Cart::deleteProduct($id);

        header("Location: /cart");
    }

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        $valuta =  Settings::getSettingValue('valuta');

        $productsInCart = false;
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once (ROOT . '/views/cart/index.php');

        return true;
    }

    public function actionCheckout()
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        $valuta =  Settings::getSettingValue('valuta');

        $result = false;

        if (isset($_POST['submit'])) {
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            $errors = false;
            if (!User::checkName($userName))
                $errors[] = 'Неправильное имя';
            if (!User::checkPhone($userPhone))
                $errors[] = 'Неправильный телефон';

            if ($errors == false) {
                $productInCart = Cart::getProducts();
                if (User::isGuest()) {
                    $userId = self::GUEST_ID;
                } else {
                    $userId = User::checkLogged();
                }

                $result = Order::save($userName, $userPhone, $userComment, $userId, $productInCart);
            }

            if ($result) {
                $adminEmail = Settings::getSettingValue('admin_email');
                $message = 'http://phpshop/admin/orders';
                $subject = 'Новый заказ!';
                mail($adminEmail, $subject, $message);

                Cart::clear();
            } else {
                $productInCart = Cart::getProducts();
                $productsIds = array_keys($productInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }

        } else {
            $productInCart = Cart::getProducts();

            if ($productInCart == false) {
                header("Location: /");
            } else {
                $productsIds = array_keys($productInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userName = false;
                $userPhone = false;
                $userComment =false;

                if (!User::isGuest()) {
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);
                    $userName = $user['name'];
                }
            }
        }

        require_once (ROOT. '/views/cart/checkout.php');

        return true;


    }

}