<?php
	//Lay danh sach nhan vien tu database
	function employeeList() {
		$sql          = 'select * from employees';
		$employeeList = executeResult($sql);
		return $employeeList;
	}

	//lay danh sach cua hàng
	function storeList() {
		$sql          = 'select * from store';
		$storeList = executeResult($sql);
		return $storeList;
	}

	//tim kiem nhan vien
	function employeeSearch($employeeName) {
		//Lay danh sach nhan vien tu database
		$sql  = 'select * from employees where employeeName LIKE "%'.$employeeName.'%"';    
		$employeeList = executeResult($sql);
		return $employeeList;
	}

	//lay thong tin nhan vien co ma so cho trc
	function employeeInfo($employeeNumber) {
		$sql      = 'select * from employees where employeeNumber = '.$employeeNumber;
		$employees = executeSingleResult($sql);
		return $employees;
	}

	//xoa nhan vien khoi db
	function deleteEmployee($employeeNumber) {
		$sql = 'delete from employees where employeeNumber = '.$employeeNumber;
		execute($sql);
	}

	//them nhan vien vao db
	function addEmployee($employeeNumber, $employeeName, $gender, $birthday, $email, $phone, $storeId, $managerId, $jobTitle, $start_date) {
		if ($employeeNumber == '') {
			
			$sql = 'insert into employees(employeeName, gender, birthday, email, phone, storeId, managerId, jobTitle, start_date) values ("'.$employeeName.'", "'.$gender.'", "'.$birthday.'", "'.$email.'", "'.$phone.'", "'.$storeId.'", "'.$managerId.'", "'.$jobTitle.'", "'.$start_date.'")';

		} else {
			$sql = 'update employees set employeeName = "'.$employeeName.'", gender = "'.$gender.'", birthday = "'.$birthday.'", email = "'.$email.'", phone = "'.$phone.'", storeId = "'.$storeId.'", managerId = "'.$managerId.'", jobTitle = "'.$jobTitle.'", start_date = "'.$start_date.'" where employeeNumber = '.$employeeNumber;
		}

		execute($sql);
	}

?>