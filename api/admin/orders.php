<?php
include('../api/db.php');

$sql = "SELECT * FROM orders";
if(!$result = $conn->query($sql)){
    exit();
}