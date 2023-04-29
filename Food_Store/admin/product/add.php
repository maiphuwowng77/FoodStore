<?php
require_once ('../../db/dbhelper.php');

$productCode = $productCode = $productName = $productLine = $productDescription = $price = $available =$image_path = '';
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
	if (isset($_POST['available'])) {
		$available = $_POST['available'];
	}
	if (isset($_POST['image_path'])) {
		$image_path = $_POST['image_path'];
	}

	if (!empty($productName)) {
		//Luu vao database
		if ($productCode == '') {
			
			$sql = 'insert into products(productCode, productName, productLine, productDescription, price, available, image_path) values ("'.$productCode.'", "'.$productName.'", "'.$productLine.'", "'.$productDescription.'", "'.$price.'", "'.$available.'", "'.$image_path.'")';

		} else {
			$sql = 'update products set productCode = "'.$productCode.'", productName = "'.$productName.'", productLine = "'.$productLine.'", productDescription = "'.$productDescription.'", price = "'.$price.'", available = "'.$available.'", image_path = "'.$image_path.'" where productCode = "'.$productCode.'"';
		}

		execute($sql);

		header('Location:index.php');
		die();
	}
}

if (isset($_GET['productCode'])) {
	$productCode       = $_GET['productCode'];
	$sql      = 'select * from products where productCode = "'.$productCode.'"';
	$products = executeSingleResult($sql);
	if ($products != null) {
		$productCode = $products['productCode'];
		$productName = $products['productName'];
		$productLine = $products['productLine'];
		$productDescription = $products['productDescription'];
		$price = $products['price'];
		$available = $products['available'];
		$image_path = $products['image_path'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Thông Tin Sản Phẩm</title>
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
	<link rel="stylesheet" href="../employee/employee.css">
	<!----===== Boxicons CSS ===== -->
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
<nav>
<div class="sidebar">
            <div class="admin">
                <img src="../../food_store_web/img/icon/logo.jpg" alt="" width="80px" height="80px">
                <strong class="admin-name">
                     Admin
                </strong>
            </div>
            <hr width="300px" color="#e8e5e5"/>
            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="" class="nav-link">
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
                        <a href="../../food_store_web/build/index.html" class="nav-link">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="link">Đăng xuất</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
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
					  		$sql          = 'select * from productline';
							$productlineList = executeResult($sql);
							foreach ($productlineList as $item) {
								if ($item['productLine'] == $productLine) {
									echo '<option selected value = "'.$item['productLine'].'">'.$item['productLine'].'</option>';
								} else {
									echo '<option value = "'.$item['productLine'].'">'.$item['productLine'].'</option>';
								}
							}
					  	?>
					  </select>
					</div>
					<div class="form-group">
					  <label for="price"><b>Giá:</b></label>
					  <input type="text" name="id" value="<?=$productCode?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="price" name="price" value="<?=$price?>">
					</div>
					<div class="form-group">
					  <label for="price"><b>Tình trạng:</b></label>
					  <input type="text" name="id" value="<?=$productCode?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="available" name="available" value="<?=$available?>">
					</div>
					<div class="form-group">
					  <label for="productDescription"><b>Mô tả:</b></label>
					  <textarea class="form-control" rows="5" name="productDescription" id="productDescription"><?=$productDescription?></textarea>
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