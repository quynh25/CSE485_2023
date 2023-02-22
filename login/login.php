<?php

include "includes/database-connection.php";
global $conn;

if(isset($_POST['uname']) && isset($_POST['password'])){
     function validate($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
     }
     $uname = validate($_POST['uname']);
     $pass = validate($_POST['password']);

     if(empty($uname)){
          header("Location: index.php?error=User Name is required");
          exit();
     }elseif(empty($pass)){
          header("Location: index.php?error=Password is required");
          exit();
     }else{
          $sql= "select * from users where tendn = '$uname' and  matkhau= '$pass'";
          $result = mysqli_query($conn,$sql);
          if(mysqli_num_rows($result) === 1){
              $row = mysqli_fetch_assoc($result);
              if($row['tendn']===$uname && $row['matkhau']===$pass){
                 $SESSION['tendn'] = $row['tendn'];
                 $SESSION['matkhau'] = $row['matkhau'];
                 header("Location: ../admin/index.php");
                 exit();
              }
          }else{
               header("Location: index.php?error=Incorect User name or password");
               exit();
          }
     }
     
}else{
     header("Location: index.php");
     exit();
}
?>