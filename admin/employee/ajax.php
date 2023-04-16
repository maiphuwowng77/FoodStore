<?php
require_once ('../../db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['employeeNumber'])) {
					$employeeNumber = $_POST['employeeNumber'];

					$sql = 'delete from employees where employeeNumber = '.$employeeNumber;
					execute($sql);
				}
				break;
		}
	}
}