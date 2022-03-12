<?php
include_once('db.php');

if (!empty($_SESSION['login']) or !empty($_SESSION['id'])) {
    header( 'Location:' . '/' );
    exit;
}

$sql = "CREATE TABLE users (id INTEGER AUTO_INCREMENT PRIMARY KEY, login VARCHAR(15), password VARCHAR(255), role VARCHAR(15));";
if ($conn->query($sql)) {
    echo "Таблица Users успешно создана";
} else {

}

if (isset($_POST['submit'])) {
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        if ($login == '') {
            unset($login);
        }
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        if ($password == '') {
            unset($password);
        }
    }
    if (isset($_POST['password_confirmation']) && $_POST['password'] != $_POST['password_confirmation']) {
        unset($password);
    }

    if (empty($login) or empty($password))
    {
        header( 'Location:' . '/register.php?empty=true' );
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }

    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $login = trim($login);
    $password = trim($password);

    $result = $conn->query("SELECT id FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
        header( 'Location:' . '/register.php?error=login' );
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }

    $result2 = $conn->query("INSERT INTO users (login,password) VALUES('$login','$password')");

    if ($result2 == 'TRUE') {
        $result3 = $conn->query( "SELECT id FROM users WHERE login='$login'");
        $myrow = mysqli_fetch_array($result3);
        $_SESSION['login']=$login;
        $_SESSION['id']=$myrow['id'];
        header( 'Location:' . '/' );
    } else {
        echo "Ошибка! Вы не зарегистрированы.";
    }
}

mysqli_close($conn);