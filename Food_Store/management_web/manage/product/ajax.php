<?php
require_once ('../../../db/dbhelper.php');
require_once ('../../../db/store/manage_store/manage_product.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['productCode'])) {
					$productCode = $_POST['productCode'];
					deleteProduct($productCode)
				}
				break;
		}
	}
}