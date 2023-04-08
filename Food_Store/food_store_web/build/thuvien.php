<?php
    function taokhachhang($customerName,$address,$phone,$email) {
        $sql      = 'select * from customer where phone = '.$phone;
        $customer = executeSingleResult($sql);
        if ($customer == null) {
            $sql = 'insert into customer(customerName, address, phone, email) values("'.$customerName.'", "'.$address.'", "'.$phone.'", "'.$email.'")';
            execute($sql);
            $sql = 'select * from customer order by customerNumber desc';
            $last_customer = executeSingleResult($sql);
            $last_id = $last_customer['customerNumber'];
            return $last_id;
        } else {
            return $customer['customerNumber'];
        }
    }
    function taodonhang($customerNumber,$total) {
        $sql = 'insert into orders(orderDate,customerNumber,orderPrice) values(current_date, "'.$customerNumber.'", "'.$total.'")';
        execute($sql);
        $sql = 'select * from orders order by orderNumber desc';
        $last_order = executeSingleResult($sql);
        $last_id = $last_order['orderNumber'];
        return $last_id;
    }
    function taogiohang($orderNumber, $productName, $quantity, $priceEach, $orderLineNumber) {
        $sql = 'insert into orderdetails(orderNumber,productCode,quantity,priceEach,orderLineNumber) values("'.$orderNumber.'", (select productCode from products
     where productName = "'.$productName.'"), "'.$quantity.'", "'.$priceEach.'", "'.$orderLineNumber.'")';
        execute($sql);
    }

    function tongdonhang(){
        $tong=0;
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            if(sizeof($_SESSION['giohang'])>0){
                for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                    $tt=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                    $tong+=$tt;
                }
            }
        }
        return $tong;
    }
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
    function showgiohang(){
        $ttgh = "";
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            if(sizeof($_SESSION['giohang'])>0){
                $tong=0;
                for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                    $tt=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                    $tong+=$tt;
                    $ttgh.= '<tr>
                            <td>'.($i+1).'</td>
                            <td><img src="../img/menu/'.$_SESSION['giohang'][$i][0].'" width = 250px alt=""></td>
                            <td>'.$_SESSION['giohang'][$i][1].'</td>
                            <td>'.$_SESSION['giohang'][$i][2].'</td>
                            <td>'.$_SESSION['giohang'][$i][3].'</td>
                            <td>
                                <div>'.$tt.'</div>
                            </td>
                        </tr>';
                }
                $ttgh.= '<tr>
                        <th colspan="5">Tổng đơn hàng</th>
                        <th>
                            <div>'.$tong.'</div>
                        </th>
    
                    </tr>';
            }
        }
        return $ttgh;
    }

?>