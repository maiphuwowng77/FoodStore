<?php
require_once('../../../db/dbhelper.php');
require_once('../../../db/store/manage_store/manage_employee.php');
$sanpham = '';
if (!empty($_POST)) {
	if (isset($_POST['search'])) {
		$employeeName = $_POST['sanpham'];
	}
}
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
			<hr width="300px" color="#e8e5e5" />
			<div class="sidebar-content">
				<ul class="lists">
					<li class="list">
						<a href="../index.php" class="nav-link">
							<i class='bx bx-home-alt icon'></i>
							<span class="link">Trang chủ</span>
						</a>
					</li>
					<li class="list">
						<a href="../employee" class="nav-link active">
							<i class='bx bx-user icon'></i>
							<span class="link">Quản lý nhân viên</span>
						</a>
					</li>
					<li class="list">
						<a href="../product" class="nav-link">
							<i class='bx bxs-bowl-hot icon'></i>
							<span class="link">Quản lý sản phẩm</span>
						</a>
					</li>
					<li class="list">
						<a href="../order" class="nav-link">
							<i class='bx bx-cart-alt icon'></i>
							<span class="link">Quản lý đơn hàng</span>
						</a>
					</li>
					<li class="list">
						<a href="../customer" class="nav-link">
							<i class='bx bxs-group icon'></i>
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
							<i class='bx bx-log-out icon'></i>
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
				<h2 class="text-center">QUẢN LÝ NHÂN VIÊN</h2>
			</div>
			<div class="panel-body">
				<form method="post" action="search.php" style="text-align:right">
					<a href="add.php" style="padding-right: 705px">
						<button class="add-button btn btn-success" style="margin-bottom: 15px;">Thêm Nhân viên</button>
					</a>
					<input class="px-2 search" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm" id="sanpham" name="sanpham" value="<?= $sanpham ?>">
					<button type="submit" class="btn0" name="search">
						<i class='bx bx-search'></i>
					</button>
				</form><br>
				<table class="table table-bordered table-striped table-hover">
					<thead class="thead-light">
						<colgroup>
							<col width="30" span="1">
							<col width="140" span="1">
							<col width="90" span="1">
							<col width="110" span="1">
							<col width="150" span="2">
							<col width="70" span="1">
							<col width="80" span="1">
							<col width="90" span="1">
							<col width="120" span="1">
							<col width="45" span="2">

						</colgroup>
						<tr>
							<th>STT</th>
							<th>Tên Nhân Viên</th>
							<th>Giới Tính</th>
							<th>Ngày Sinh</th>
							<th>Email</th>
							<th>Số Điện Thoại</th>
							<th>Cơ sở</th>
							<th>Quản lý</th>
							<th>Nghiệp vụ</th>
							<th>Ngày bắt đầu</th>
							<th colspan="2">Tuỳ chọn</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$employeeList = employeeSearch($employeeName);

						$index = 1;
						foreach ($employeeList as $item) {
							echo '<tr>
										<td>' . ($index++) . '</td>
										<td>' . $item['employeeName'] . '</td>
										<td>' . $item['gender'] . '</td>
										<td>' . $item['birthday'] . '</td>
										<td>' . $item['email'] . '</td>
										<td>' . $item['phone'] . '</td>
										<td>' . $item['storeId'] . '</td>
										<td>' . $item['managerId'] . '</td>
										<td>' . $item['jobTitle'] . '</td>
										<td>' . $item['start_date'] . '</td>
										<td>
											<a href="add.php?employeeNumber=' . $item['employeeNumber'] . '"><button class="edit-button bx bx-edit"></button></a>
										</td>
										<td>
											<button class="delete-button bx bx-trash" onclick="deleteCategory(' . $item['employeeNumber'] . ')">
												
											</button>
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
			if (!option) {
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