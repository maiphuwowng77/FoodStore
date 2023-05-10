<?php
require_once ('../../../db/dbhelper.php');
require_once ('../../../db/store/manage_store/manage_customer.php');
$sanpham ='';
if (!empty($_POST)) {
	if (isset($_POST['search'])) {
	  $customerName = $_POST['sanpham'];  
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
	<link rel="stylesheet" href="./customer.css">
	<!----===== Boxicons CSS ===== -->
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
<nav>
        <div class="sidebar">
            <div class="admin">
                <img src="../../../food_store_web/img/icon/logo.png" alt="" width="80px" height="80px">
                <strong class="admin-name">
                     Admin
                </strong>
            </div>
            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="../index.php" class="nav-link">
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
                        <a href="../customer" class="nav-link active">
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
                        <a href="../../../food_store_web/build/user.php" class="nav-link">
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
				<h2 class="text-center">QUẢN LÝ KHÁCH HÀNG</h2>
			</div>
            <form method="post" action="search.php" style="text-align:right" >
                <input class="px-2 search" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm" id = "sanpham" name = "sanpham" value="<?=$sanpham?>">
                <button type="submit" class="btn0" name="search">
                    <i class='bx bx-search'></i>
                </button>
                </form><br>
			<div class="panel-body">
				<table class="table table-bordered table-striped table-hover">
					<thead class="thead-light">
						<colgroup>
							<col width="100" span="">
							<col width="220" span="1">
							<col width="270" span="1">
							<col width="190" span="1">
							<col width="300" span="1">
							<col width="170" span="1">
						</colgroup>
					
						<tr>
							<th>STT</th>
							<th>Mã Khách Hàng </th>
							<th>Tên Khách Hàng</th>
							<th>Số Điện Thoại</th>
							<th>Địa chỉ</th>
							<th>Thẻ tích điểm</th>
						</tr>
					</thead>
					<tbody>
						<?php
                        $customerList = customerSearch($customerName);

                        $index = 1;
                        foreach ($customerList as $item) {
	                        echo '<tr>
										<td>' . ($index++) . '</td>
                                        <td>' . $item['customerNumber'] . '</td>
										<td>' . $item['customerName'] . '</td>
										<td>' . $item['phone'] . '</td>
										<td>' . $item['address'] . '</td>
										<td>' . $item['loyalty_card'] . '</td>										
									</tr>';
                        }
                        ?>
					</tbody>
				</table>
			
	</div>
</body>

</html>