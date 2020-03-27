// Bat su kien click vao nut Dang nhap
$('#submit_signin').on('click', function(){
	// Gan cac gia tri trong form dang nhap vao cac bien
	$user_signin = $('#user_signin').val();
	$pass_signin = $('#pass_signin').val();

	// Neu mot trong cac gia tri bien nay rong
	if ($user_signin == '' || $pass_signin == '') {
		// Hien thi thong bao loi
		$('#formSignin .alert').removeClass('hidden');
		$('#formSignin .alert').html('Vui long dien day du thong tin cao form tren.');
	}
	// Nguoc lai
	else {
		// Thuc thi gui du lieu bang ajax
		$.ajax({
			url: 'signin.php', // Duong dan file nhan du lieu
			type: 'POST', //Phuong thuc gui du lieu
			// Cac du lieu
			data : {
				user_signin : $user_signin,
				pass_signin : $pass_signin
				// Thuc thi khi gui du lieu thanh cong
			}, success : function(data) {
				$('#formSignin .alert').html(data);
			}
		});
	}
});