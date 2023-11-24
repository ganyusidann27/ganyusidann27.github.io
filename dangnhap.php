<?php
session_start();
?>
<html>
<head>
	<title>Trang đăng nhập</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>	
</head>
<body>
<?php
	//Gọi file connection.php ở bài trước
	require_once("lib/ketnoi.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
		$username = $_POST["username"];
		$password = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {echo "username hoặc password bạn không được để trống!";}
		else
		{
			$sql = "select * from users where username = '$username' and password = '$password' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {echo "tên đăng nhập hoặc mật khẩu không đúng !";}
			else
			{
				$_SESSION['username'] = $username;
                header('Location: xuly.php');
			}
		}
	}
?>
	<nav>
        <label class="logo">Ganyuuf</label>
        <ul>
            <!-- <li><a href="trangchu.php">Trang chủ</a></li>
            <li><a href="timkiem.php">Quản lý Sinh viên</a></li> -->
            <li><a href="dangki.php" id="signup">Đăng ký</a></li>
            <li><a href="dangnhap.php" id="signin" class="active">▶Đăng nhập</a></li>
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
	<form method="POST" action="dangnhap.php">
	<fieldset>
	    <!-- <legend align="center">Đăng nhập</legend>
			<div class="container">
			<form>
				<div class="form-group row">
				<label for="username" class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
				</div>
				</div>
				<div class="form-group row">
				<label for="password" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				</div>
				</div>
				<div class="form-group row">
				<div class="col-sm-10 offset-sm-2">
					<button type="submit" class="btn btn-primary" name="btn_submit">Đăng nhập</button>	
				</div>
				</div>
			</form>
			</div> -->
			<div class="featuredProducts">
       			<h1>Đăng nhập</h1>
    		</div>
			<div class="container-single1">
				<div class="login">
					<form>
						<label for="username">Tài khoản:</label>
						<input  type="text" id="username" name="username" placeholder="Enter username">

						<label for="password">Mật khẩu:</label>
						<input input type="password" id="password" name="password" placeholder="Password">

						<input type="submit" value="Đăng nhập" name="btn_submit">
					</form>
				</div>
    		</div>
  	</fieldset>
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
