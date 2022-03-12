<?php
include('../api/db.php');

$sql = "CREATE TABLE products (id INTEGER AUTO_INCREMENT PRIMARY KEY, title VARCHAR(255), weight integer(255),unit VARCHAR(12), 
price VARCHAR(15), old_price VARCHAR(15), img VARCHAR(255), category_id integer(255));";
if ($conn->query($sql)) {
} else {}

if (isset($_POST['submit'])) {
    $error= '';
    $img = '';
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
        if ($title == '') {
            unset($title);
        }
    }
    if (isset($_POST['weight'])) {
        $weight = $_POST['weight'];
        if ($weight == '') {
            unset($weight);
        }
    }
    if (isset($_POST['price'])) {
        $price = $_POST['price'];
        if ($price == '') {
            unset($price);
        }
    }
    if (isset($_POST['old_price'])) {
        $old_price = $_POST['old_price'];
        if ($old_price == '') {
            unset($old_price);
        }
    }
    if (isset($_POST['category_id'])) {
        $category_id = $_POST['category_id'];
        if ($category_id == '') {
            unset($category_id);
        }
    }

    if (isset($_FILES['img']['name'])) {
        $img = $_FILES['img']['name'];
        if ($img == '') {
            unset($img);
        }
    }
    if (isset($_POST['unit'])) {
        $unit = $_POST['unit'];
        if ($unit == '') {
            unset($unit);
        }
    }

    if (empty($title) or empty($weight) or empty($price) or empty($old_price) or empty($img) or empty($category_id) or empty($unit))
    {
        $error = "Вы ввели не всю информацию!";
        return;
    }

    $result = $conn->query( "SELECT id FROM products WHERE title='$title'");
    $myrow = mysqli_fetch_array($result);

    if (!empty($myrow['id'])) {
        $error = "Извините, товар уже существует.";
        return;
    }

    $result2 = $conn->query("INSERT INTO products (title,weight,unit,price,old_price,img,category_id) VALUES('$title','$weight','$unit','$price','$old_price','$img', '$category_id')");

    if ($result2 == 'TRUE') {
        if (isset($myrow['id']) or !empty($img)) {
            $uploaddir='../assets/img/products/';
            $uploadfile=$uploaddir.basename($_FILES['img']['name']);

            if(copy($_FILES['img']['tmp_name'], $uploadfile)){

            }
            else {
                $error = "Файл не загружен,максимальный размер файла 2 мб ";
                return;
            }
        }
        $result3 = $conn->query( "SELECT id FROM products WHERE title='$title'");
        $myrow = mysqli_fetch_array($result3);
        header( 'Location:' . '/admin/products-create.php?id='.$myrow['id']);
    } else {
        $error = "Ошибка! Товар не добавлен";
        return;
    }

}

mysqli_close($conn);