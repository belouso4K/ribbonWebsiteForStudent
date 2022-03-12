<?php include_once('header.php'); ?>
<?php include('../api/admin/all-products.php') ?>
<section>
    <div class="container">
        <h2>Список товаров</h2>
        <div class="admin-list-products">
            <div class="admin-list-column">
                <p>id</p>
                <p>Изображение</p>
                <p>Название</p>
                <p>Старая цена</p>
                <p>Цена со скидкой</p>
                <p>Действия</p>
            </div>
            <?php if($result) : ?>
                <?php foreach($result as $row){ ?>
                    <div class="admin-list-column">
                        <div>
                            <?php echo $row["id"]; ?>
                        </div>
                        <div class="img">
                            <img src="../assets/img/products/<?php echo $row["img"]; ?>" alt="">
                        </div>
                        <p><?php echo $row["title"]; ?></p>
                        <div>
                            <p><?php echo $row["old_price"]; ?> ₽</p>
                        </div>
                        <div>
                            <p><?php echo $row["price"]; ?> ₽</p>
                        </div>
                        <div class="active">
                            <a href="/admin/products-create.php?id=<?php echo $row["id"]; ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form id="form" action='/api/admin/delete.php' method='post'>
                                <i onclick="deleteEl(this)" class="fas fa-times"></i>
                                <input type='hidden' name='id' value='<?php echo $row["id"]; ?>' />
                                <input type='hidden' name='img' value='<?php echo $row["img"]; ?>' />
                            </form>
                        </div>

                    </div>
                <?php } ?>
            <?php endif; ?>
        </div>
        <?php
        if (isset($total_pages) && $total_pages > 1) {
            $pagLink = "<ul class='pagination'>";
            for ($i = 1; $i <= $total_pages; $i++) {
                $pagLink .= "<li class='page-item'><a class='page-link' href='/admin/?page=" . $i . "'>" . $i . "</a></li>";
            }
            echo $pagLink . "</ul>";
        }
        ?>
    </div>
</section>

<?php include_once('footer.php'); ?>
