<?php


class AdminSettingsController extends AdminBase
{
    public function actionSettings()
    {
        self::checkAdmin();

        $setting = Settings::getSettings();

        if (isset($_POST['submit'])) {
            $options['phone'] = $_POST['phone'];
            $options['email'] = $_POST['email'];
            $options['instagram'] = $_POST['instagram'];
            $options['vk'] = $_POST['vk'];
            $options['shop_name'] = $_POST['shop_name'];
            $options['about'] = $_POST['about'];
            $options['valuta'] = $_POST['valuta'];
            $options['admin_email'] = $_POST['admin_email'];

            Settings::updateSettings($options);

            header("Location: /admin/settings");
        }

        require_once (ROOT . '/views/admin_settings/settings.php');
        return true;
    }

}