<?php


class UserController
{

    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Не правильный емайл';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен быть не короце 6-ти  смволов';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой Email уже испоьзуется';
            }

            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }
        }

        require_once (ROOT . '/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {
        $email ='';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен быть не короце 6-ти  смволов';
            }

            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                User::auth($userId);
                header("Location: /cabinet/");
            }
        }

        require_once (ROOT . '/views/user/login.php');

        return true;
    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION['user']);
        header("Location: /");
    }

}