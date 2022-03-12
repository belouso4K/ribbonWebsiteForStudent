<?php
$conn = @new mysqli("localhost", "root", "", 'lenta');

if($conn->connect_error){
    $error_db = 'database не подключена';
    die("Ошибка: " . $conn->connect_error);
}


