<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>

	<!-- Vendor CSS  -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap-4.4.1/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
<?php
	//Gọi file connection.php 
	require_once("connection.php");
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
		if ($username == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "select * from user where user = '$username' and pw = '$password' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				$_SESSION['username'] = $username;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                header('Location: index.php');
			}
		}
	}
?>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="image/logo.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="POST" action="login.php">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
							</div>
							<input type="text" name="username" class="form-control input_user" placeholder="username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text">
                                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                </span>
							</div>
							<input type="text" name="password" class="form-control input_pass" placeholder="password">
						</div>

							<div class="d-flex justify-content-center mt-3 login_container">
							<input name="btn_submit" class="btn btn-success btn-lg btn-block" type="submit" value="Đăng nhập">
				   </div>
					</form>
				</div>
			</div>
		</div>
	</div>

    <!-- Vendor Js -->
    <!-- Jquery -->
    <script src="../vendor/jquery-3.4.1/jquery.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="../vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>
</body>
</html>