<?php session_start();?>
<?php if (isset($_GET['logout'])) session_destroy(); ?>
<?php
if (empty($_SESSION['admin'])) {
    header( 'Location:' . '/' );
    exit;
}
include('../api/admin/check-orders.php')
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>админ-панель</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
</head>
<body class="admin-body">
<div class="loader"><img class="blink" src="../assets/img/lenta_logo_b.svg" alt=""></div>
<header class="admin-header">
    <nav>
        <div class="container">
            <a href="/">Перейти на сайт</a>
            <div>
                <a href="/admin">Все товары</a>
                <a href="/admin/products-create.php">Добавить новый товар</a>
                <?php if (isset($row_orders)) :?>
                    <a href="/admin/orders.php">Заказы</a>
                <?php endif; ?>
            </div>
            <a href="/login.php?logout=true">Выйти</a>
        </div>
    </nav>
</header>