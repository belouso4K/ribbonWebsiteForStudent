<?php
include_once('db.php');

if (!empty($_SESSION['login']) or !empty($_SESSION['id'])) {
    header( 'Location:' . '/' );
    exit;
}

if (isset($_POST['submit'])) {
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

    if (empty($login) or empty($password))
    {
        header( 'Location:' . '/login.php?empty=true' );
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }

    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $login = trim($login);
    $password = trim($password);

    $result = $conn->query("SELECT * FROM users WHERE login='$login'");
    if ($result) {
        $myrow = mysqli_fetch_array($result);
        if (empty($myrow['password']))
        {
            header( 'Location:' . '/login.php?error=login' );
            exit ("Извините, введённый вами login или пароль неверный.");
        }
        else {
            if ($myrow['password']==$password) {
                $_SESSION['login']=$myrow['login'];
                $_SESSION['id']=$myrow['id'];
                $_SESSION['admin']=$myrow['role'];
                header( 'Location:' . '/' );
                echo "Вы успешно вошли на сайт! <a href='index.php'>Главная страница</a>";
            }
            else {
                header( 'Location:' . '/login.php?error=login' );
                exit ("Извините, введённый вами login или пароль неверный.");
            }
        }
    } else {
        header( 'Location:' . '/login.php?error=login' );
        exit ("Извините, введённый вами login или пароль неверный.");
    }


}

mysqli_close($conn);