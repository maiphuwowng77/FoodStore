<?php
  session_start();
  require_once ('../../db/dbhelper.php');
  require_once ('../../db/store/customer_store/order_processing.php');
  $dondathang = showgiohang();
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
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Nunito&family=Rubik&display=swap" rel="sty\ưlesheet">
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
            
          </ul>
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
      
<br></br>
  <body style="padding-top:120px">
    <h1 class="text-center introduce my-5">Thông tin</h1>
  
    <div id="wrapper">
        <div id="content-wrapper" class="container d-flex flex-column">
            <div id="content">
              <form action="bill.php" method="post">
                <div class="container-fluid">
                    <div class="tabControl">
                        <div class="container">
                            <ul class="nav nav-pills nav-fill justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#khhang" role="tab">1. Điền thông tin khách hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#thanhtoan" role="tab">2. Hình thức thanh toán</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="khhang" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="tab-content">
                                  <div class="tab-pane fade show active" id="info">
                                    <form>
                                    <div class="row g-3 m-5">
                                      <div class="col-md-6">
                                        <label for="inputname" class="form-label info-title">Họ và tên</label>
                                        <input type="text" name="hoten" id="hoten" class="form-control form-control-lg" placeholder="Họ và tên" required>
                                      </div>
                                      <div class="col-md-6">
                                        <label for="inputphone" class="form-label info-title">Số điện thoại</label>
                                        <input type="tel" name="dienthoai" id="dienthoai" class="form-control form-control-lg" placeholder="Số điện thoại" required>
                                      </div>
                                      <div class="col-12">
                                        <label for="inputAddress" class="form-label info-title">Địa chỉ</label>
                                        <input type="text" name="diachi" id="diachi" class="form-control form-control-lg" placeholder="Địa chỉ" required>
                                      </div>
                                      <div class="col-12">
                                        <label for="in" class="form-label info-title">Ghi chú</label>
                                        <textarea name="ghichu" class="form-control form-control-lg" placeholder="Ghi chú" id="floatingTextarea"></textarea>
                                      </div>
                                    </div>
                                    </form>
                                  </div>
                                </div>

                                <div class="col-6 col-sm-3 mx-auto text-center" id="btnNext">
                                    <a class="btn btn-primary btnNext" style="width: 250px;" value="Tiếp tục thanh toán">Tiếp tục thanh toán</a>
                                </div>

                                <div class="content">
                                  <div>
                                          <div>
                                              <h2 class="mt-5" style="width: 100%; text-align: center;"><font color="#fa9c21">Đơn hàng</font></h2>
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
                                                      <?php echo $dondathang; ?>           
                                                  </thead>
                                              </table>
                                          </div>
                                      </div>  
                              
                              </div>

                            </div>
                            <div class="tab-pane fade" id="thanhtoan" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <br><br>
                                <div><img src ="../img/thanh toan1.jpg" style="width: 950px; padding-left: 18%; text-align: center;"></div>
                                <div class="form-group" style="padding-left: 20%;">
                                  <br>
                                  
                                  <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="pttt" id ="pttt1" value="Internet Banking">Internet Banking
                                    </label>
                                  </div>
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;
                                  <div class="form-check-inline" >
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="pttt" id ="pttt2" value="Thanh toán ATM">Thanh toán ATM
                                    </label>
                                  </div>
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" checked name="pttt" id ="pttt3" value="Tiền mặt">Tiền mặt
                                    </label>
                                  </div> 
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="pttt" id ="pttt4" value="Chuyển khoản">Chuyển khoản
                                    </label>
                                  </div> 
                              
                            </div>
                            <br><br>
                            <div style="padding-left: 35%;">
                                  <a class="btn btn-primary btnPrevious" id="btnPrevious" style="width: 120px;">QUAY LẠI</a>
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  <input type="submit" class="btn btn-primary"style="width: 120px;" value="ĐẶT HÀNG" name="dongydathang">
                                  
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>
      <!-- Bootstrap -->
    
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
      <script src="https://kit.fontawesome.com/1b59bc20c8.js"></script>
        <script src="./function.js"></script>
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