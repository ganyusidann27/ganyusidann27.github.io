<?php
$servername = "localhost";
$database = "dangki";
$username = "root";
$password = "";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $database);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}

//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$username = "";
$password = "";
$name = "";
$email = "";

//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["username"])) { $username = $_POST['username']; }
    if(isset($_POST["password"])) { $password = $_POST['password']; }
    if(isset($_POST["name"])) { $name = $_POST['name']; }
    if(isset($_POST["email"])) { $email = $_POST['email']; }

    //Code xử lý, insert dữ liệu vào table Sinh viên
    $sql = "INSERT INTO users (username, password, name, email) VALUES ($username, '$password', '$name', '$email')";

    if (mysqli_query($connect, $sql)) {
        echo "Thêm dữ liệu thành công";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}

//Đóng database
mysqli_close($connect);
?>

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
            <li><a href="themuser.php" class="active">2</a></li>
            <li><a href="timkiem.php">3</a></li>
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
       	<h1>Trang chủ Quản lý Tài khoản</h1>
	</div>
    <form action="" method="post">
        <table align="center" style="margin: 20px 0 0 590px">
            <tr> <td colspan="2" align="center"><b>Thêm Người dùng</b></td></tr>
            <tr>
                <th>Tài khoản:</th>
                <td><input type="text" name="username" value=""></td>
            </tr>
            <tr>
                <th>Mật khẩu:</th>
                <td><input type="text" name="password" value=""></td>
            </tr>
            <tr>
                <th>Họ tên:</th>
                <td><input type="text" name="name" value=""></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><textarea cols="30" rows="7" name="email"></textarea></td>
            </tr>
            <tr>
                    <td colspan="2" align="center"><button type="submit">Thêm người dùng</button></td>
            </tr>
        </table> 
        <?php
        $servername = "localhost";
        $database = "dangki";
        $username = "root";
        $password = "";
        // Create connection
        $connect = mysqli_connect($servername, $username, $password, $database);

        //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
        if (!$connect) {
            die("Không kết nối :" . mysqli_connect_error());
            exit();
        }
            // Lấy 16 bài viết mới nhất đã được phép public ra ngoài từ bảng posts
            $sql = "select * from users ";
            // Thực hiện truy vấn data thông qua hàm mysqli_query
            $query = mysqli_query($connect,$sql);
        ?>
        <br>
        <table wusernameth="100%" border="1" align="center" style="margin: 0 0 20px 410px">
                    <tr><td colspan="6" align="center"><b>Danh sách người dùng hiện có</b></td></tr>
                    <tr><td align="center" width = 200><b>Tài khoản: </b></td>
                        <td align="center" width = 200><b>Mật khẩu</b></td>
                        <td align="center" width = 200><b>Hệ tên</b></td>
                        <td align="center" width = 200><b>Email</b></td>
                        <!-- <td align="center" width = 200><b>Sửa</b></td>
                        <td align="center" width = 200><b>Xóa</b></td> -->
                    </tr>
                        <?php
                            // Khởi tạo biến đếm $i = 0
                            $i = 0;
                            // Lặp dữ liệu lấy data từ cơ sở dữ liệu
                            while ( $data = mysqli_fetch_array($query) ) {
                                // Nếu biến đếm $i = 4, tức là vòng lặp chạy tới bài viết thứ tư thì ta thực hiện xuống hàng cho sinh viên kế tiếp
                                // Vì mỗi dòng hiển thị, ta chỉ hiển thị 4 bài viết
                                if ($i == 4) {
                                    echo "</tr>";
                                    $i = 0;
                                }
                        ?><tr>
                            <td >
                                <b><?php echo $data["username"]; ?></b>
                            </td>
                            <td><?php echo substr($data["password"], 0, 100) ?></td>
                            <td><?php echo substr($data["name"], 0, 100) ?></td>
                            <td><?php echo substr($data["email"], 0, 100)?></td>
                            <!-- <td><a href="sua.php?username=<?php echo $data['username'];?>" username="btnSua" >
                                Sửa</a></td>
                            <td><a href="xoa.php?username=<?php echo $data['username']; ?>" username="btnXoa" >
                                Xóa</a></td> -->
                        </tr>
                        
                        <?php
                                $i++;
                            }
                        ?>
                    </table>
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