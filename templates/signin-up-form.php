
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-primary">Dang nhap</h3>
			<form action="" method="POST" onsubmit="return false;" id="formSignin">
				<div class="form-group">
					<label for="user_signin">Ten dang nhap</label>
					<input type="text" class="form-control" id="user_signin">
				</div>
				<div class="form-group">
					<label for="pass_signin">Mat khau</label>
					<input type="password" class="form-control" id="pass_signin">
				</div>
				<button class="btn btn-primary" id="submit_signin">Dang nhap</button>
				<br><br>
				<div class="alert alert-danger hidden"></div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-success">Dang ky tai khoan</h3>
			<p class="text-danger">* Vui long dang nhap day du thong tin duoi day de dang ky tai khoan: </p>
			<form action="" method="POST" onsubmit="return false;" id="formSignup">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Ten dang nhap" id="user_signup" >
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="mat khau" id="pass_signup" >
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="Nhap lai mat khau" id="repass_signup" >
				</div>
				<button class="btn btn-success" id="submit_signup">Tao tai khoan</button>
				<br><br>
				<div class="alert alert-danger hidden"></div>
			</form>
		</div>
	</div>
</div>
