<?php
include_once('db.php');

$sql = "CREATE TABLE orders (id INTEGER AUTO_INCREMENT PRIMARY KEY, id_users
    integer(15), id_products VARCHAR(255), login VARCHAR(15));";

if ($conn->query($sql)) {

} else {

}


if (isset($_POST['submit'])) {
    $id_users = $_POST['id'];
    $login = $_POST['login'];
    $id_products = $_POST['id_products'];
    echo $id_products;
    $result = $conn->query("INSERT INTO orders (id_users,id_products,login) VALUES('$id_users','$id_products','$login')");

    if ($result == 'TRUE') {
        header( 'Location:' . '/' );
    } else {
        echo "Ошибка!",mysqli_error($conn);
    }
}

mysqli_close($conn);