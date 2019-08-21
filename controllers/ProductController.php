<?php

class ProductController
{

    public function actionView($productId)
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $product = Product::getProductById($productId);
        $availability = Product::getAvailabilityText($product['availability']);
        $imagePath = Product::getImage($productId);
        $valuta =  Settings::getSettingValue('valuta');

        require_once(ROOT . '/views/product/view.php');

        return true;
    }

}
