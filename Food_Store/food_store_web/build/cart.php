<?php
    session_start();
    include "thuvien.php";
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
    //làm rỗng giỏ hàng
    if(isset($_GET['delcart'])&&($_GET['delcart']==1)) unset($_SESSION['giohang']);
    //xóa sp trong giỏ hàng
    if(isset($_GET['delid'])&&($_GET['delid']>=0)){
       array_splice($_SESSION['giohang'],$_GET['delid'],1);
    }
    //lấy dữ liệu từ form
    if(isset($_POST['addcart'])&&($_POST['addcart'])){
        $hinh=$_POST['hinh'];
        $tensp=$_POST['tensp'];
        $gia=$_POST['gia'];
        $soluong=$_POST['soluong'];

        //kiem tra sp co trong gio hang hay khong?
        $fl=0; //kiem tra sp co trung trong gio hang khong?
        for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
            
            if($_SESSION['giohang'][$i][1]==$tensp){
                $fl=1;
                $soluongnew=$soluong+$_SESSION['giohang'][$i][3];
                $_SESSION['giohang'][$i][3]=$soluongnew;
                break;

            }
            
        }
        //neu khong trung sp trong gio hang thi them moi
        if($fl==0){
            //them moi sp vao gio hang
            $sp=[$hinh,$tensp,$gia,$soluong];
            $_SESSION['giohang'][]=$sp;
        }

       // var_dump($_SESSION['giohang']);
    }


?>


  <head>
    <title>The Food Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Nunito&family=Rubik&display=swap" rel="stylesheet">

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
              <li class="nav-item">
                <a class="nav-link active" onclick="location.href='./index.html'" href="#trangchu">Trang chủ</a>

              </li>
                <li class="nav-item">
                  <a class="nav-link" href="#gioithieu">Giới thiệu</a>
                </li>
              
                <div class="dropdown">
                  <button class="btn dropdown-toggle nav-link" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Sản phẩm
                  </button>
                  <ul class="nav-item dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" onclick="location.href='./product.html'" href="#">Tất cả</a></li>
                    <li><a class="dropdown-item" href="#">Cơm</a></li>
                    <li><a class="dropdown-item" href="#">Canh</a></li>
                    <li><a class="dropdown-item" href="#">Kimbap</a></li>
                    <li><a class="dropdown-item" href="#">Gà</a></li>
                    <li><a class="dropdown-item" href="#">Mì</a></li>
                    <li><a class="dropdown-item" href="#">Tokbokki</a></li>
                    <li><a class="dropdown-item" href="#">Đồ uống</a></li>
                  </ul>
                </div>


            
              <li class="nav-item">
                <a class="nav-link" onclick="location.href='./product.html'"href="#">Đặt hàng</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="px-2 search" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
              <button class="btn0" type="submit">Tìm kiếm</button>
            </form>
          </div>
            
          <div class="icon px-1">
            <img src="../img/icon/cart.jpg" onclick="location.href='./cart.php'" class="rounded-circle rounded float-start" width="70" height="70" alt="">
        </div>

        <div class="icon px-1">
          <img src="../img/icon/user.png" onclick="location.href='../../admin/account/index.php'"class="rounded-circle rounded float-start" width="40" height="40" alt="">
      </div>
        </div>
      </nav>
      
    </header>

<div class="content">
    <ul class="slideshow">
        <li><span></span></li>
        <li><span></span></li>
        <li><span></span></li>
        <li><span></span></li>
        <li><span></span></li>
        <li><span></span></li>
        <li><span></span></li>
        <li><span></span></li>
        <li><span></span></li>
    </ul>
    <div>
        <form action="bill.php" method="post">
            <div>
                <h2 style="width: 100%; text-align: center;"><font color="#fa9c21">Giỏ hàng</font></h2>
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
                        <?php ?>                  
                    </thead>
                </table>
            </div>
            <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" class="btn btn-warning" value="ĐẶT HÀNG" name="dongydathang">
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="cart.php?delcart=1"><input type="button" class="btn btn-warning" value="XÓA GIỎ HÀNG"></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="orderPage.html"><input type="button" class="btn btn-warning" value="TIẾP TỤC ĐẶT HÀNG"></a>
            </div>
        </div>
    </form>   

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
                  <a  onclick="location.href='./product.html'" href="#">Sản phẩm</a>
                </li>
                <li class="item">
                  <a onclick="location.href='./product.html'" href="#">Đặt hàng</a>
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