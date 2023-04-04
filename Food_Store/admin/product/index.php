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
				<a class="nav-link active" href="#">Quản Lý Sản Phẩm</a>
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



</body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Sản Phẩm</h2>
			</div>
			<div class="panel-body">
				<a href="add.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">Thêm Sản phẩm</button>
				</a>
				<table class="table table-bordered table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th width="50px">STT</th>
							<th width="150px">Mã Sản Phẩm</th>
							<th width="100px">Dòng Sản Phẩm</th>
							<th width="150px">Tên Sản Phẩm</th>
							<th width="200px">Hình Ảnh</th>							
							<th width="300px">Mô tả</th>
							<th width="100px">Giá</th>							
							<th width="40px"></th>
							<th width="40px"></th>
						</tr>
					</thead>
					<tbody>
						<?php
                        //Lay danh sach san pham tu database
                        $sql = 'select * from products';
                        $productList = executeResult($sql);

                        $index = 1;
                        foreach ($productList as $item) {
	                        echo '<tr>
										<td>' . ($index++) . '</td>
                                        <td>' . $item['productCode'] . '</td>
										<td>' . $item['productLine'] . '</td>
										<td>' . $item['productName'] . '</td>
										<td><img src="' . $item['image_path'] . '"style="max-width: 150px"/></td>										
										<td>' . $item['productDescription'] . '</td>
										<td>' . $item['price'] . '</td>										
										<td>
											<a href="add.php?productCode=' . $item['productCode'] . '"><button class="btn btn-warning">Sửa</button></a>
										</td>
										<td>
											<button class="btn btn-danger" onclick="deleteCategory(' . $item['productCode'] . ')">Xoá</button>
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
		function deleteCategory(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
			if (!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('ajax.php', {
				'id': id,
				'action': 'delete'
			}, function (data) {
				location.reload()
			})
		}
	</script>
</html>