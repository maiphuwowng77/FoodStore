<?php
require_once ('config.php');

function executeId($sql) {
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	mysqli_query($con, $sql);
	$last_id = $con->lastInsertId();
	$con = null;
	return $last_id;
}
function execute($sql) {
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	mysqli_query($con, $sql);

	//close connection
	mysqli_close($con);
}

function executeResult($sql) {
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$data   = [];
	while ($row = mysqli_fetch_array($result, 1)) {
		$data[] = $row;
	}

	//close connection
	mysqli_close($con);

	return $data;
}

function executeSingleResult($sql) {
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$row    = mysqli_fetch_array($result, 1);

	//close connection
	mysqli_close($con);

	return $row;
}

function sum($sql) {
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	// Thực hiện câu truy vấn đếm số sản phẩm
	$result = $con->query($sql);
	// Kiểm tra và hiển thị kết quả
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		return $row;
	} else {
		return 0;
	}
	mysqli_close($con);
}
