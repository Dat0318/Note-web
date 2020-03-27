<?php 
	// Include database, session, general info
	require_once 'core/init.php';

	// Include header
	require_once 'includes/header.php';

	// Layout
	// Neu ton tai $user
	if ($user) {
		// Kiem tra hanh dong
		// Neu thuc hien hanh dong
		if (isset($_GET['ac'])) {
			// Xu ly chuoi $ac
			$ac = addslashes(trim(htmlentities($_GET['ac'])));
			// Neu hanh dong la them note
			if ($ac == 'create_note') {
				// Include template form them note
				require_once 'templates/create-note-form.php';
			}
			// Nguoc lai neu hanh dong la chinh sua note
			else if ($ac == 'edit_note') {
				// Neu co ID truyen vao
				if (isset($_GET['id'])) {
					$get_id = addslashes(trim(htmlentities($_GET['id'])));
					if ($get_id != '') {
						// Lenh truy van kiem tra ru ton tai va quyen so huu note
						$sql_check_id_exist = "SELECT id_note, user_id FROM	notes WHERE user_id = '$data_user[id_user]' AND id_note = '$get_id' ";
						// Neu co ton tai va thuoc quyen so huu
						if ($db ->num_rows($sql_check_id_exist)) {
							// Include template chinh sua note
							require_once 'templates/edit-note-form.php';
						}
						// Nguoc lai khong ton tai va khong thuoc quyen so huu
						else {
							// Hien thi thong bao loi
							echo '  
								<div class="container">
								 	<div class="alert alert-danger">
								 		Note nay khong ton tai hoac khong thuoc quyen so huu cua ban.
								 	</div>	
								 </div>
							';
						}
					}
					// Nguoc lai khong co id truyen vao
					else {
						header('Location: index.php'); // Di chuyen ve trang chu
					}
				}
				else {
					header('Location: index.php'); // Di chuyen ve trang chu
				}
			}
			// Nguoc lai neu hanh dong la doi mat khau
			else if ( $ac == 'change_password') {
				// Include template form doi mat khau
				require_once 'templates/change-pass-form.php';
			}
		}
		// Nguoc lai khong thuc hien hanh dong
		else {
			// Include template danh sach nghi chu
			require_once 'templates/list-note.php';
		}
	}
	// Nguoc lai khong ton tai user
	else {
		// Include template form dang nhap, dang ky
		require_once 'templates/signin-up-form.php';
	}

	// Inlcude footer
	require_once 'includes/footer.php';
 ?>
 