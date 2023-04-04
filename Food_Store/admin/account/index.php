<?php 
session_start();

if(isset($_POST['username'])){
    $password = $_POST['password'];
    $username = $_POST['username'];
	if($username == 'admin' && $password == '123456'){
		$_SESSION['username'] = $username;
		header('location../../../employee/index.php');
	} 
}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../account/login.css">
	</head>
	<body>
		<form action="../employee/index.php" method="post">
			<div class="imgcontainer">
				<img src="../../coffeeshop-home/img/Logo.png" alt="Avatar" class="avatar">
			</div>

			<div class="container">
				<label for="uname"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="uname" required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>

				<button type="submit">Login</button>
				<label>
				<input type="checkbox" checked="checked" name="remember"> Remember me
				</label>
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="location.href='../../coffeeshop-home/build/user.php'" class="cancelbtn">Cancel</button>
			</div>
			</form>
	</body>
</html>