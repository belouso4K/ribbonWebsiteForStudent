<?php session_start();?>
<?php if (isset($_GET['logout'])) session_destroy(); ?>
<?php include('api/db.php');?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Лента</title>
    <link rel="icon" href="assets/img/favicon.ico" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
</head>
<body>
<div class="loader"><img class="blink" src="assets/img/lenta_logo_b.svg" alt=""></div>
<header>
        <nav class="navigation">
            <div class="header-top">
                <div class="container">
                    <div class="location">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="location__title">
                            <div class="location__title_type">
                                Самовывоз из магазина:
                            </div>
                            <div class="location__title_content">
                                п. Воскресенское, пр-д Чечёрский, д. 51
                            </div>
                        </div>
                    </div>
                    <div class="auth">
                        <?php if (empty($_SESSION['login']) or empty($_SESSION['id'])) :?>
                            <a href="login.php">Войти</a>
                            <a href="register.php">Зарегистрироваться</a>
                        <?php else: ?>
                            <a href="login.php?logout=true">
                                Выйти
                            </a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
            <div class="header-main">
                <div class="container">
                    <a href="index.php" class="logo">
                        <img src="assets/img/lenta_logo_b.svg" alt="">
                    </a>
                    <ul>

                        <li>
                            <a href="all-products.php">Все продукты</a>
                        </li>
                    </ul>
                    <form class="search-product" action="search.php" method="post" onsubmit="searchSubmit(this);return false">
                        <input name="search" class="search-product__input" type="text">
                        <button type="submit" class="search-product__btn"><i class="fas fa-search"></i></button>
                    </form>
                    <a href="cart.php" class="cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="current-cart"></span>
                    </a>
                </div>
            </div>

        </nav>
</header>
