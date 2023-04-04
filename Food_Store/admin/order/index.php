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
				<a class="nav-link" href="../employee">Quản Lý Nhân Viên</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../product">Quản Lý Sản Phẩm</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="#">Quản Lý Đơn hàng</a>
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



</body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Đơn Hàng</h2>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th>STT</th>
							<th>Mã Đơn Hàng</th>
							<th>Ngày Đặt</th>
							<th>Mã Khách Hàng</th>
							<th>Giá Đơn</th>
                            <th>Mã Cửa Hàng</th>
						</tr>
					</thead>
					<tbody>
						<?php
                        //Lay danh sach san pham tu database
                        $sql = 'select * from orders';
                        $productList = executeResult($sql);

                        $index = 1;
                        foreach ($productList as $item) {
	                        echo '<tr>
										<td>' . ($index++) . '</td>
                                        <td>' . $item['orderNumber'] . '</td>
										<td>' . $item['orderDate'] . '</td>
										<td>' . $item['customerNumber'] . '</td>
										<td>' . $item['orderPrice'] . '</td>
										<td>' . $item['storeId'] . '</td>
									</tr>'; 
                        }
                        ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</html>