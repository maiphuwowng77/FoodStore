<?php
  session_start();
  require_once ('../../db/dbhelper.php');
  include "thuvien.php";
    $ttkh = "";
    $ttghang = "";
  if(isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
    // lay thong tin kh để tao ma kh
    $customerName = $_POST['hoten'];
    $address = $_POST['diachi'];
    $phone = $_POST['dienthoai'];
    $email = $_POST['email'];
    //insert khach hang neu chua co
    $customerNumber = taokhachhang($customerName,$address,$phone,$email);

    // lay thong tin don hang de tao order
    $total = tongdonhang();
    $orderNumber = taodonhang($customerNumber,$total);

    // lay thong tin don hang de tao orderdetail
    for($i=0; $i < sizeof($_SESSION['giohang']); $i++) {
      $productName = $_SESSION['giohang'][$i][1];
      $priceEach = $_SESSION['giohang'][$i][2]; 
      $quantity = $_SESSION['giohang'][$i][3];
      $orderLineNumber = $i + 1;
      taogiohang($orderNumber, $productName, $quantity, $priceEach, $orderLineNumber);
    }

    // show don hang
    $ttkh = '<h5>Bạn đã tạo thành công đơn hàng.</h5>
          <h2>Mã đơn hàng: '.$orderNumber.'</h2>
          <h2 style="width: 100%; text-align: center;">Thông tin khách hàng</h2>
          <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <td width="20%">Họ tên</td>
                            <td>'.$customerName.'</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>'.$address.'</td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td>'.$phone.'</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>'.$email.'</td>
                        </tr>
                    </table>';

        $ttghang = showgiohang();
    
    // unset session
        unset($_SESSION['giohang']);

  }
  
?>
<html lang="en">
  <head>
    <title>The Food Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Nunito&family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  </head>
  

  <header id="head" data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
    <nav class="navbar navbar-expand-lg navbar navbar-expand-sm bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">FoodStore</a>
        <div class="icon px-1">
          <img src="../img/icon/logo.jpg" class="rounded-circle rounded float-start" width="100" height="100" alt="">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav m-5 my-2 my-lg-0">
            <li class="nav-item"><a class="nav-link active" onclick="location.href='./index.html'" href="#trangchu">Trang chủ</a></li>
            <li class="nav-item"><a class="nav-link" onclick="location.href='./index.html#gioithieu'" href="#gioithieu">Giới thiệu</a></li>
              
            <div class="dropdown">
              <button class="btn dropdown-toggle nav-link" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Sản phẩm
              </button>
              <ul class="nav-item dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" onclick="location.href='./product.php'" href="#">Tất cả</a></li>
                <li><a class="dropdown-item" onclick="location.href='./product.php#com'" href="#">Cơm</a></li>
                <li><a class="dropdown-item" onclick="location.href='./product.php#canh'" href="#">Canh</a></li>
                <li><a class="dropdown-item" onclick="location.href='./product.php#kimbap'" href="#">Kimbap</a></li>
                <li><a class="dropdown-item" onclick="location.href='./product.php#ga'" href="#">Gà</a></li>
                <li><a class="dropdown-item" onclick="location.href='./product.php#my'" href="#">Mỳ</a></li>
                <li><a class="dropdown-item" onclick="location.href='./product.php#tokbokki'" href="#">Tokbokki</a></li>
                <li><a class="dropdown-item" onclick="location.href='./product.php#douong'" href="#">Đồ uống</a></li>
              </ul>
            </div>
            
            <li class="nav-item"><a class="nav-link" onclick="location.href='./orderPage.html'"href="#">Đặt hàng</a></li>
          </ul>

          <form class="d-flex">
            <input class="px-2 search" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
            <button class="btn0" type="submit">Tìm kiếm</button>
          </form>
        </div>
            
        <div class="icon px-1">
          <img src="../img/icon/cart.jpg" onclick="location.href='./cart.php'" class="rounded-circle rounded float-start" width="70" height="70" alt="">
          <span class="badge bg-danger">0</span>
        </div>

        <div class="icon px-1">
          <img src="../img/icon/user.png" onclick="location.href='../../admin/account'" class="rounded-circle rounded float-start" width="40" height="40" alt="">
        </div>
      </div>
    </nav>
  </header>

<div class="content">
    <div>
            <div class="container-fluid mt-3">
              <?php echo $ttkh;?>
                    
            </div>
            <div>
                <h2 style="width: 100%; text-align: center;">Giỏ hàng</h2>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền (đ)</th>
                        </tr>
                        <?php echo $ttghang;?>                  
                    </thead>
                </table>
            </div>
            
        </div>  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</div>

<footer id="footer" data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
        <nav class="navbar navbar-expand-lg container" class="navbar navbar-expand-sm bg-dark navbar-dark">
          <div class="collapse navbar-collapse d-flex justify-content-evenly" id="navbarScroll">
            <div class="box mb-auto">
              <h3>FOODSTORE</h3>
              <div class="logo" >
                <img src="../img/icon/logo.jpg" class="rounded-circle" width="100" height="100"alt="">
              </div>
              <p>Cung cấp sản phẩm với chất lượng an toàn cho quý khách!</p>

            </div>
  
            <div class="box mb-auto">
              <h3>NỘI DUNG</h3>
              <ul class="quick-menu">
                <li class="item">
                  <a onclick="location.href='./index.html'" href="#trangchu">Trang chủ</a>
                </li>
                <li class="item">
                  <a onclick="location.href='./index.html#gioithieu'" href="#gioithieu">Giới thiệu</a>
                </li>
                <li class="item">
                  <a  onclick="location.href='./product.php'" href="#">Sản phẩm</a>
                </li>
                <li class="item">
                  <a onclick="location.href='./orderPage.html'" href="#">Đặt hàng</a>
                </li>
              </ul>
            </div>
  
          <div class="box mb-auto">
              <h3>LIÊN HỆ</h3>
              <p>Hotline: 000000000000</p>
              <p>Gmail: foodstorepla@gmail.com</p>
              <p>Facebook: Plafood</p>
          </div>

          </div>
          
          </nav>
          
    </footer>

      
      



</html>