<?php
require_once ('../../db/dbhelper.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<!--tableForm-->
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
				<h2 class="text-center">Quản Lý Nhân Viên</h2>
			</div>
			<div class="panel-body">
				<a href="add.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">Thêm Nhân viên</button>
				</a>
				<table class="table table-bordered table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th width="30px">STT</th>
							<th width="150px">Tên Nhân Viên</th>
							<th width="100px">Giới Tính</th>
							<th width="100px">Ngày Sinh</th>
							<th width="150px">Email</th>
							<th width="150px">Số Điện Thoại</th>
							<th width="50px">Cơ sở</th>
							<th width="50px">Quản lý</th>
							<th width="100px">Nghiệp vụ</th>
							<th width="100px">Ngày bắt đầu</th>
							<th width="40px"></th>
							<th width="40px"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						//Lay danh sach nhan vien tu database
						$sql          = 'select * from employees';
						$employeeList = executeResult($sql);

						$index = 1;
						foreach ($employeeList as $item) {
							echo '<tr>
										<td>'.($index++).'</td>
										<td>'.$item['employeeName'].'</td>
										<td>'.$item['gender'].'</td>
										<td>'.$item['birthday'].'</td>
										<td>'.$item['email'].'</td>
										<td>'.$item['phone'].'</td>
										<td>'.$item['storeId'].'</td>
										<td>'.$item['managerId'].'</td>
										<td>'.$item['jobTitle'].'</td>
										<td>'.$item['start_date'].'</td>
										<td>
											<a href="add.php?employeeNumber='.$item['employeeNumber'].'"><button class="btn btn-warning">Sửa</button></a>
										</td>
										<td>
											<button class="btn btn-danger" onclick="deleteCategory('.$item['employeeNumber'].')">Xoá</button>
										</td>
									</tr>';
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deleteCategory(employeeNumber) {
			var option = confirm('Bạn có chắc chắn muốn xoá nhân viên này không?')
			if(!option) {
				return;
			}

			console.log(employeeNumber)
			//ajax - lenh post
			$.post('ajax.php', {
				'employeeNumber': employeeNumber,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
</body>
</html>