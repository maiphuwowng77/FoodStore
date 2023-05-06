<!DOCTYPE html>
<?php
    require_once('../../../db/dbhelper.php');
    if (session_id()=='') session_start();
    if (isset($_SESSION['username']) == false) {
        header("location: ../account/index.php");
        exit();
    }
    $tendangnhap = $_SESSION['username'];
    $loi="";
    $thongbao ="";
    if (isset($_POST['btndoimatkhau'])== true) {
        $matkhaucu = $_POST['matkhaucu'];
        $matkhaumoi_1 = $_POST['matkhaumoi_1'];
        $matkhaumoi_2 = $_POST['matkhaumoi_2'];
        $conn = new PDO("mysql:host=localhost;port=3307;dbname=food_store;charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql ="SELECT * FROM account WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$tendangnhap, $matkhaucu]);
        if ($stmt->rowCount() == 0) {
            $loi.="Mật khẩu cũ không đúng!<br>";
        }
        if ($matkhaumoi_1 != $matkhaumoi_2) {
            $loi.="Mật khẩu mới không khớp. Vui lòng nhập lại!<br>";
        }
        if ($loi=="") {
            $thongbao = "Cập nhật mật khẩu thành công!";
            $sql ="UPDATE account SET password = ? WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$matkhaumoi_1, $tendangnhap]);
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <link rel="stylesheet" href="../index.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!----======== CSS ======== -->
    <title>Quản lý</title>
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

            <div class="sidebar-content" style="margin-left:-2rem;">
                <ul class="lists">
                    <li class="list">
                        <a href="../index.php" class="nav-link">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="link">Trang chủ</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../employee" class="nav-link">
                            <i class='bx bx-user icon'></i>
                            <span class="link">Quản lý nhân viên</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../product" class="nav-link">
                            <i class='bx bxs-bowl-hot icon'></i>
                            <span class="link">Quản lý sản phẩm</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../order" class="nav-link">
                            <i class='bx bx-cart-alt icon'></i>
                            <span class="link">Quản lý đơn hàng</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../customer" class="nav-link">
                            <i class='bx bxs-group icon'></i>
                            <span class="link">Quản lý khách hàng</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="" class="nav-link active">
                            <i class='bx bxs-key icon'></i>
                            <span class="link">Đổi mật khẩu</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../../../food_store_web/build/index.html" class="nav-link">
                            <i class='bx bx-log-out icon'></i>
                            <span class="link">Đăng xuất</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" >
        <div class=" panel panel-primary"  style="padding:0% 20% 0% 20%">
            <div class="panel-heading" style="text-align:center">
                <h2>ĐỔI MẬT KHẨU</h2>
            </div>
            <div class="panel-body border">
            <form method="post" style="width:500px;font-size:1rem">
                <?php if ($loi != "") { ?>
                    <div class="alert alert-secondary" style="background-color: red"><?php echo $loi ?></div>
                <?php } ?>
                <?php if ($thongbao != "") { ?>
                    <div class="alert alert-secondary" style="background-color: lightgreen"><?php echo $thongbao ?></div>
                <?php } ?>
                <div class="mb-3">
                    <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
                    <input value="<?php echo $tendangnhap ?>" type="text" disabled class="form-control" id="tendangnhap" name="tendangnhap">
                </div>
                <div class="mb-3">
                    <label for="matkhaucu" class="form-label">Mật khẩu cũ</label>
                    <input type="password" class="form-control" id="matkhaucu" name="matkhaucu" required>
                </div>
                <div class="mb-3">
                    <label for="matkhaumoi_1" class="form-label">Mật khẩu mới</label>
                    <input type="password" class="form-control" id="matkhaumoi_1" name="matkhaumoi_1" required>
                </div>
                <div class="mb-3">
                    <label for="matkhaumoi_2" class="form-label">Nhập lại mật khẩu mới</label>
                    <input type="password" class="form-control" id="matkhaumoi_2" name="matkhaumoi_2" required>
                </div>
                <button type="submit" name="btndoimatkhau" value="doimk" class="btn btn-success">Đổi mật khẩu</button>
            </form>
            </div>
        </div>
    </div>
</body>