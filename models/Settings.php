<?php


class Settings
{
    public static function getSettingValue($key)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT {$key} FROM settings");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $value = $result->fetch();

        return $value[$key];
    }

    public static function getSettings()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM settings');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }

    public static function updateSettings($options)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE settings SET 
                phone = :phone, 
                email = :email, 
                instagram = :instagram, 
                vk = :vk, 
                shop_name = :shop_name,
                about = :about,
                valuta = :valuta,
                admin_email = :admin_email 
                 WHERE id = 1';

        $result = $db->prepare($sql);
        $result->bindParam(':phone', $options['phone'], PDO::PARAM_STR);
        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $result->bindParam(':instagram', $options['instagram'], PDO::PARAM_STR);
        $result->bindParam(':vk', $options['vk'], PDO::PARAM_STR);
        $result->bindParam(':shop_name', $options['shop_name'], PDO::PARAM_STR);
        $result->bindParam(':about', $options['about'], PDO::PARAM_STR);
        $result->bindParam(':valuta', $options['valuta'], PDO::PARAM_STR);
        $result->bindParam(':admin_email', $options['admin_email'], PDO::PARAM_STR);

        return $result->execute();
    }

}