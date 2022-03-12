<?php
include_once('db.php');

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "select * from products where title like '%$search%'";
    $result = $conn->query($sql);
    if ($result) {
        if ($result->num_rows > 0){
            $products = $result;
        } else {
            $products = 0;
        }
    }

//    $conn->close();
}

if(isset($_GET['cat_id'])) {

    $category_id = $_GET['cat_id'];
    $sql = "select * from products where category_id='$category_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $products = $result;
    } else {
        $products = 0;
    }
//    $conn->close();
}

?>