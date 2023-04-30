<?php
require_once ('../../db/dbhelper.php');
if (!empty($_POST)) {
  if (isset($_POST['sua'])) {
    $orderNumber = $_POST['done']; 
    $sql = 'update orders set status = "Hoàn thành" where orderNumber = "'.$orderNumber.'"'; 
    execute($sql);
    header('Location: index.php');
	die();
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

<body>
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
                        <a href="../product" class="nav-link">
                            <i class='bx bxs-bowl-hot icon' ></i>
                            <span class="link">Quản lý sản phẩm</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="" class="nav-link active">
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
				<h2 class="text-center">QUẢN LÝ ĐƠN HÀNG</h2>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped table-hover">
					<thead class="thead-dark">
                    <colgroup>
							<col width="50" span="">
							<col width="70" span="1">
							<col width="150" span="1">
							<col width="70" span="1">
							<col width="120" span="1">
							<col width="70" span="1">
							<col width="150" span="1">
							<col width="150" span="1">
							<col width="100" span="1">
                            <col width="70" span="2">
						</colgroup>
						<tr>
							<th>STT</th>
							<th>Mã ĐH</th>
							<th>Ngày Đặt</th>
							<th>Mã KH</th>
							<th>Giá Đơn</th>
                            <th>Mã CH</th>
                            <th>Ghi chú</th>
							<th>PTTT</th>
							<th>Trạng thái</th>
							<th colspan="2">Hoàn thành</th>
						</tr>
					</thead>
					<tbody>
						<?php
                        //Lay danh sach san pham tu database
                        $sql = 'select * from orders';
                        $productList = executeResult($sql);

                        $index = 1;
                        foreach ($productList as $item) {
	                        echo '<form method="post">
	                        	<tr>
										<td>' . ($index++) . '</td>
                                        <td>' . $item['orderNumber'] . '</td>
										<td>' . $item['orderDate'] . '</td>
										<td>' . $item['customerNumber'] . '</td>
										<td>' . $item['orderPrice'] . '</td>
										<td>' . $item['storeId'] . '</td>
										<td>' . $item['note'] . '</td>
										<td>' . $item['payment_method'] . '</td>
										<td>' . $item['status'] . '</td>
                                        <td style ="padding-top: 25px; padding-left: 20px"><input type="checkbox" id="done" name="done" value="'.$item['orderNumber'].'">
                                        <label for="done"></label><br></td>	
                                        <td><input type="submit" class="btn btn-warning" name="sua" value="Lưu"></td>
									</tr>
									</form>'; 
                        }
                        ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</html>