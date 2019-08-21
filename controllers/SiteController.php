<?php

class SiteController
{

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $leatestProduct = array();
        $leatestProduct = Product::getLatestProducts(6);

        $sliderProducts = Product::getRecommendedProducts();
        $valuta =  Settings::getSettingValue('valuta');

        require_once(ROOT . '/views/site/index.php');

        return true;
    }

    public function actionContact()
    {
        $userEmail = '';
        $userText = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];
            $errors = false;

            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                $adminEmail = Settings::getSettingValue('admin_email');
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }

        require_once(ROOT. '/views/site/contact.php');
        
        return true;
    }

    public function actionAbout()
    {
        require_once(ROOT. '/views/site/about.php');

        return true;
    }

    public function actionBlog($id = false)
    {
        if (!$id) {
            $id = 1;
        }
        $blog = Blog::getBlogItemById($id);
        $blogs = Blog::getBlogList();
        require_once(ROOT. '/views/site/blog.php');

        return true;
    }



}
