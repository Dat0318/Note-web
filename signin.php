<?php 
	// Include database, session, genaraal info
	require_once 'core/init.php';

	// Neu khong ton tai $user
	if ($user) {
		header('Location: index.php'); // Di chuyen den trang chu
	}

	// Nhan du lieu va gan vao cac bien dong thoi su ly chuoi
	$user_signin = $db->real_escape_string(@$_POST['user_signin']);
	// $pass_signin = $_POST['pass_signin'];
	$pass_signin = md5(@$_POST['pass_signin']);

	// Cac bien chua code JS ve thong bao
	$show_alert = " <script>$('#formSignin alert').removeClass('hidden');</script>";
	$hidden_alert = " <script>$('#formSignin alert').addClass('hidden');</script>";
	$success_alert = " <script>$('#formSignin alert').attr('class', 'alert alert-success');</script>";

	// Lenh SQL kiwm tra su ton tau cua username
	$sql_check_user_exist = "SELECT username FROM users WHERE username = '$user_signin' ";
	// Neu ton tai username
	if ($db->num_rows($sql_check_user_exist)) {
		// Lenh SQL kiem tra password tuong ung voi username tren
		$sql_check_login = "SELECT username FROM users WHERE username = '$user_signin' AND password = '$pass_signin' ";
		echo $user_signin." - ".$pass_signin;
		// Neu dung
		if ($db->num_rows($sql_check_login)) {
			// Gui du lieu de luu session
			$session ->send($user_signin);
			// Giai phong ket noi
			$db->close();
			// Hien thi thong bao va tai lai trang
			echo $show_alert.$success_alert."Dang nhap thanh cong.
				<script>
					location.reload();
				</script>
			";
		}
		// Nguoc lai neu sai
		else {
			echo $show_alert."Mat khau khong chinh xac, dam bao da tat caps lock.";
		}
	}
	// Nguoc lai neu khong ton tai username
	else {
		echo $show_alert.'Ten dang nhap khong thuoc bat cu tai khoan nao.';
	}
 ?>
