<?php include_once('header.php'); ?>
<?php include('api/all-products.php') ?>
<?php include('api/category.php');

?>
    <section class="main-section">
        <div class="container">
            <h2>
                Все товары
            </h2>
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
                        <?php if($products) : ?>
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
                        <?php endif; ?>

                    </div>
                    <?php
                    if (isset($total_pages) && $total_pages > 1) {
                    $pagLink = "<ul class='pagination'>";
                    for ($i=1; $i<=$total_pages; $i++) {
                        $pagLink .= "<li class='page-item'><a class='page-link' href='/all-products.php?page=".$i."'>".$i."</a></li>";
                    }
                    echo $pagLink . "</ul>";
                    }
                    ?>

                </div>

            </div>
        </div>
    </section>

<?php include_once('footer.php'); ?>