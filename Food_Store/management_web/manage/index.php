<?php
    require_once ('../../db/dbhelper.php');
    require_once ('../../db/store/manage_store/manage.php');
    session_start();
    
    $sumEmploy = sumEmploy();
    $sumProduct = sumProduct();
    $sumCustomer = sumCustomer();
    $sumOrder = sumOrder();
    if (!empty($_POST)) {
      if (isset($_POST['sua'])) {
        $orderNumber = $_POST['done']; 
        orderCheck($orderNumber);
        header('Location: index.php');
        die();
      }
    }
?>



<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="index.css">
  <!--Material Icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <!----===== Boxicons CSS ===== -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
  
<title>Quản lý</title>
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
            <div class="sidebar-content" style="margin-left:-2rem;">
                <ul class="lists">
                    <li class="list">
                        <a href="" class="nav-link">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="link">Trang chủ</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="./employee" class="nav-link">
                            <i class='bx bx-user icon'></i>
                            <span class="link">Quản lý nhân viên</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="./product" class="nav-link">
                            <i class='bx bxs-bowl-hot icon'></i>
                            <span class="link">Quản lý sản phẩm</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="./order" class="nav-link">
                            <i class='bx bx-cart-alt icon'></i>
                            <span class="link">Quản lý đơn hàng</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="./customer" class="nav-link active">
                            <i class='bx bxs-group icon'></i>
                            <span class="link">Quản lý khách hàng</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="./password" class="nav-link">
                            <i class='bx bxs-key icon'></i>
                            <span class="link">Đổi mật khẩu</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../../food_store_web/build/index.html" class="nav-link">
                            <i class='bx bx-log-out icon'></i>
                            <span class="link">Đăng xuất</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="main-contaicer container-fluid">
        <div class="contaicer" style="padding-left:15rem; padding-top:8rem;">
                <h1 style="color: black; font-family: 'Kanit', sans-serif; text-align:center;">BẢNG THỐNG KÊ</h1>
               
                <div class="row " style="padding-top: 3rem; padding-left: 3rem; padding-right: 30px;">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-inner">
                                <div class="col-3">
                                    <div class="rounded-circle"><h2 class="bi bi-people-fill"></h2></div>
                                </div>
                                <div class="col-9" style="padding-left: 1rem; text-align: center;">
                                    <h5>Tổng nhân viên</h5>
                                    <h4><?php echo $sumEmploy["count"];?></h4>
                                </div>
                            </div>
                        </div>
                    </div>    

                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-inner">
                                <div class="col-3">
                                    <div class="rounded-circle"><h2 class="bi bi-box-seam-fill"></h2></h2></div>
                                </div>
                                <div class="col-9" style="padding-left: 1rem; text-align: center;">
                                    <h5>Tổng sản phẩm</h5>
                                    <h4><?php echo $sumProduct["count"];?></h4>   
                                </div>
                            </div>
                             
                        </div>
                    </div>
                            
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-inner">
                                <div class="col-3">
                                    <div class="rounded-circle"><h2 class="bi bi-person-vcard"></h2></div>
                                </div>
                                <div class="col-9" style="padding-left: 1rem; text-align: center;">
                                    <h5>Tổng khách hàng</h5>
                                    <h4><?php echo $sumCustomer["count"];?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-inner">
                                <div class="col-3">
                                    <div class="rounded-circle"><h2 class="bi bi-cart3"></h2></div>
                                </div>
                                <div class="col-9" style="padding-left: 1rem; text-align: center;">
                                    <h5>Tổng đơn hàng</h5>
                                    <h4><?php echo $sumOrder["count"];?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                                
                    
                </div>
        </div>
            
            <div class="contaicer" style="padding-left:270px;">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="text-center">QUẢN LÝ ĐƠN HÀNG ĐANG THỰC HIỆN</h2>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-dark">
                            <colgroup>
                                    <col width="70" span="1">
                                    <col width="100" span="1">
                                    <col width="250" span="1">
                                    <col width="100" span="1">
                                    <col width="250" span="1">
                                    <col width="100" span="1">
                                    <col width="100" span="1">
                                    <col width="70" span="2">
                                </colgroup>
                                <tr>
                                    <th>Mã ĐH</th>
                                    <th>Ngày Đặt</th>
                                    <th>Thông tin KH</th>
                                    <th>Giá Đơn</th>
                                    <th>Chi tiết đơn hàng</th>
                                    <th>Ghi chú</th>
                                    <th>PTTT</th>
                                    <th colspan="2">Hoàn thành</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    order();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    
</body>