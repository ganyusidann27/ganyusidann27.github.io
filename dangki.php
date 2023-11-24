<html>
	<head>
		<title>Form đăng ký sinh viên!</title>
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
		<h1 align="center">Đăng kí</h1>
		<?php
		require_once("lib/ketnoi.php");
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$username = $_POST["username"];
  			$password = $_POST["pass"];
 			 $name = $_POST["name"];
  			$email = $_POST["email"];
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			if ($username == "" || $password == "" || $name == "" || $email == "") 
			{
				echo "bạn vui lòng nhập đầy đủ thông tin";
  			}
			else
			{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from users where username='$username'";
					$kt=mysqli_query($conn, $sql);

					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO users(
	    					username,
	    					password,
	    					name,
						    email
	    					) VALUES (
	    					'$username',
	    					'$password',
						    '$name',
	    					'$email'
	    					)";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);
				   		echo "chúc mừng bạn đã đăng ký thành công";
					}
					header('Location: dangnhap.php');
			  }
	}
	?>
	<nav>
        <label class="logo">Ganyuuf</label>
        <ul>
            <!-- <li><a href="trangchu.php">Trang chủ</a></li>
            <li><a href="timkiem.php">Quản lý Sinh viên</a></li> -->
            <li><a href="dangki.php" id="signup" class="active">▶Đăng ký</a></li>
            <li><a href="dangnhap.php" id="signin">Đăng nhập</a></li>
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

	<!-- <form action="dangki.php" method="post">
		<div class="container">
		<form>
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" id="username" name="username">
			</div>
			<div class="form-group">
				<label for="pass">Password:</label>
				<input type="password" class="form-control" id="pass" name="pass">
			</div>
			<div class="form-group">
				<label for="name">Họ Tên:</label>
				<input type="text" class="form-control" id="name" name="name">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="Text" class="form-control" id="email" name="email">
			</div>
			<button type="submit" class="btn btn-primary" name="btn_submit">Đăng ký</button>
		</form>
		</div>
	</form> -->
	<section class="banner"></section>
	<div class="featuredProducts">
        <h1>Đăng Kí</h1>
    </div>
	<div class="container-single1">
        <div class="login">
            <form action="dangki.php" method="post" class="form-login">
                <label for="username">Tài khoản:</label>
                <input type="text" id="username" name="username">

                <label for="pass">Mật khẩu:</label>
                <input type="password" id="pass" name="pass">

                <label for="name">Họ tên:</label>
                <input type="text" id="name" name="name">

                <label for="email">Email:</label>
                <input type="Text" id="email" name="email">

                <input type="submit" value="Đăng ký" name="btn_submit">
            </form>
        </div>
    </div>

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