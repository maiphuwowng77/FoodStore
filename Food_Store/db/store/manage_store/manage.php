<?php
	function sumEmploy() {
		$sqlEmploy = "SELECT COUNT(*) as count FROM employees";
    	$sumEmploy = sum($sqlEmploy);
    	return $sumEmploy;
	}

	function sumProduct() {
		$sqlProduct = "SELECT COUNT(*) as count FROM products";
    	$sumProduct = sum($sqlProduct);
    	return $sumProduct;
	}

	function sumCustomer() {
		$sqlCustomer = "SELECT COUNT(*) as count FROM customer";
    	$sumCustomer = sum($sqlCustomer);
    	return $sumCustomer;
	}

	function sumOrder() {
		$sqlOrder = "SELECT COUNT(*) as count FROM orders";
    	$sumOrder = sum($sqlOrder);
    	return $sumOrder;
	}

	//cac don hang dang thuc hien
	function order() {
		$sql = "SELECT * FROM orders WHERE status != 'Hoàn thành'";
		$orderList = executeResult($sql);
		foreach ($orderList as $item) {
			$orderNumber = $item['orderNumber'];
			$sql = 'SELECT GROUP_CONCAT(" ",CONCAT(p.productName, " (SL: ", od.quantity, ")")) as "orderdetails" FROM orders o JOIN orderdetails od USING(orderNumber) JOIN products p USING(productCode) WHERE o.orderNumber = "'.$orderNumber.'"';
			$orderdetails = executeSingleResult($sql);
			$sql = 'SELECT CONCAT_WS(" - ", c.customerName, c.phone, c.address) as "customer" FROM orders o JOIN customer c USING(customerNumber) WHERE o.orderNumber = "'.$orderNumber.'"';
			$customer = executeSingleResult($sql);
			echo '<form method="post">
	                        	<tr>
                                        <td>' . $item['orderNumber'] . '</td>
										<td>' . $item['orderDate'] . '</td>
										<td>' . $customer['customer']. '</td>
										<td>' . $item['orderPrice'] . '</td>
										<td>' . $orderdetails['orderdetails'] . '</td>
										<td>' . $item['note'] . '</td>
										<td>' . $item['payment_method'] . '</td>
                                        <td style ="padding-top: 25px; padding-left: 20px"><input type="checkbox" id="done" name="done" value="'.$item['orderNumber'].'">
                                        <label for="done"></label><br></td>	
                                        <td><input type="submit" class="btn btn-warning" name="sua" value="Lưu"></td>
									</tr>
									</form>';
		}
	}

	//danh dau don hang hoan thanh
	function orderCheck($orderNumber) {
        $sql = 'update orders set status = "Hoàn thành" where orderNumber = "'.$orderNumber.'"'; 
    	execute($sql);
	}

	//kiem tra thong tin dang nhap
	function checkAccount($username, $password) {
        $check = 0;
        $sql = 'select * from account';
        $account = executeSingleResult($sql);
        if ($username == $account['username'] && $password == $account['password']) {
            $check = 1;
        } 
        return $check;
    }
?>