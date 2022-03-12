<?php
include('../api/db.php');

//$sql = "SELECT * FROM products";
//$result = $conn->query($sql);

$limit = 6;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
}
else{
    $page=1;
};
$start_from = ($page-1) * $limit;
$result = $conn->query("SELECT * FROM products ORDER BY title ASC LIMIT $start_from, $limit");

$result_db = $conn->query("SELECT COUNT(id) FROM products");
if(isset($result_db)) {
    $row_db = mysqli_fetch_row($result_db);
    $total_records = $row_db[0];
    $total_pages = ceil($total_records / $limit);
}


