<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние блоги</h2>
                    <div class="product-image-wrapper">
                        <div class="col-sm-12">
                            <div class="single-products">
                                <div class="blog-info">
                                    <h2><?php echo $blog['title']; ?></h2>
                                    <p>
                                        <?php echo $blog['short_content']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Все темы :</h2>
                    <div class="panel-group">
                        <?php foreach ($blogs as $blog) : ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/blog/<?php echo $blog['id'];?>">
                                            <?php echo $blog['title']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
