<?php

class CatalogController
{

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $leatestProduct = array();
        $leatestProduct = Product::getLatestProducts(6);

        $valuta =  Settings::getSettingValue('valuta');

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryPropucts = array();
        $categoryPropucts = Product::getProductsListByCategory($categoryId, $page);

        $total = Product::getTotalProductInCategory($categoryId);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        $valuta =  Settings::getSettingValue('valuta');

        require_once (ROOT . '/views/catalog/category.php');

        return true;
    }

}
