<?php
	//Lay danh sach san pham tu database
	function productList() {
		$sql = 'select * from products';
        $productList = executeResult($sql);
		return $productList;
	}

	//lay danh sach danh muc san pham
	function productlineList() {
		$sql = 'select * from productline';
		$productlineList = executeResult($sql);
		return $productlineList;
	}

	//tim kiem nhan vien
	function productSearch($productName) {
		//Lay danh sach san pham tu database
        $sql = 'select * from products where productName LIKE "%'.$productName.'%"';
        $productList = executeResult($sql);
		return $productList;
	}

	//lay thong tin san pham co ma so cho trc
	function productInfo($productCode) {
		$sql      = 'select * from products where productCode = "'.$productCode.'"';
		$products = executeSingleResult($sql);
		return $products;
	}

	//xoa nhan vien khoi db
	function deleteProduct($productCode) {
		$sql = 'delete from products where productCode = '.$productCode;
		execute($sql);
	}

	//them,sua nhan vien vao db
	function addProduct($productCode, $productName, $productLine, $productDescription, $price, $available, $image_path) {
		//Luu vao database
		if ($productCode == '') {
			
			$sql = 'insert into products(productCode, productName, productLine, productDescription, price, available, image_path) values ("'.$productCode.'", "'.$productName.'", "'.$productLine.'", "'.$productDescription.'", "'.$price.'", "'.$available.'", "'.$image_path.'")';

		} else {
			$sql = 'update products set productCode = "'.$productCode.'", productName = "'.$productName.'", productLine = "'.$productLine.'", productDescription = "'.$productDescription.'", price = "'.$price.'", available = "'.$available.'", image_path = "'.$image_path.'" where productCode = "'.$productCode.'"';
		}

		execute($sql);
	}

?>