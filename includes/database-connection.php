<?php
            
$server   = 'localhost'; 
$username = 'root';         
$password = '';              
$db       = 'btth01_cse485';       
global $conn;
$conn = mysqli_connect($server,$username,$password);

if(!$conn){
     die('Không thể kết nối: ', mysql_error($conn));
}
mysql_select_db($conn,$db);