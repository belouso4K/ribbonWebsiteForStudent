<?php
include('../api/db.php');

if (isset($_GET['id'])) {
    $id =  $_GET['id'];
    $result = mysqli_query($conn,"SELECT * FROM products WHERE id='$id'");
    if ($result) {
        $myrow = mysqli_fetch_array($result);
    }
}

if (isset($_POST['submit']) && isset($_GET['id'])) {
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
    if (isset($_POST['unit'])) {
        $unit = $_POST['unit'];
        if ($unit == '') {
            unset($unit);
        }
    }
    if (empty($title) or empty($weight) or empty($price) or empty($old_price) or empty($category_id) or empty($unit))
    {
        $error = "Вы ввели не всю информацию!";
        return;
    }
        echo $_FILES['img']['name'];
        if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != '') {
            $img = $_FILES['img']['name'];
            $uploaddir='../assets/img/products/';
            $uploadfile=$uploaddir.basename($_FILES['img']['name']);
            @unlink($uploaddir.$myrow['img']);
            if(copy($_FILES['img']['tmp_name'], $uploadfile)){

            }else {
                $error = "Файл не загружен,максимальный размер файла 2 мб ";
                return;
            }
        }
    $img = isset($_FILES['img']['name']) && $_FILES['img']['name'] != '' ? $_FILES['img']['name'] : $myrow['img'];

    $sql = "UPDATE products SET title='$title',weight='$weight',unit='$unit',price='$price',old_price='$old_price',img='$img',category_id='$category_id' WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    if (!$query){
        $error ='updating error'. mysqli_error($conn);
        return;
    }
    else {
        header( 'Location:' . '/admin/products-create.php?id='.$id);
    }
}
