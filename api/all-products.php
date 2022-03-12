<?php
include('api/db.php');

//$sql = "SELECT * FROM products";
//if(!$products = $conn->query($sql)){
//    exit();
//}

$limit = 25;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
}
else{
    $page=1;
};
$start_from = ($page-1) * $limit;
$products = $conn->query("SELECT * FROM products ORDER BY title ASC LIMIT $start_from, $limit");
if($products) {
    $result_db = $conn->query("SELECT COUNT(id) FROM products");
    $row_db = mysqli_fetch_row($result_db);
    $total_records = $row_db[0];
    $total_pages = ceil($total_records / $limit);
}



