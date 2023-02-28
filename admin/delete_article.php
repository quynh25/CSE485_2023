<?php
    $conn = mysqli_connect('localhost','root','','btth01_cse485');
    if(!$conn){
         die('Kết nối tới Server lỗi');
    }
    $id = $_GET['id'];
    $sql = "delete from baiviet where ma_bviet = $id";
    $query = mysqli_query($conn, $sql);
    header('location: article.php');
?>