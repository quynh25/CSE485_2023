<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="css/style_category_baiviet.css"> -->
</head>
<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <h3 class="text-center text-uppercase fw-bold"style="margin: 50px 0 50px 0;">Thêm mới thể loại</h3>
    </header>
    
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new mysqli($servername, $username, $password,'btth01_cse485');

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql_them = "SELECT * FROM baiviet";
        $result = $conn->query($sql_them);

        $sql_tgia = "select * from tacgia";
        $result_tgia = $conn->query($sql_tgia);
        $sql_tloai = "select * from theloai";
        $result_tloai = $conn->query($sql_tloai);
        // $result = $conn->query($sql);
        
        if(isset($_POST['sbm'])){
            $ma_bviet = $POST['ma_bviet'];
            $tieude = $POST['tieude'];
            $ten_bhat = $POST['ten_bhat'];
            $ma_tloai = $POST['ma_tloai'];
            $tomtat = $POST['tomtat'];
            $noidung = $POST['noidung'];
            $ma_tgia = $POST['ma_tgia'];
            $ngayviet = $POST['ngayviet'];
            $hinhanh = $FILE['hinhanh']['ten_tgia'];
            $hinhanh_tmp = $FILE['hinhanh']['ten_tgia'];

            $sql = "INSERT INTO bieude,$ten_bhat,$ma_tloai,$tomtat,$noidung,$ma_tgia, $ngayviet,$hinhanh)";
            $result = $conn->query($sql_them);
            move_uploaded_file($image_tmp,'images/'.$hinhanh);
            header('location: index.php?page_layout=danhsach');
        }
    ?>
    <div class="container-fluid">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Mã bài viết</label>
                    <input type="number"name="ma_bviet" class="form-control" require>
                </div>
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input type="text"name="tieude" class="form-control"require>
                </div>
                <div class="form-group">
                    <label for="">Tên bài hát</label>
                    <input type="text"name="ten_bhat" class="form-control"require>
                </div>
                <div class="form-group">
                    <label for="">Mã thể loại</label>
                    <select class="form-control"name="ma_tloai" >
                        <?php
                            while($row_tloai = $result_tloai->fetch_assoc()){?>
                                <option value="<?php echo $row_tloai['ma_tloai']; ?>"><?php echo $row_tloai['ten_tloai'];?></option>
                            <?php } ?>
                    </select>
                    <!-- <input type="number"name="id_tloai" class="form-control"require> -->
                </div>
                <div class="form-group">
                    <label for="">Tóm tắt</label>                    
                    <input type="text"name="tomtat" class="form-control"require>
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <input type="text"name="noidung" class="form-control"require>
                </div>
                <div class="form-group">
                    <label for="">Mã tác giả</label>
                    <select class="form-control"name="ma_tgia" >
                        <?php
                            while($row_tgia = $result_tgia->fetch_assoc()){?>
                                <option value="<?php echo $row_tgia['ma_tgia']; ?>"><?php echo $row_tgia['ten_tgia'];?></option>
                            <?php } ?>
                    </select>
                    <!-- <input type="number"name="ma_tgia" class="form-control"require> -->
                </div>
                <div class="form-group">
                    <label for="">Ngày viết</label>
                    <input type="date"name="ngayviet" class="form-control"require>
                </div>
                <div class="form-group">
                    <label for="">Hình ảnh</label>
                    <input type="file"name="hinhanh">
                </div>
            </form>

        </div>
    </div>

    

    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <!-- <h3 class="text-center text-uppercase fw-bold">Thêm mới thể loại</h3> -->
                <form action="article.php" method="post">
                    <div class="form-group  float-end ">
                        <!-- <input type="submit" value="Thêm" class="btn btn-success sbm"> -->
                        <button name="sbm"class="btn btn-success" type="submit" >Thêm</button>
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>