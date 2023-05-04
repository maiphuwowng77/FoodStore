<?php
require_once ('../../db/dbhelper.php');
require_once ('../../db/store/customer_store/product_info.php');
$sanpham ='';
if (!empty($_POST)) {
  if (isset($_POST['search'])) {
    $productName = $_POST['sanpham'];  
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
          <ul class="navbar-nav m-5 my-2 my-lg-0 mx-auto">
            <li class="nav-item"><a class="nav-link active" onclick="location.href='./index.html'" href="#trangchu">Trang chủ</a></li>
            <li class="nav-item"><a class="nav-link" onclick="location.href='./index.html#gioithieu'" href="#gioithieu">Giới thiệu</a></li>
              
            <li class="nav-item"><a class="nav-link active" onclick="location.href='./product.php'" href="#sanpham">Sản phẩm</a></li>
          
          </ul>

          
        </div>
        <form class="d-flex" method="post" action="search.php" >
            <input class="px-2 search" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm" id = "sanpham" name = "sanpham" value="<?=$sanpham?>">
            <input type="submit" class="btn0" name="search" value="Tìm kiếm">
          </form>
            
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
      <h1 class="text-center introduce" >Sản phẩm</h1>
      <br><br></br></br>
      <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
                productSearch($productName);
            ?> 
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
