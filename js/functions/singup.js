// Bat su kien khi click vao nut tao tao khoan
$('#submit_signup').on('click', function(){
	// Gan cac gia tri trong form dang ky vao cac bien
	$user_signup = $('#user_signup').val();
	$pass_signup = $('#pass_signup').val();
	$repass_signup =  $('#repass_signup').val();

	// neu mot trong cac bien nay rong
	if ($user_signup == '' || $pass_signup == '' || $repass_signup == '') {
		// Hien thi thong bao loi
		$('#formSignup .alert').removeClass('hidden');
		$('#formSignup .alert').html('Vui long dien day du thong tin vao form');
	}
	// Nguoc lai
	else {
		// Thuc hien thi gui du lieu bang ajax
		$.ajax({
			url: 'signup.php', // Duong dan file nhan du lieu
			type: 'POST', // Phuong thuc gui du lieu

			data: {
				user_signup: $user_signup,
				pass_signup: $pass_signup,
				repass_signup: $repass_signup
				// Thuc thi khi gui du lieu thanh cong
			},success : function(data) {
				$('#formSignup .alert').html(data);
			}
		});
	}
});