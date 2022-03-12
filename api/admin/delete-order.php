<?php
include('../db.php');
if(isset($_POST["id"]))
{
    $id = $_POST["id"];
    $sql = "DELETE FROM orders WHERE id = '$id'";
    if($conn->query($sql)){
        header("Location: /admin/orders.php");
    }
    else{
        echo "Ошибка: " . $conn->error;
    }

}