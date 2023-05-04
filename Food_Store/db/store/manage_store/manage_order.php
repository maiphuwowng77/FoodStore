<?php
	//Lay danh sach don hang tu database
	function orderList() {
		$sql = 'select * from orders';
        $orderList = executeResult($sql);
		return $orderList;
	}

	//danh dau don hang hoan thanh
	function orderCheck($orderNumber) {
        $sql = 'update orders set status = "Hoàn thành" where orderNumber = "'.$orderNumber.'"'; 
    	execute($sql);
	}

?>