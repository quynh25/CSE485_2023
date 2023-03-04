<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $conn = new mysqli($host, $user, $pass,'btth01_cse485');

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["submit"])){
        $matgia = $_POST["txtId"];
        $tentgia = $_POST["txtName"];
        $hinhtgia = $_POST["hinhanh"];
    }

    $sql = "UPDATE tacgia SET ten_tgia = '$tentgia', hinh_tgia='$hinhtgia' WHERE ma_tgia = '$matgia'";
    if (mysqli_query($conn, $sql)){
        // echo "Connected successfully";
        header('location: ../author/author.php');
    }
    else {
        $result = "Cập nhật chưa thành công" .mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>