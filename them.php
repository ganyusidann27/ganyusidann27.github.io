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

//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["id"])) { $id = $_POST['id']; }
    if(isset($_POST["fullname"])) { $fullname = $_POST['fullname']; }
    if(isset($_POST["username"])) { $username = $_POST['username']; }
    if(isset($_POST["password"])) { $password = $_POST['password']; }

    //Code xử lý, insert dữ liệu vào table Sinh viên
    $sql = "INSERT INTO tbluser (id, fullname, username, password) VALUES ($id, '$fullname', '$username', '$password')";

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
    <form action="" method="post">
        <table align="center" style="margin: 20px 0 0 590px">
            <tr> <td colspan="2" align="center"><b>Thêm sinh viên</b></td></tr>
            <tr>
                <th>Mã sinh viên:</th>
                <td><input type="text" name="id" value=""></td>
            </tr>
            <tr>
                <th>Họ tên:</th>
                <td><input type="text" name="fullname" value=""></td>
            </tr>
            <tr>
                <th>Lớp:</th>
                <td><input type="text" name="username" value=""></td>
            </tr>
            <tr>
                <th>Quê quan:</th>
                <td><textarea cols="30" rows="7" name="password"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><button type="submit" >Thêm sinh viên</button></td>
            </tr>
        </table>
        <?php
        $servername = "localhost";
        $database = "d16cnpm2";
        $username = "root";
        $password = "";
        // Create connection
        $connect = mysqli_connect($servername, $username, $password, $database);
        //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
        if (!$connect) 
        {
            die("Không kết nối :" . mysqli_connect_error());
            exit();
        }
            $sql = "select * from tbluser ";
            $query = mysqli_query($connect,$sql);
        ?>
        <br>
        <table width="80%" border="1" style="margin: 0 0 20px 160px">
                    <tr><td colspan="6" align="center"><b>Danh sách sinh viên hiện có</b></td></tr>
                    <tr><td ><b>Họ và tên: </b></td>
                        <td ><b>Họ tên</b></td>
                        <td ><b>Lớp</b></td>
                        <td ><b>Quê quán</b></td>
                        <td ><b>Sửa</b></td>
                        <td ><b>Xóa</b></td>
                    </tr>
                        <?php
                            $i = 0;
                            while ( $data = mysqli_fetch_array($query) ) 
                            {if ($i == 4) {echo "</tr>"; $i = 0;}
                        ?><tr>
                            <td >
                                <b><?php echo $data["id"]; ?></b>
                            </td>
                            <td><?php echo substr($data["fullname"], 0, 100) ?></td>
                            <td><?php echo substr($data["username"], 0, 100) ?></td>
                            <td><?php echo substr($data["password"], 0, 100)?></td>
                            <td><a href="sua.php?id=<?php echo $data['id'];?>" id="btnSua" >Sửa</a></td>
                            <td><a href="xoa.php?id=<?php echo $data['id'];?>" id="btnXoa" >Xóa</a></td>
                        </tr>
                        <?php $i++;
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


