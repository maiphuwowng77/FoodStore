<?php
require_once ('../../db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['productCode'])) {
					$id = $_POST['productCode'];

					$sql = 'delete from products where productCode = '.$id;
					execute($sql);
				}
				break;
		}
	}
}