<?php
require_once ('../../db/dbhelper.php');
require_once ('../../db/store/customer_store/product_info.php');
$sanpham ='';
if (!empty($_POST)) {
  if (isset($_POST['search'])) {
    $customerName = $_POST['sanpham'];  
  }
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
   
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
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
                <li><a class="dropdown-item" onclick="location.href='./product.php'">Tất cả</a></li>
                <li><a class="dropdown-item" onclick="location.href='./product.php#com'">Cơm</a></li>
                <li><a class="dropdown-item" onclick="location.href='./product.php#canh'">Canh</a></li>
                <li><a class="dropdown-item" onclick="location.href='./product.php#kimbap'">Kimbap</a></li>
                <li><a class="dropdown-item" onclick="location.href='./product.php#ga'">Gà</a></li>
                <li><a class="dropdown-item" onclick="location.href='./product.php#my'">Mỳ</a></li>
                <li><a class="dropdown-item" onclick="location.href='./product.php#tokbokki'">Tokbokki</a></li>
                <li><a class="dropdown-item" onclick="location.href='./product.php#douong'">Đồ uống</a></li>
              </ul>
            </div>
            
          </ul>

          <form class="d-flex" method="post" action="search.php" >
            <input class="px-2 search" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm" id = "sanpham" name = "sanpham" value="<?=$sanpham?>">
            <button type="submit" class="btn0" name="search">
                    <i class='bx bx-search'></i>
                </button>
          </form>
        </div>
            
        <div class="icon px-1">
          <img src="../img/icon/cart.jpg" onclick="location.href='./cart.php'" class="rounded-circle rounded float-start" style="border: solid 3px black;" width="45" height="45" alt="">
        </div>

        <div class="icon px-1">
          <img src="../img/icon/user.png" onclick="location.href='../../management_web/account'" class="rounded-circle rounded float-start" width="45" height="45" alt="">
        </div>
      </div>
    </nav>
  </header>
  <br><br><br></br></br></br> 
    <body >
      <div style="padding:5px">
        <h1 class="text-center introduce" >Sản phẩm</h1>
        <div class="row">
          <nav class="navbar navbar-expand-sm justify-content-center">
          <ul class="navbar-nav bg-intro" >
            <li class="nav-item">
              <a class="nav-link" href="#com">Cơm</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#canh">Canh</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#kimbap">Kimbap</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#ga">Gà</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#my">Mỳ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#tokbokki">Tokbokki</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#douong">Đồ uống</a>
            </li>
          </ul>
      </nav>
      </div>
      
    
      <br><br></br></br>
      <div class="productlist">
        <div id="com" class="container-fluid" style="padding:110px 10px; padding-left: 2.5%;">
          <h2>Cơm</h2>
          <br>
          <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
                productInfo('Com');
                
            ?> 
          </div>
        
        </div>
        <div id="canh" class="container-fluid" style="padding:110px 10px; padding-left: 2.5%;">
          <h2>Canh</h2>
          <br>
          <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
                productInfo('Canh');
            ?> 
          </div>
        </div>
        <div id="kimbap" class="container-fluid" style="padding:110px 10px; padding-left: 2.5%;">
          <h2>Kimbap</h2>
          <br>
          <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
                productInfo('Kimbap');
            ?> 
          </div>
        
        </div>
        <div id="ga" class="container-fluid" style="padding:110px 10px; padding-left: 2.5%;">
          <h2>Gà</h2>
          <br>
          <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
                productInfo('Ga');
            ?> 
          </div>
        
        </div>
        <div id="my" class="container-fluid" style="padding:110px 10px; padding-left: 2.5%;">
          <h2>Mỳ</h2>
          <br>
          <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
                productInfo('My');
            ?> 
          </div>
        
        </div>
        <div id="tokbokki" class="container-fluid" style="padding:110px 10px; padding-left: 2.5%;">
          <h2>Tokbokki</h2>
          <br>
          <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
                productInfo('Tokbokki');
            ?> 
          </div>
        
        </div>
        <div id="douong" class="container-fluid" style="padding:110px 10px; padding-left: 2.5%;">
          <h2>Đồ uống</h2>
          <br>
          <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
                productInfo('Do uong');
            ?> 
          </div>
        
        </div>
        
      </div>
      </div>
      
      

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>

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