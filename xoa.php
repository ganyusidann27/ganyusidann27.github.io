<?php
// Truy vấn database

$servername = "localhost";
$database = "d16cnpm2";
$username = "root";
$password = "";
// Tạo kết nối với CSDL
$connect = mysqli_connect($servername, $username, $password, $database);
//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}
    $id = $_GET['id'];
    $sql = "DELETE FROM `tbluser` WHERE id=$id;";
    // Thực hiện truy vấn data thông qua hàm mysqli_query
    $query = mysqli_query($connect,$sql);
// Sau khi cập nhật dữ liệu, tự động điều hướng về trang Cập nhật sinh viên
header("Location: them.php");

