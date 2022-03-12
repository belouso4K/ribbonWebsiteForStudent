<?php include_once('header.php'); ?>
<?php include_once('api/login_db.php'); ?>

<section class="main-section auth-section">
    <div class="container">
        <form id="log" class="form-auth log" action="" method="post">
            <h1>Авторизация</h1>
            <label for="">
                Email
                <input name="login" type="text" size="15" placeholder="Введите email">
            </label>
            <label for="">
                Пароль
                <div>
                    <input class="eye" type="password" name="password" placeholder="Введите пароль">
                </div>
            </label>
            <?php if (isset($_GET['empty'])) : ?>
                <p style="color: red">Вы ввели не всю информацию!</p>
            <?php endif; ?>
            <?php if (isset($_GET['error']) && $_GET['error'] == 'login') : ?>
                <p style="color: red">Извините, введённый вами login или пароль неверный!</p>
            <?php endif; ?>
            <input name="submit" id="entry" type="submit" value="Войти" class="btn"/>
        </form>
    </div>
</section>
<?php include_once('footer.php'); ?>