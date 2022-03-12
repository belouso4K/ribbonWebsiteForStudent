<?php include_once('header.php'); ?>

    <section class="offer">
        <div class="container">
            <div class="slider">
                <img src="assets/img/slider-1.jpg" alt="">
                <img src="assets/img/slider-2.jpg" alt="">
                <img src="assets/img/slider-3.png" alt="">
            </div>
            <div class="offer-services">
                <div class="offer-services__item">
                    <div class="offer-services--logo">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="offer-services--desc">
                        Предложения от партнёров
                    </div>
                </div>
                <div class="offer-services__item">
                    <div class="offer-services--logo">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="offer-services--desc">
                        Важно! Безопасность. Актуальное
                    </div>
                </div>
                <div class="offer-services__item">
                    <div class="offer-services--logo">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="offer-services--desc">
                        Установите мобильное приложение
                    </div>
                </div>
                <div class="offer-services__item">
                    <div class="offer-services--logo">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="offer-services--desc">
                        Доставка продуктов
                    </div>

                </div>
            </div>
        </div>

    </section>
    <section class="cards-section main-section">

        <div class="container">
            <div class="title-main">
                <h2>
                    Выбор покупателя
                </h2>
                <a href="all-products.php">Смотреть все товары
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
            <div class="flex-position">
                <div class="right-content">
                    <?php include('api/products-slider.php');?>
                    <?php if($result) :?>
                        <div class="slider-products">
                            <?php foreach($result as $row){ ?>
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
                                    <h4></h4>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endif;?>

                </div>

            </div>


        </div>
    </section>
    <section class="offer-1">
        <div class="container">
            <img src="assets/img/offer-1.jpg" alt="">
        </div>
    </section>

    <section class="cards-section main-section">

        <div class="container">
            <div class="title-main">
                <h2>
                    Товары недели
                </h2>
                <a href="all-products.php">Смотреть все товары
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
            <div class="flex-position">
                <?php include('api/products-slider.php');?>
                <div class="right-content">

                    <?php if($result) :?>
                        <div class="slider-products">
                            <?php foreach($result as $row){ ?>
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
                                    <h4></h4>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <img src="assets/img/offer-2.png" alt="">
        </div>
    </section>

    <section class="cards-section main-section">
        <div class="container">
            <div class="title-main">
                <h2>
                    Хит-цена
                </h2>
                <a href="all-products.php">Смотреть все товары
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
            <div class="flex-position">
                <div class="right-content">
                    <?php include('api/products-slider.php');?>
                    <?php if($result) :?>
                        <div class="slider-products">
                            <?php foreach($result as $row){ ?>
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
                                    <h4></h4>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endif;?>

                </div>

            </div>

        </div>
    </section>

    <section class="cards-section">
        <div class="container">
            <div class="title-main">
                <h2>
                    Собственные марки и эксклюзивные бренды
                </h2>
                <a href="all-products.php">Смотреть все товары
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
            <div class="brand">
                <div class="brand-block">
                    <img src="assets/img/brand-1.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-2.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-3.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-4.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-5.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-6.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-7.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-8.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-9.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-10.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-11.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-12.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-13.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-14.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-15.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-16.png" alt="">
                </div>
                <div class="brand-block">
                    <img src="assets/img/brand-17.png" alt="">
                </div>

            </div>

        </div>
    </section>
<?php include_once('footer.php'); ?>