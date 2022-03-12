<?php include_once('header.php'); ?>
<?php include('api/phpSearch.php'); ?>
<?php include('api/category.php'); ?>
    <section class="main-section">

        <div class="container">
                <?php if(isset($_GET['cat_id'])) :?>
                    <?php if(isset($products)) :?>
                        <?php foreach($category as $row){ ?>
                            <?php if($row['id'] == $_GET['cat_id']) :?>
                                <h2>
                                    Категория: <?php echo $row['name']?>
                                </h2>
                            <?php endif; ?>
                        <?php } ?>
                    <?php else: ?>
                        <h2>
                            В данной категории нет товаров
                        </h2>
                    <?php endif; ?>

                <?php else: ?>
                    <?php if(isset($products)) :?>
                        <h2>
                            По запросу: <?php echo $search;?>
                        </h2>
                    <?php else: ?>
                        <h2>
                            По запросу: <?php echo $search;?> - ничего не найдено
                        </h2>
                    <?php endif; ?>

                <?php endif; ?>


            <div class="tegs">
                <?php if($category) : ?>
                    <?php foreach($category as $row){ ?>
                        <?php if(isset($products)) : ?>
                            <?php foreach(array_unique($count) as $row_2){ ?>
                                <?php if($row['id'] == $row_2) : ?>
                                    <a href="search.php?cat_id=<?php echo $row['id']?>"> <?php echo $row['name']?></a>
                                <?php endif; ?>
                            <?php } ?>
                        <?php endif; ?>
                    <?php } ?>
                <?php endif; ?>
            </div>
            <div class="flex-position">

                <div class="right-content">
                    <div class="wrapper-products">
                <?php if (isset($products) && $products) : ?>
                        <?php foreach($products as $row){ ?>
                            <div class="product-item">
                                <div class="img-product">
                                    <img src="assets/img/products/<?php echo $row["img"]; ?>" alt="">
                                </div>
                                <div class="product-item__title">
                                    <h4>
                                        <?php echo $row["title"]; ?>
                                    </h4>
                                    <div class="product-item__elem">
                                        <p>Россия,  <span><?php echo $row["weight"]; ?></span> <?php echo $row["unit"]; ?></p>
                                        <span><i class="fas fa-star"></i>3.4</span>

                                    </div>
                                    <div class="product-item__price">
                                        <div class="product-item__promotion">
                                            <span>Цена по акции</span>
                                            <span class="price"><?php echo $row["price"]; ?> ₽</span>
                                        </div>
                                        <div class="product-item__old">
                                            <span>Старая цена</span>
                                            <span class="price"><?php echo $row["old_price"]; ?> ₽</span>
                                        </div>
                                    </div>
                                    <button data-id="<?php echo $row["id"]; ?>" class="product-item__btn">В корзину</button>
                                </div>
                            </div>
                        <?php } ?>
                <?php else: ?>
                    <p>
                        "По вашему запросу ничего не найдено"
                    </p>
                <?php endif; ?>
                    </div>

                </div>

            </div>
        </div>
    </section>

<?php include_once('footer.php'); ?>