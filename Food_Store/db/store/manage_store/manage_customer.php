<?php
	//Lay danh sach khach hang tu database
	function customerList() {
		$sql = 'select * from customer';
        $customerList = executeResult($sql);
		return $customerList;
	}

	//tim kiem khach hang
	function customerSearch($customerName) {
		//Lay danh sach san pham tu database
        $sql = 'select * from customer where customerName LIKE "%'.$customerName.'%"';
        $customerList = executeResult($sql);
		return $customerList;
	}

?>