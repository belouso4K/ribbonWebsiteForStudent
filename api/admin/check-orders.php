<?php
include('../api/db.php');

$orders_sql = 'SELECT 1 FROM orders LIMIT 1';
$check_orders = $conn->query($orders_sql);
if($check_orders) {
    $row_orders = $check_orders->fetch_row();

    return (bool) $row_orders;
}
