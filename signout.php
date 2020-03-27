<?php 
	// Include database, session, genaral info
	require_once 'core/init.php';

	// Xoa Session
	$session->destroy();
	// Tro ve trang chu
	header('Location: index.php');
 ?>