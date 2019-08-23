<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <br/>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Настройки сайта</li>
                </ol>
            </div>
            <h4>Настройки сайта</h4>
            <br/>
            <div class="login-form">
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-sm-3">
                            <p>Название магазина(футер)</p>
                            <input type="text" name="shop_name" placeholder=""
                                   value="<?php echo $setting['shop_name']; ?>">
                            <p>Контактный елефон</p>
                            <input type="text" name="phone" placeholder="" value="<?php echo $setting['phone']; ?>">

                        </div>
                        <div class="col-sm-3">
                            <p>Почта для контактов на сайте</p>
                            <input type="text" name="email" placeholder="" value="<?php echo $setting['email']; ?>">
                            <p>Почта для уведомлений менеджеру</p>
                            <input type="text" name="admin_email" placeholder=""
                                   value="<?php echo $setting['admin_email']; ?>">
                        </div>
                        <div class="col-sm-3">
                            <p>Instagram</p>
                            <input type="text" name="instagram" placeholder=""
                                   value="<?php echo $setting['instagram']; ?>">
                            <p>VK</p>
                            <input type="text" name="vk" placeholder="" value="<?php echo $setting['vk']; ?>">
                        </div>
                        <div class="col-sm-3">
                            <p>Валюта для товаров</p>
                            <input type="text" name="valuta" placeholder="" value="<?php echo $setting['valuta']; ?>">
                        </div>
                        <div class="col-sm-12">
                            <p>О магазине</p>
                            <textarea name="about" rows="10"><?php echo $setting['about']; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
