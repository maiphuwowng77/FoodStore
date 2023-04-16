<?php
require_once ('../../db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['orderNumber'])) {
					$orderNumber = $_POST['orderNumber'];

					$sql = 'delete from orders where orderNumber = '.$orderNumber;
					execute($sql);
				}
				break;
		}
	}
}