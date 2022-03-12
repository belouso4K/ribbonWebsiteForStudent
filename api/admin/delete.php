<?php
include('../db.php');
if(isset($_POST["id"]))
{
    $userid = $_POST["id"];
    $img = $_POST["img"];
    $sql = "DELETE FROM products WHERE id = '$userid'";
    if($conn->query($sql)){
        if(isset($img)) {
            $uploaddir='../../assets/img/products/';
            @unlink($uploaddir.$img);
        }
        header("Location: /admin");
    }
    else{
        echo "Ошибка: " . $conn->error;
    }

}
