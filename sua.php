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
            <li><a href="them.php" class="active">1</a></li>
            <li><a href="themuser.php">2</a></li>
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
       	<h1>Trang chủ Quản lý Sinh viên</h1>
	</div>

    <?php
    $servername = "localhost";
    $database = "d16cnpm2";
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
    $id = "";
    $fullname = "";
    $username = "";
    $password = "";
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM `tbluser` WHERE id=$id;";
        // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
        $resultSelect = mysqli_query($connect, $sqlSelect);
        $SinhVienRows = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record
        // Nếu không tìm thấy dữ liệu -> thông báo lỗi
        if(empty($SinhVienRows)) 
        {
            echo "Giá trị id: $id không tồn tại. Vui lòng kiểm tra lại.";
            die;
        }
    ?>
    <form action="" method="post">
        <table align="center" style="margin: 0 0 10px 600px">
            <tr> <td colspan="2" align="center"><b>Sửa sinh viên</b></td></tr>
            <tr>
                <th>Họ tên:</th>
                <td><input type="text" name="fullname" value="<?php echo $SinhVienRows['fullname'] ?>"></td>
            </tr>
            <tr>
                <th>Lớp:</th>
                <td><input type="text" name="username" value="<?php echo $SinhVienRows['username'] ?>"></td>
            </tr>
            <tr>
                <th>Quê quan:</th>
                <td><textarea cols="30" rows="7" name="password"  ><?php echo $SinhVienRows['password'] ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><button type="submit">Cập nhật sinh viên</button></td>
            </tr>
        </table>
    <?php
    //Lấy giá trị POST từ form vừa submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if(isset($_POST["fullname"])) { $fullname = $_POST['fullname']; }
        if(isset($_POST["username"])) { $username = $_POST['username']; }
        if(isset($_POST["password"])) { $password = $_POST['password']; }
        //Code xử lý, update dữ liệu vào table Sinh viên
        $sql = "UPDATE tbluser set fullname ='$fullname', username ='$username' , password ='$password' where id='$id' ";
        if (mysqli_query($connect, $sql)) {
            echo "Sửa dữ liệu thành công";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
        header("Location: them.php");
    }
    //Đóng database
    mysqli_close($connect);
    ?> 


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


