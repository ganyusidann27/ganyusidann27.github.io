<!DOCTYPE html>
<html>
<head>
	<title>Quản lý sinh viên</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>	
    <style>
    	.center {
		  display: flex;
		  justify-content: center;
		  align-items: center;
		  height: 30vh;
		}
	</style>
</head>
<body>
	<nav>
        <label class="logo">Ganyuuf</label>
        <ul>
            <li><a href="trangchu.php" class="active">▶Trang chủ</a></li>
            <li><a href="them.php">1</a></li>
            <li><a href="themuser.php">2</a></li>
            <li><a href="timkiem.php" class="active">3</a></li>
            <!-- <li><a href="timkiem.php">Quản lý Sinh viên</a></li> -->
            <li><a href="trangchu.php" id="order">Quay lại</a></li>
            <li><a href="dangnhap.php" id="order">Đăng xuất!</a></li>
            <li>
                <a href="#">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="sumItem">
                        !
                    </span>
                </a>
            </li>
        </ul>
    </nav>
	<section class="banner"></section>
	<div class="featuredProducts">
       	<h1>Trang chủ Quản lý Sinh viên</h1>
	</div>

<?php
// Kết nối database
$conn = mysqli_connect('localhost', 'root', '', 'd16cnpm2');
// Nếu không thể kết nối, hiển thị thông báo lỗi và kết thúc chương trình
if (!$conn) {die('Không thể kết nối: ' . mysqli_connect_error());}
// Xử lý khi người dùng submit form
if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    // Lấy giá trị từ form
    $inputFullname = $_POST['fullname'];
    // Query tìm kiếm sinh viên theo họ tên trong cơ sở dữ liệu
    $query = "SELECT * FROM tbluser WHERE fullname LIKE '%$inputFullname%';";
    $result = mysqli_query($conn, $query);
    // Nếu tìm thấy kết quả, hiển thị danh sách sinh viên
    if(mysqli_num_rows($result) > 0) 
    {
        echo '<h3 style="margin: 20px 0 0 470px">▶Kết quả tìm kiếm (Theo tên Sinh viên):</h3>';
        echo '<table style="margin: 20px 0 0 470px; width: 700px">';
        echo   '<tr align="center">
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Lớp</th>
                    <th>Quê Quán</th>
                </tr>';
        while($row = mysqli_fetch_assoc($result)) 
        {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['fullname'] . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['password'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    // Nếu không tìm thấy kết quả, hiển thị thông báo không tìm thấy
    else {echo '<p style="margin: 20px 0 0 400px">- (Cảnh báo!) ▶Không tìm thấy sinh viên nào với họ tên "' . $inputFullname . '".</p>'; }
    mysqli_free_result($result);
}
// Đóng kết nối
mysqli_close($conn);
?>
<!-- Form tìm kiếm sinh viên -->
<form method="post">
    <label style="margin: 20px 0 0 400px" for="fullname">- Nhập họ tên Sinh viên:</label>
    <input style="margin: 20px 0 0 20px; width: 500px" type="text" id="fullname" name="fullname">
    <input style="width: 150px" type="submit" value="Tìm kiếm">
</form>

<footer>
        <div class="social">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
        <ul class="list">
            <li>
                <a href="#">Trang Chủ</a>
            </li>
            <li>
                <a href="them.php">Quản lý</a>
            </li>
        </ul>
        <p class="copyright">Quản lý Sinh viên</p>
    </footer>
</body>
</html>