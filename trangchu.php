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
            <li><a href="timkiem.php">Quản lý Sinh viên</a></li>
            <!-- <li><a href="dangki.php" id="signup">Đăng ký</a></li>
            <li><a href="dangnhap.php" id="signin">Đăng nhập</a></li> -->
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
	<!-- class="btn btn-success btn-lg btn-block"  -->
		<!-- <div class="container-single1"> -->
			<div>
			<button style="margin: 20px 20px 20px 620px; width: 400px; background-color: Olive; border: none" class="btn btn-success btn-lg btn-block" onclick="window.location.href='themuser.php'">Quản lý Tài khoản</button>
			</div>
			<div>
			<button style="margin: 20px 20px 20px 620px; width: 400px; background-color: Olive; border: none" class="btn btn-success btn-lg btn-block" onclick="window.location.href='them.php'">Quản lý Sinh viên</button>
			</div>
			<div>
			<button style="margin: 20px 20px 20px 620px; width: 400px; background-color: Olive; border: none" class="btn btn-success btn-lg btn-block" onclick="window.location.href='timkiem.php'">Tìm kiếm Sinh viên</button>
			</div>
			<!-- </div> -->
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