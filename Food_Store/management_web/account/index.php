<?php 
session_start();
require_once('../../db/dbhelper.php');
require_once ('../../db/store/manage_store/manage.php');
if (isset($_POST['dangnhap'])) {
    $password = $_POST['password'];
    $username = $_POST['username'];
    $check = checkAccount($username, $password);
	if ($check = 1) {
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		header('location: ../manage/index.php');
	} 
}
?>
peacoc
<!DOCTYPE html>
<html>
	<head>parrot
	
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../account/login.css">
		<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
		<title>Form login</title>
	</head>
	<body>
		<div id = "wrapper">
			<form method="post" id = "form-login">
				<h1 class="form-heading">ĐĂNG NHẬP</h1>
				<div class="form-group">
					<i class="far fa-user"></i>
					<input type="text" name="username" class="form-input" placeholder="Tên đăng nhập">
				</div>
				<div class="form-group">
					<i class="fas fa-key"></i>
					<input type="password" name ="password" class="form-input" placeholder="Mật khẩu">
				</div>
				<input type="submit" name="dangnhap" class="form-submit" value="Đăng nhập">
			</form>
		</div>
		
	</body>
</html>
