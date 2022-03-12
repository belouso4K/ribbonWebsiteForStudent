<?php include_once('header.php'); ?>

    <section class="main-section">
        <div class="container">
            <div class="basket__header">
                <div class="basket__header-left">
                    <h1>Корзина</h1>
                    <a href="index.php">Вернуться в каталог</a>
                </div>
                <div class="basket-del">
                    <i class="far fa-trash-alt"></i>
                    Очистить корзину
                </div>
            </div>
            <div>
                <div class="basket-wrap">
                    <div class="basket-products-right-content">
                        <div class="basket-products">
                        </div>

                    </div>
                    <div class="basket-products__total-price">
                        <div>
                            <div>
                                <p>Товаров в корзине:</p>
                                <p>3</p>
                            </div>
                            <div>
                                <p>Общий вес:</p>
                                <p class="weight">1.181 кг</p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <p>Итого:</p>
                                <p class="total-price">1 236 ₽</p>
                            </div>
                            <div>
                                <p>Итого без скидки:</p>
                                <p class="total-old-price">1 698 ₽</p>
                            </div>
                        </div>
                        <div>
                            <p>
                                Авторизуйтесь, чтобы продолжить оформление и получить скидку
                            </p>
                            <?php if (empty($_SESSION['login']) or empty($_SESSION['id'])) :?>
                                <a href="login.php" class="product-item__btn ">
                                    Вход / Регистрация
                                </a>
                            <?php else: ?>

                                <form action="api/order.php" method="post">
                                    <input type='hidden' name='login' value='<?php echo $_SESSION['login'];; ?>' />
                                    <input type='hidden' name='id' value='<?php echo $_SESSION['id'];; ?>' />
                                    <input type='hidden' name='id_products'/>
                                    <input type='hidden' name='submit'/>

                                    <button onclick="submitOrdres()" type="submit" class="product-item__btn order-btn">
                                        Заказать
                                    </button>
                                </form>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <p class="desc-cart">
                    Стоимость корзины рассчитана исходя из выбранного веса.
                    Окончательная цена может отличаться в меньшую сторону и будет отражена в кассовом чеке.
                    <br><br>
                    Для получения заказа обратитесь на стойку информации.
                    <br><br>
                    Обращаем ваше внимание, что самовывоз алкогольной продукции
                    осуществляется в соответствии с действующими в вашем регионе ограничениями по времени продажи.
                    <br><br>
                    Сервис работает только для физических лиц. Для покупки в качестве
                    юридического лица обратитесь к своему личному менеджеру или по адресу pro@lenta.com.
                </p>
            </div>

        </div>
    </section>

    <script>
    </script>

<?php include_once('footer.php'); ?>