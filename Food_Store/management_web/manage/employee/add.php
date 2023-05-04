<?php
require_once ('../../../db/dbhelper.php');
require_once ('../../../db/store/manage_store/manage_employee.php');

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
		addEmployee($employeeNumber, $employeeName, $gender, $birthday, $email, $phone, $storeId, $managerId, $jobTitle, $start_date);

		header('Location: index.php');
		die();
	}
}

if (isset($_GET['employeeNumber'])) {
	$employeeNumber       = $_GET['employeeNumber'];
	$employees = employeeInfo($employeeNumber);
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
	<!----======== CSS ======== -->
	<link rel="stylesheet" href="../index.css">
	<link rel="stylesheet" href="./employee.css">
	<!----===== Boxicons CSS ===== -->
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<nav>
<div class="sidebar">
            <div class="admin">
                <img src="../../../food_store_web/img/icon/logo.jpg" alt="" width="80px" height="80px">
                <strong class="admin-name">
                     Admin
                </strong>
            </div>
            <hr width="300px" color="#e8e5e5"/>
            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="../index.php" class="nav-link">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="link">Trang chủ</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../employee" class="nav-link active">
                            <i class='bx bx-user icon' ></i>
                            <span class="link">Quản lý nhân viên</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../product" class="nav-link">
                            <i class='bx bxs-bowl-hot icon' ></i>
                            <span class="link">Quản lý sản phẩm</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../order" class="nav-link">
                            <i class='bx bx-cart-alt icon' ></i>
                            <span class="link">Quản lý đơn hàng</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../customer" class="nav-link">
                            <i class='bx bxs-group icon' ></i>
                            <span class="link">Quản lý khách hàng</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../password" class="nav-link">
                            <i class='bx bxs-key icon'></i>
                            <span class="link">Đổi mật khẩu</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../../../food_store_web/build/index.html" class="nav-link">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="link">Đăng xuất</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-center">CHỈNH SỬA THÔNG TIN NHÂN VIÊN</h2>
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
							$storeList = storeList();
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
					  		$employeeList = employeeList();
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