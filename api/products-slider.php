<?php
include_once('db.php');

$result = $conn->query("SELECT * FROM products ORDER BY rand() LIMIT 5");

if($result) {
    $myrow = mysqli_fetch_array($result);
}

