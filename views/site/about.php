<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h5>О магазине</h5>
                    <?php echo Settings::getSettingValue('about'); ?>
                </div>
            </div>
    </section>


    <br/>
    <br/>

<?php include ROOT . '/views/layouts/footer.php'; ?>