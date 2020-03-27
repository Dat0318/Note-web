<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-primary">Tao Note moi</h3>
			<form action="POST" onsubmit="return false;" id="formCreateNote">
				<div class="form-group">
					<label for="user_signin">Tieu de</label>
					<input type="text" class="form-control" id="title_create_note">
				</div>
				<div class="form-group">
					<label for="pass_signin">Noi dung</label>
					<textarea id="body_create_note" rows="5" class="form-control"></textarea>
				</div>
				<a href="index.php" class="btn btn-default">
					<span class="glyphicon-arrow-left glyphicon"></span>Tro ve
				</a>
				<button class="btn btn-primary" id="submit_create_note">
					<span class="glyphicon-ok glyphicon"></span>Tao note
				</button>
				<br><br>
				<div class="alert alert-danger hidden"></div>
			</form>
		</div>
	</div>
</div>