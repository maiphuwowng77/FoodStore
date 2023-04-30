
<?php
require_once ('../../db/dbhelper.php');
$sanpham ='';
if (!empty($_POST)) {
	if (isset($_POST['search'])) {
	  $producName = $_POST['sanpham'];  
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

	<!----===== Boxicons CSS ===== -->
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<nav>
<div class="sidebar">
            <div class="admin">
                <img src="../../food_store_web/img/icon/logo.png" alt="" width="80px" height="80px">
                <strong class="admin-name">
                     Admin
                </strong>
            </div>
            
            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="../index.html" class="nav-link">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="link">Trang chủ</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../employee" class="nav-link">
                            <i class='bx bx-user icon' ></i>
                            <span class="link">Quản lý nhân viên</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="" class="nav-link active">
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
				<h2 class="text-center">QUẢN LÝ SẢN PHẨM</h2>
			</div>
			<div class="panel-body">
				<a href="add.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">Thêm Sản phẩm</button>
				</a>
				<form class="d-flex" method="post" action="search.php" >
                 <input class="px-2 search" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm" id = "sanpham" name = "sanpham" value="<?=$sanpham?>">
                <input type="submit" class="btn0" name="search" value="Tìm kiếm">
                </form><br>
				<table class="table table-bordered table-striped table-hover">
					<thead class="thead-dark">
					<colgroup>
							<col width="50" span="1">
							<col width="120" span="1">
							<col width="150" span="2">
							<col width="200" span="1">
							<col width="240" span="1">
							<col width="100" span="1">
							<col width="100" span="1">
							<col width="50px" span="2">
						</colgroup>
						<tr>
							<th>STT</th>
							<th>Mã Sản Phẩm</th>
							<th>Dòng Sản Phẩm</th>
							<th>Tên Sản Phẩm</th>
							<th>Hình Ảnh</th>							
							<th>Mô tả</th>
							<th>Giá</th>	
							<th>Tình trạng</th>						
							<th colspan="2">Tùy chọn</th>
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
										<td>' . $item['available'] . '</td>									
										<td>
											<a href="add.php?productCode=' . $item['productCode'] . '"><button class="bx bx-edit"></button></a>
										</td>
										<td>
											<button class="bx bx-trash" onclick="deleteCategory(\''.$item['productCode'].'\')"></button>
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
		function deleteCategory(productCode) {
			var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
			if (!option) {
				return;
			}

			console.log(productCode)
			//ajax - lenh post
			$.post('ajax.php', {
				'productCode': productCode,
				'action': 'delete'
			}, function (data) {
				location.reload()
			})
		}
	</script>
</html>