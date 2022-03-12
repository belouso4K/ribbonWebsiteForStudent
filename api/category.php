<?php
$sql_category = "CREATE TABLE category (id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255));";
if ($conn->query($sql_category)) {
} else {}

$sql2 = "SELECT * FROM category";
if (!$category = $conn->query($sql2)) {
    echo mysqli_error($conn);
    exit();
}
$count = array();
$sql_prod = "SELECT * FROM products";
$products_cat = $conn->query($sql_prod);
if ($products_cat) {
    foreach ($products_cat as $row_cat_id) {
        array_push($count, $row_cat_id['category_id']);
    }
}



