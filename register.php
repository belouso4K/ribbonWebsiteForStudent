<?php include_once('header.php'); ?>
<?php include_once('api/register_db.php'); ?>
<section class="main-section auth-section">
    <div class="container">
        <form action="" class="form-auth" method="post">

            <h1>Регистрация</h1>

            <label for="">
                <p>Имя</p>
                <input type="text" name="login" placeholder="Введите никнейм">
            </label>
            <label for="">
                Пароль
                <input class="eye"  type="password" name="password" placeholder="Введите пароль">
            </label>
            <label for="">
                Повторите пароль
                <input class="eye" type="password" name="password_confirmation" placeholder="Введите пароль повторно">
            </label>
            <?php if (isset($_GET['empty'])) : ?>
                <p style="color: red">Вы ввели не всю информацию!</p>
            <?php endif; ?>
            <?php if (isset($_GET['error']) && $_GET['error'] == 'login') : ?>
                <p style="color: red">Извините, введённый вами логин уже зарегистрирован!</p>
            <?php endif; ?>
            <input name="submit" id="entry" type="submit" value="Зарегистрироваться" class="btn"/>

        </form>
    </div>
</section>

<?php include_once('footer.php'); ?>