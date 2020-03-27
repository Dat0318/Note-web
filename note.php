<?php
	// Ket noi database, session, general info
	require 'core/init.php';

	// Neu khong tin tai $user
	if (!$user) {
		header('Location: index.php'); // Di chuyen den trang chu
	}

	// Neu ton tai hanh dong nao do gui den
	if (isset($_POST['ac'])) {
		$ac = $_POST['ac'];
		// Neu hanh dong la create
		if ($ac == 'create') {
			// Nhan du lieu va gna vao cac bien dong thiu xu ly chuoi
			$title_create_note = $db -> real_escape_string(@$_POST['title_create_note']);
			$body_create_note = $db->real_escape_string(@$_POST['body_create_note']);

			$title_create_note = trim(htmlentities($title_create_note));
			$body_create_note = htmlentities($body_create_note);

			// Cac bien chua code JS ve thong bao
			$show_alert = "<script>$('#formCreateNote .alert').removeClass('hidden');</script>";
			$hide_alert = "<script>$('#formCreateNote .alert').addClass('hidden');</script>";
			$success_alert = "<script>$('#formCreateNote .alert').attr('class', 'alert alert-success');</script>";

			// Lenh SQL tao note
			$sql_create_note = "INSERT INTO notes VALUES (
				'',
				'$data_user[id_user]',
				'$title_create_note',
				'$body_create_note',
				'$date_current'
			)";

			// Thuc thi truy van
			$db -> query($sql_create_note);

			// Hien thi thong bao va di chuyen den trang edit cua note vua tao
			echo $show_alert.$success_alert.'Tao note thanh cong
				<script>
					location.href = "index.php?ac=edit_note&&id=".$db->insert_id()."
				</script>
			';
		}
		// Neu hanh dong la edit

		else if($ac == 'edit') {
			// Nhan du lieu  va gan vao caca bien dong thoi xu ly chuoi
			$title_edit_note = $db ->c(@$_POST['title_edit_note']);
			$body_edit_note = $db ->real_escape_string(@$_POST['body_edit_note']);
			$id_edit_note = $db ->real_escape_string(@$_POST['id_edit_note']);
	
			$title_edit_note = trim(htmlentities($title_edit_note));
			$body_edit_note = htmlentities($body_edit_note);
			$id_edit_note = trim(htmlentities($id_edit_note));
	
			echo $title_edit_note." ".$body_edit_note;
	
			// Cac bien chua code JS ve thong bao
			$show_alert = "<script>$('#formEditNote .alert').removeClass('hidden');</script>";
		$hide_alert = "<script>$('#formEditNote .alert').addClass('hidden');</script>";
		$success_alert = "<script>$('#formEditNote .alert').attr('class', 'alert alert-success');</script>";
	
		// Lenh SQL kien tra co ton tai ID note
		$sql_check_id_exist = "SELECT id_note, user_id FROM notes WHERE user_id='$data_user[id_user]' AND id_note='$id_edit_note' ";
	
		// Neu co
		if ($db -> num_rows($sql_check_id_exist)) {
			// Lenh SQL Sua cac note
			$sql_edit_note = "UPDATE notes SET
					body = '$body_edit_note',
					title = '$title_edit_note'
					WHERE user_id = '$data_user[id_user]' AND id_note = '$id_edit_note'
			";
			// Thuc thi cau truy van
			$db-> query($sql_edit_note);
			// Close Ket noi
			$db-> close();
	
			// Hien thi thong bao va tai lai trang
			echo $show_alert.$success_alert."Da chinh sua note
			<script>
			  location.reload;
			</script>
			";
		}
		// Nguoc lai khong
		else {
			// Hien thi thong bao loi
			echo $show_alert."Ban da co tinh sua chua ID note, nhung rat tiec ID note nay khong ton tai hoac khong thuoc quyen so huu cua ban.";
		}
		}
	
		// Neu la hanh dong delete
		else if ($ac == 'delete')
		{
			// Nhận dữ liệu và gán vào các biến đồng thời xử lý chuỗi
			$id_edit_note = $db->real_escape_string(@$_POST['id_edit_note']);
			$id_edit_note = trim(htmlentities($id_edit_note));
		 
			// Các biến chứa code JS về thông báo
			$show_alert = "<script>$('#modalDeleteNote .alert').removeClass('hidden');</script>";
			$hide_alert = "<script>$('#modalDeleteNote .alert').addClass('hidden');</script>";
			$success_alert = "<script>$('#modalDeleteNote .alert').attr('class', 'alert alert-success');</script>";
				 
			// Lệnh SQL kiểm tra có tồn tại ID note và thuộc quyền sở hữu
			$sql_check_id_exist = "SELECT id_note, user_id FROM notes WHERE user_id = '$data_user[id_user]' AND id_note = '$id_edit_note'";
		 
			// Nếu có
			if ($db->num_rows($sql_check_id_exist))
			{
				// Lệnh SQL xoá note
				$sql_delete_note = "DELETE FROM notes WHERE user_id = '$data_user[id_user]' AND id_note = '$id_edit_note'";
				// Thực thi truy vấn
				$db->query($sql_delete_note);
				// Giải phóng kết nối
				$db->close();
		 
				// Hiển thị thông báo và trở về trang chủ
				echo $show_alert.$success_alert." Xoá note thành công.
					<script>
						location.href = 'index.php';
					</script>
				";
			}
			// Ngược lại không 
			else
			{
				// Hiển thị thông báo lỗi
				echo $show_alert.'Bạn đã cố tình sửa chữa ID note, nhưng rất tiếc ID note này không tồn tại hoặc không thuộc quyền sở hữu của bạn.';
			}
		}

		// END
	}
?>