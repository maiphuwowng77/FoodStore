<?php
	//Hien thi gio hang
	function showgiohang1(){
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            if(sizeof($_SESSION['giohang'])>0){
                $tong=0;
                for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                    $tt=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                    $tong+=$tt;
                    echo '<tr>
                            <td>'.($i+1).'</td>
                            <td><img src="'.$_SESSION['giohang'][$i][0].'" style ="width: 250px; height: 170;"" alt=""></td>
                            <td>'.$_SESSION['giohang'][$i][1].'</td>
                            <td>'.$_SESSION['giohang'][$i][2].'</td>
                            <td>'.$_SESSION['giohang'][$i][3].'</td>
                            <td>
                                <div>'.$tt.'</div>
                            </td>
                        </tr>';
                }
                echo '<tr>
                        <th colspan="5">Tổng đơn hàng</th>
                        <th>
                            <div>'.$tong.'</div>
                        </th>
    
                    </tr>';
            }else{
                echo "Giỏ hàng rỗng!";
            }    
        }
    }

    //kiem tra trang thai cua san pham (co san hay ko?)
    function checkAvailable($productName) {
    	$sql = 'select * from products where productName = "'.$productName.'"';
        $check = executeSingleResult($sql);
        return $check;
    }

    //Lay danh sach san pham tu database        
    function productInfo($productLine) {
    	$sql          = 'select * from products where productLine = "'.$productLine.'"';
        $productList = executeResult($sql);
        foreach ($productList as $item) {
                    echo '
                      <div class="col-sm-3">
                        <div class="card" style="width: 16rem; height: 24.5rem; padding: 3% 3%">
                          <img src="'.$item['image_path'].'" class="card-img-top" alt="..." style="height: 9.7rem;";>
                          <h5 class="card-title m-3">'.$item['productName'].'</h5>
                          <form action="cart.php" method="post">
                              <div style="font-size: 105%; padding-left: 6%">Giá thành: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$item['price'].' &#273</div>
                              
                              <div class="card-body">
                                <div style="font-size: 105%">Số lượng: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                              <input type="number" style="text-align: right; width: 80px"name="soluong" min="1" max="10" value="1" ></div>
                              </div>
                              &nbsp;<input type="submit" class="btn btn-warning" name="addcart" value="Thêm vào giỏ hàng" style ="height:50px; width:230px;">
                            

                              <input type="hidden" name="tensp" value="'.$item['productName'].'">
                              <input type="hidden" name="gia" value="'.$item['price'].'">
                              <input type="hidden" name="hinh" value="'.$item['image_path'].'">
                          </form>
                        </div>
                      </div>';
                }
    }

    //tim kiem san pham
    function productSearch($productName) {
    	//Lay danh sach san pham tu database
                $sql          = 'select * from products where productName LIKE "%'.$productName.'%"';
                $productList = executeResult($sql);

                foreach ($productList as $item) {
                    echo '
                      <div class="col-sm-3">
                        <div class="card" style="width: 17rem; height: 25rem; padding: 2% 2%">
                          <img src="'.$item['image_path'].'" class="card-img-top" alt="..." width="300" height="180";>
                          <h5 class="card-title m-3">'.$item['productName'].'</h5>
                          <form action="cart.php" method="post">
                              <div style="font-size: 105%; padding-left: 6%">Giá thành: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$item['price'].' &#273</div>
                              
                              <div class="card-body">
                                <div style="font-size: 105%">Số lượng: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                              <input type="number" style="text-align: right; width: 80px"name="soluong" min="1" max="10" value="1" ></div>
                              </div>
                              &nbsp;<input type="submit" class="btn btn-warning" name="addcart" value="Thêm vào giỏ hàng" style ="height:50px; width:250px;">
                            

                              <input type="hidden" name="tensp" value="'.$item['productName'].'">
                              <input type="hidden" name="gia" value="'.$item['price'].'">
                              <input type="hidden" name="hinh" value="'.$item['image_path'].'">
                          </form>
                        </div>
                      </div>';
                }
    }
?>