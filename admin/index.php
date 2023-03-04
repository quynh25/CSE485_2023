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
                        <a class="nav-link active fw-bold" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author/author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">

        <div class="row">
            <?php
                $host="localhost";
                $username="root";
                $password="";
                $database="btth01_cse485";
                $conn=mysqli_connect($host,$username,$password,$database);
                mysqli_query($conn,"SET NAMES 'utf8'");
                if (mysqli_connect_error()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $sql = "SELECT COUNT(tendn) from users";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result) ;

                $sql1 = "SELECT COUNT(ma_tloai) from theloai ";
                $result1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_assoc($result1) ;

                $sql2 = "SELECT COUNT(ma_tgia) from tacgia ";
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_assoc($result2) ;

                $sql3 = "SELECT COUNT(ma_bviet) from baiviet ";
                $result3 = mysqli_query($conn,$sql3);
                $row3 = mysqli_fetch_assoc($result3) ;
                
            ?>
                        <div class="col-sm-3">
                            <div class="card mb-2" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        <a href="" class="text-decoration-none">Người dùng</a>
                                    </h5>

                                    <h5 class="h1 text-center">
                                    <?php echo $row['COUNT(tendn)'];?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card mb-2" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        <a href="" class="text-decoration-none">Thể loại</a>
                                    </h5>

                                    <h5 class="h1 text-center">
                                    <?php echo $row1['COUNT(ma_tloai)'];?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card mb-2" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        <a href="" class="text-decoration-none">Tác giả</a>
                                    </h5>

                                    <h5 class="h1 text-center">
                                       <?php echo $row2['COUNT(ma_tgia)'];?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card mb-2" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        <a href="" class="text-decoration-none">Bài Viết</a>
                                    </h5>

                                    <h5 class="h1 text-center">
                                       <?php echo $row3['COUNT(ma_bviet)'];?>
                                    </h5>
                                </div>
                            </div>
                        </div>

        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>