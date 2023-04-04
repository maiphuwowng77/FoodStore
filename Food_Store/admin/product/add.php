<?php
require_once ('../../db/dbhelper.php');

$productCode = $productCode = $productName = $productLine = $productDescription = $price = $image_path = '';
if (!empty($_POST)) {
	if (isset($_POST['productCode'])) {
		$productCode = $_POST['productCode'];
		
	}
	if (isset($_POST['productName'])) {
		$productName = $_POST['productName'];
		$productName = str_replace('"', '\\"', $productName);
	}
	if (isset($_POST['productLine'])) {
		$productLine = $_POST['productLine'];
	}
	if (isset($_POST['productDescription'])) {
		$productDescription = $_POST['productDescription'];
	}
	if (isset($_POST['price'])) {
		$price = $_POST['price'];
	}
	if (isset($_POST['image_path'])) {
		$image_path = $_POST['image_path'];
	}

	if (!empty($productName)) {
		//Luu vao database
		if ($productCode == '') {
			
			$sql = 'insert into products(productCode, productName, productLine, productDescription, price, image_path) values ("'.$productCode.'", "'.$productName.'", "'.$productLine.'", "'.$productDescription.'", "'.$price.'", "'.$image_path.'")';

		} else {
			$sql = 'update products set productCode = "'.$productCode.'", productName = "'.$productName.'", productLine = "'.$productLine.'", productDescription = "'.$productDescription.'", price = "'.$price.'", image_path = "'.$image_path.'" where id = '.$productCode;
		}

		execute($sql);

		header('Location:index.php');
		die();
	}
}

if (isset($_GET['productCode'])) {
	$productCode       = $_GET['productCode'];
	$sql      = 'select * from products where productCode = '.$productCode;
	$products = executeSingleResult($sql);
	if ($products != null) {
		$productCode = $products['productCode'];
		$productName = $products['productName'];
		$productLine = $products['productLine'];
		$productDescription = $products['productDescription'];
		$price = $products['price'];
		$image_path = $products['image_path'];
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
				<h2 class="text-center">Thêm/Sửa Thông Tin Sản Phẩm</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="productCode"><b>Mã sản phẩm:</b></label>
					  <input type="text" name="id" value="<?=$productCode?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="productCode" name="productCode" value="<?=$productCode?>">
					</div>
					<div class="form-group">
					  <label for="productName"><b>Tên sản phẩm:</b></label>
					  <input type="text" name="id" value="<?=$productCode?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="productName" name="productName" value="<?=$productName?>">
					</div>
					<div class="form-group">
					  <label for="productLine"><b>Dòng sản phẩm:</b></label>
					  <select class="form-control" name="productLine" id="productLine">
					  	<option>-- Lựa chọn dòng sản phẩm --</option>
					  	<?php
					  		if ($productLine == 'Coffee') {
					  			 echo '<option selected value = "Coffee">Cà phê</option>';
					  		} else {
					  			echo '<option value = "Coffee">Cà phê</option>';
					  		}
					  		if ($productLine == 'Juice') {
					  			echo '<option selected value = "Juice">Nước ép</option>';
					  		} else {
					  			echo '<option value = "Juice">Nước ép</option>';
					  		}
					  		if ($productLine == 'Smoothie') {
					  			echo '<option selected value = "Smoothie">Sinh tố</option>';
					  		} else {
					  			echo '<option value = "Smoothie">Sinh tố</option>';
					  		} 
							if ($productLine == 'Tea') {
                                echo '<option selected value = "Tea">Trà</option>';
                            } else {
                                echo '<option value = "Tea">Trà</option>';
                            }
							if ($productLine == 'Desert') {
                                echo '<option selected value = "Desert">Tráng miệng</option>';
                            } else {
                                echo '<option value = "Desert">Tráng miệng</option>';
                            }
					  	?>
					  </select>
					</div>
					<div class="form-group">
					  <label for="productDescription"><b>Mô tả:</b></label>
					  <textarea class="form-control" rows="5" name="productDescription" id="productDescription"><?=$productDescription?></textarea>
					</div>
					<div class="form-group">
					  <label for="price"><b>Giá:</b></label>
					  <input type="text" name="id" value="<?=$productCode?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="price" name="price" value="<?=$price?>">
					</div>
					<div class="form-group">
					  <label for="image_path"><b>Hình ảnh:</b></label>
					  <input required="true" type="text" class="form-control" id="image_path" name="image_path" 
					  	value="<?=$image_path?>" onchange="updateImagePath()">
					  <img src="<?=$image_path?>" style="max-width: 200px" id="img">
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function updateImagePath() {
			$('#img').attr('src', $('#image_path').val())
		}
		$(function() {
			//doi website load noi dung => xu li phan js
			$('#productDescription').summernote({
				height: 150,
				codemirror: {
					theme: 'monokai'
				}
			});
		})
	</script>
</body>
</html>