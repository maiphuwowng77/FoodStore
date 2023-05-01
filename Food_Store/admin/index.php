<?php
    require_once ('../db/dbhelper.php');
    include ("../food_store_web/build/thuvien.php");
    session_start();
    
    $sqlEmploy = "SELECT COUNT(*) as count FROM employees";
    $sumEmploy = sum($sqlEmploy);

    $sqlProduct = "SELECT COUNT(*) as count FROM products";
    $sumProduct = sum($sqlProduct);

    $sqlCustomer = "SELECT COUNT(*) as count FROM customer";
    $sumCustomer = sum($sqlCustomer);

    $sqlOrder = "SELECT COUNT(*) as count FROM orders";
    $sumOrder = sum($sqlOrder);
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
    <div class="main-contaicer container-fluid">
        <div class="row content">
            <div class="col-2">
                <nav>
                    <div class="sidebar" style="width: 17rem;">
                        <div class="admin">
                            <img src="../food_store_web/img/icon/logo.png" alt="" width="80px" height="80px">
                            <strong class="admin-name">
                                 Admin
                            </strong>
                        </div>
                        <!--<hr width="300px" color="#e8e5e5"/>-->
                        <div class="sidebar-content">
                            <ul class="lists">
                                <li class="list">
                                    <a href="" class="nav-link active">
                                        <i class='bx bx-home-alt icon' ></i>
                                        <span class="link">Trang chủ</span>
                                    </a>
                                </li>
                                <li class="list">
                                    <a href="../admin/employee" class="nav-link">
                                        <i class='bx bx-user icon' ></i>
                                        <span class="link">Quản lý nhân viên</span>
                                    </a>
                                </li>
                                <li class="list">
                                    <a href="../admin/product" class="nav-link">
                                        <i class='bx bxs-bowl-hot icon' ></i>
                                        <span class="link">Quản lý sản phẩm</span>
                                    </a>
                                </li>
                                <li class="list">
                                    <a href="../admin/order" class="nav-link">
                                        <i class='bx bx-cart-alt icon' ></i>
                                        <span class="link">Quản lý đơn hàng</span>
                                    </a>
                                </li>
                                <li class="list">
                                    <a href="../admin/customer" class="nav-link">
                                        <i class='bx bxs-group icon' ></i>
                                        <span class="link">Quản lý khách hàng</span>
                                    </a>
                                </li>
                                <li class="list">
                                    <a href="../admin/password" class="nav-link">
                                        <i class='bx bxs-key icon'></i>
                                        <span class="link">Đổi mật khẩu</span>
                                    </a>
                                </li>
                                <li class="list">
                                    <a href="./../food_store_web/build/index.html" class="nav-link">
                                        <i class='bx bx-log-out icon' ></i>
                                        <span class="link">Đăng xuất</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        
        
    
            <div class="col-10" style="padding-top: 6rem;">
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
            
        </div>  
    </div>
    
</body>