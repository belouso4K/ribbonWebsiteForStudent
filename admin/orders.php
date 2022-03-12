<?php include_once('header.php'); ?>
<?php include('../api/admin/orders.php') ?>
<?php
if (empty($row_orders)) {
    header( 'Location:' . '/admin' );
    exit;
}
?>

<section class="section-orders">
    <div class="container">
        <h2>Список товаров</h2>
        <div class="admin-list-products">
            <div class="admin-list-column">
                <p>id</p>
                <p>id пользователя</p>
                <p>логн пользователя</p>
                <p>id товар(а,ов)</p>
                <p>Действие</p>
            </div>
            <?php foreach($result as $row){ ?>
                <div class="admin-list-column">
                    <p><?php echo $row["id"]; ?></p>
                    <p><?php echo $row["id_users"]; ?></p>
                    <p><?php echo $row["login"]; ?></p>
                    <p><?php echo $row["id_products"]; ?></p>
                    <div class="active">
                        <form id="form" action='/api/admin/delete-order.php' method='post'>
                            <i onclick="deleteOrder(this)" class="fas fa-times"></i>
                            <input type='hidden' name='id' value='<?php echo $row["id"]; ?>' />
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php include_once('footer.php'); ?>
