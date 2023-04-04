<?php
require_once ('../../db/dbhelper.php');

$employeeNumber = $employeeName = $gender = $birthday = $email = $phone = $storeId = $managerId = $jobTitle = $start_date = '';
if (!empty($_POST)) {
	if (isset($_POST['name'])) {
		$employeeName = $_POST['name'];
		$employeeName = str_replace('"', '\\"', $employeeName);
	}
	if (isset($_POST['id'])) {
		$employeeNumber = $_POST['id'];
	}
	if (isset($_POST['gender'])) {
		$gender = $_POST['gender'];
	}
	if (isset($_POST['birthday'])) {
		$birthday = $_POST['birthday'];
	}
	if (isset($_POST['email'])) {
		$email = $_POST['email'];
	}
	if (isset($_POST['phone'])) {
		$phone = $_POST['phone'];
	}
	if (isset($_POST['storeId'])) {
		$storeId = $_POST['storeId'];
	}
	if (isset($_POST['managerId'])) {
		$managerId = $_POST['managerId'];
	}
	if (isset($_POST['jobTitle'])) {
		$jobTitle = $_POST['jobTitle'];
	}
	if (isset($_POST['start_date'])) {
		$start_date = $_POST['start_date'];
	}
	if (!empty($employeeName)) {
		//Luu vao database
		if ($employeeNumber == '') {
			
			$sql = 'insert into employees(employeeName, gender, birthday, email, phone, storeId, managerId, jobTitle, start_date) values ("'.$employeeName.'", "'.$gender.'", "'.$birthday.'", "'.$email.'", "'.$phone.'", "'.$storeId.'", "'.$managerId.'", "'.$jobTitle.'", "'.$start_date.'")';

		} else {
			$sql = 'update employees set employeeName = "'.$employeeName.'", gender = "'.$gender.'", birthday = "'.$birthday.'", email = "'.$email.'", phone = "'.$phone.'", storeId = "'.$storeId.'", managerId = "'.$managerId.'", jobTitle = "'.$jobTitle.'", start_date = "'.$start_date.'" where employeeNumber = '.$employeeNumber;
		}

		execute($sql);

		header('Location: index.php');
		die();
	}
}

if (isset($_GET['employeeNumber'])) {
	$employeeNumber       = $_GET['employeeNumber'];
	$sql      = 'select * from employees where employeeNumber = '.$employeeNumber;
	$employees = executeSingleResult($sql);
	if ($employees != null) {
		$employeeName = $employees['employeeName'];
		$gender = $employees['gender'];
		$birthday = $employees['birthday'];
		$email = $employees['email'];
		$phone = $employees['phone'];
		$storeId = $employees['storeId'];
		$managerId = $employees['managerId'];
		$jobTitle = $employees['jobTitle'];
		$start_date = $employees['start_date'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Thông Tin Nhân Viên</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-light navbar-light">
		<!-- Brand/logo -->
		<a class="navbar-brand" href="#">
			<img src="../../coffeeshop-home/img/Logo.png" alt="logo" style="max-width:50px;">
		</a>

		<!-- Links -->
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" href="#">Quản Lý Nhân Viên</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../product">Quản Lý Sản Phẩm</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../order">Quản Lý Đơn hàng</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../customer">Quản Lý Khách Hàng</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../admin.php">Trang chủ</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../../coffeeshop-home/build/user.php">Đăng xuất</a>
			</li>
		</ul>
	</nav>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Thông Tin Nhân Viên</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name"><b>Tên nhân viên:</b></label>
					  <input type="text" name="id" value="<?=$employeeNumber?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$employeeName?>">
					</div>
					<div class="form-group">
					  <label for="gender"><b>Giới tính:</b></label>
					  <select class="form-control" name="gender" id="gender">
					  	<option>-- Lựa chọn giới tính --</option>
					  	<?php
					  		if ($gender == 'Male') {
					  			 echo '<option selected value = "Male">Nam</option>';
					  		} else {
					  			echo '<option value = "Male">Nam</option>';
					  		}
					  		if ($gender == 'Female') {
					  			echo '<option selected value = "Female">Nữ</option>';
					  		} else {
					  			echo '<option value = "Female">Nữ</option>';
					  		}
					  		if ($gender == 'Other') {
					  			echo '<option selected value = "Other">Khác</option>';
					  		} else {
					  			echo '<option value = "Other">Khác</option>';
					  		}
					  	?>
					  </select>
					</div>
					<div class="form-group">
					  <label for="birthday"><b>Ngày sinh:</b></label>
					  <input type="text" name="id" value="<?=$employeeNumber?>" hidden="true">
					  <input required = true class="form-control" id="birthday" name="birthday" type="date" value="<?=$birthday?>">
					</div>
					<div class="form-group">
					  <label for="email"><b>Email:</b></label>
					  <input type="text" name="id" value="<?=$employeeNumber?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="email" name="email" value="<?=$email?>">
					</div>
					<div class="form-group">
					  <label for="phone"><b>Số điện thoại:</b></label>
					  <input type="text" name="id" value="<?=$employeeNumber?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="phone" name="phone" value="<?=$phone?>">
					</div>
					<div class="form-group">
					  <label for="storeId"><b>Cơ sở:</b></label>
					  <select class="form-control" name="storeId" id="storeId">
					  	<option>-- Lựa chọn cơ sở --</option>
					  	<?php
					  		$sql          = 'select * from store';
							$storeList = executeResult($sql);
							foreach ($storeList as $item) {
								if ($item['storeId'] == $storeId) {
									echo '<option selected value = "'.$item['storeId'].'">'.$item['address'].'</option>';
								} else {
									echo '<option value = "'.$item['storeId'].'">'.$item['address'].'</option>';
								}
							}
					  	?>
					  </select>
					</div>
					<div class="form-group">
					  <label for="managerId"><b>Quản lý:</b></label>
					  <select class="form-control" name="managerId" id="managerId">
					  	<option>-- Lựa chọn người quản lý --</option>
					  	<?php
					  		$sql          = 'select * from employees';
							$employeeList = executeResult($sql);
							foreach ($employeeList as $item) {
								if ($item['employeeNumber'] == $managerId) {
									echo '<option selected value = "'.$item['employeeNumber'].'">'.$item['employeeName'].'</option>';
								} else {
									echo '<option value = "'.$item['employeeNumber'].'">'.$item['employeeName'].'</option>';
								}
							}
					  	?>
					  </select>
					</div>
					<div class="form-group">
					  <label for="jobTitle"><b>Nghiệp vụ:</b></label>
					  <input type="text" name="id" value="<?=$employeeNumber?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="jobTitle" name="jobTitle" value="<?=$jobTitle?>">
					</div>
					<div class="form-group">
					  <label for="start_date"><b>Ngày bắt đầu:</b></label>
					  <input type="text" name="id" value="<?=$employeeNumber?>" hidden="true">
					  <input required = true class="form-control" id="start_date" name="start_date" type="date" value="<?=$start_date?>">
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>