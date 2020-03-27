<?php 
	// Include cac thu vien
	require_once 'classes/DB.php';
	require_once 'classes/Session.php';

	// Khoi tao object DB
	$db = new DB();
	// Ket noi databaseSS
	$db ->connect();

	// Khoi tao object Session
	$session = new Session();
	// bat dau Session
	$session ->start();
	// Lay du lieu session
	$user = $session ->get();
	// Mui gio chung
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$date_current = '';
	$date_current = date("Y-m-d H:i:sa");

	// Neu ton tai user
	if ($user) {
		// Lenh truy van thong tin User
		$sql_get_data_user = "SELECT * FROM users WHERE username = '$user' ";
		// Lay thong tin user
		$data_user = $db->fetch_assoc($sql_get_data_user, 1);
	}
 ?>