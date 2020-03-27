<?php 
	
	// Lenh SQL Lay du lieu note theo ID
	$sql_get_data_note = "SELECT * FROM notes WHERE user_id = '$data_user[id_user]' AND id_note = '$get_id'";

	// Lay du lieu
	$data_note = $db -> fetch_assoc($sql_get_data_note, 1);
	$date_created = $data_note['date_created'];
	$day_created = substr($date_created, 8, 2); // Ngay tao
	$month_created = substr($date_created, 5, 2); // Thang tao
	$year_created = substr($date_created, 0, 4); // Nam tao
	$hour_created = substr($date_created, 11, 2); // Gio tao
	$min_created = substr($date_created, 14, 2); // Phut tao
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-primary">Chinh sua note</h3>
			<div class="alert alert-info">Da tao vao ngay
				<?php 
					// Hien thi ngay thang tao
					echo $day_created . ' thang '.
					$month_created.' nam '.
					$year_created.' luc '.
					$hour_created.' : '.$min_created
					;
				?>
			</div>
			<form method="POST" onsubmit="return false;" id="formEditNote">
				<div class="form-group">
					<label for="user_signin">Tieu de</label>
					<input type="text" class="form-control" id="title_edit_note" value="<?php echo $data_note['title'];  ?>">
				</div>
				<div class="form-group">
					<label for="pass_signin">Noi dung</label>
					<textarea id="body_edit_note" rows="5" class="form-control"><?php echo $data_note['body'];  ?></textarea>
				</div>
				<input type="hidden" value="<?php echo $data_note['id_note']; ?>" id="id_edit_note">
				<a href="index.php" class="btn btn-default">
					<span class="glyphicon-arrow-left glyphicon"></span>Tro ve
				</a>
				<button class="btn btn-danger pull-right" data-toggle="modal" data-target="#modalDeleteNote">
          <span class="glyphicon glyphicon-trash"></span> Xoá
        </button>
				<button class="btn btn-primary" id="submit_edit_note">
					<span class="glyphicon-ok glyphicon"></span> Luu
				</button>
				<br><br>
				<div class="alert alert-danger hidden"></div>
			</form>
		</div>
	</div>
</div>