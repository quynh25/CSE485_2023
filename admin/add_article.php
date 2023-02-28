<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
</head>
<body>
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

    </header>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">

          <?php
               // Bước 01: Kết nối tới DB Server
               $conn = mysqli_connect('localhost','root','','btth01_cse485');
               if(!$conn){
                    die('Kết nối tới Server lỗi');
               }
               // Bước 02: Thực hiện truy vấn
               $sql_tloai = "select * from theloai";
               $result_tloai = $conn->query($sql_tloai);

               $sql_tgia = "select * from tacgia";
               $result_tgia = $conn->query($sql_tgia);

              if(isset($_POST['sbm'])){
               $tieude= $_POST['tieude'];
               $tenbhat= $_POST['tenbhat'];
               $matloai= $_POST['matloai'];
               $tomtat= $_POST['tomtat'];
               $noidung= $_POST['noidung'];
               $matgia= $_POST['matgia'];
               $ngayviet= $_POST['ngay'];
               $hinhanh = $_FILES['anh']['name'];
               $hinhanh_tmp = $_FILES['anh']['tmp_name'];

               $sql = "INSERT INTO `baiviet`
               VALUES(NULL, '$tieude', '$tenbhat', '$matloai', '$tomtat', '$noidung','$matgia','$ngayviet','$hinhanh');";

               $query = mysqli_query($conn,$sql);
               move_uploaded_file($hinhanh_tmp,'./images/songs/'.$hinhanh);
               header('Location: article.php');
              }
              
          ?>   

            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
                <form action="add_article.php" method="post" enctype="multipart/form-data">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tiêu đề</span>
                        <input type="text" class="form-control" name="tieude" required >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên bài hát</span>
                        <input type="text" class="form-control" name="tenbhat" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên thể loại</span>
                        <select name="matloai" id="">
                              <?php
                                   while( $row_tloai = $result_tloai->fetch_assoc()){?>
                                        <option value="<?php echo $row_tloai['ma_tloai']?>"><?php echo $row_tloai['ten_tloai']?></option>
                                   <?php
                                   }
                                   ?>
                             
                        </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tóm tắt</span>
                        <input type="text" class="form-control" name="tomtat" required >
                        <!-- <div type="text"id="tomtat"name="tomtat"class="form-control"></div> -->
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#tomtat' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Nội dung</span>
                        <input type="text" class="form-control" name="noidung"  >
                        <!-- <div id="noidung"name="noidung" class="form-control"></div> -->
                        <!-- <script>
                            ClassicEditor
                                .create( document.querySelector( '#noidung' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script> -->
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                        <select name="matgia" id="">
                              <?php
                                   while( $row_tgia = $result_tgia->fetch_assoc()){?>
                                        <option value="<?php echo $row_tgia['ma_tgia']?>"><?php echo $row_tgia['ten_tgia']?></option>
                                   <?php
                                   }
                                   ?>
                             
                       
                        </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Ngày viết</span>
                        <input type="date" class="form-control" name="ngay" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="name">Hình ảnh</span>
                        <input type="file" class="form-control" name="anh"  >
                    </div>

                    <div class="form-group  float-end ">
                         <!-- <button name = "sbm" class="btn btn-success">Thêm</button> -->
                        <input type="submit" name = "sbm" value="Thêm" class="btn btn-success">
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
</html>