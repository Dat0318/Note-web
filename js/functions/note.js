// Bat su kein khi click vao nut tao
$('#submit_create_note').on('click', function() {
	// gan cac gia tri vao trong form tao note vao cac bien
	$title_create_note = $('#title_create_note').val();
	$body_create_note = $('#body_create_note').val();
	$ac = 'create'; // hanh dong

	// Neu mot trong cac bien rong
	if ($title_create_note == '' || $body_create_note == '') {

		// Hieu thi mot thong bao loi
		$('#formCreateNote .alert').removeClass('hidden');
		$('#formCreateNote .alert').html('Vui long dien day du thong tin ben tren.');
	}
	// Nguoc lai
	else {
		// Thuc thi gui du lieu bang ajax
		$.ajax({
			url : 'note.php', // Duong dan file nhan du lieu
			type: 'POSt', // Phuong thuc gui du lieu
			// Cac du lieu
			data : {
				title_create_note : $title_create_note,
				body_create_note : $body_create_note,
				ac : $ac
				// thuc thi khi gui du lieu thanh cong
			}, success  :function(data) {
				$('#formCreateNote .alert').removeClass('hidden');
				$('#formCreateNote .alert').html(data);
			}
		});
	}
});

// bat su kien khi click vao nut sua
$('#submit_edit_note').on('click', function() {
	// Gan cac gia tri trong form note vao cac bien
	$title_edit_note = $('#title_edit_note').val();
	$body_edit_note = $('#body_edit_note').val();
	$ac = 'edit'; // Hanh dong
	$id_edit_note = $('#id_edit_note').val(); // lay ID trong field an
	// Neu mot trong cac bien nay rong
	if ($title_edit_note == '' || $body_edit_note == '') {
		// Hien thi thong bao loi
		$('#formEditNote .alert').removeClass('hidden');
		$('#formEditNote .alert').html('Vui long dien day du thong tin ben tren');
	}
	// Nguoc lai
	else {
		// Thuc thi guwi du lieu bang ajex
		// console.log($title_edit_note);
		// console.log($body_edit_note);
		$.ajax({
			url : 'note.php', // Duong dan file nhan du lieu
			type: 'POST', // Phuong thuc gui du lieu
			data: {
				title_edit_note : $title_edit_note,
				body_edit_note : $body_edit_note,
				ac : $ac,
				id_edit_note : $id_edit_note
				// Thuc thi khi dui du lieu thanh cong
			}, success  : function(data) {
				$('#formEditNote .alert').html(data);
			}
		});
	}
});

// Bắt sự kiện khi click vào nút Xoá
$('#submit_delete_note').on('click', function() {
	console.log(111);
    $ac = 'delete'; // Hành động
    $id_edit_note = $('#id_edit_note').val(); // Lấy ID trong field ẩn
 
    // Thực thi gửi dữ liệu bằng Ajax
    $.ajax({
        url : 'note.php', // Đường dẫn file nhận dữ liệu
        type : 'POST', // Phương thức gửi dữ liệu
        // Các dữ liệu
        data : {
            ac : $ac,
            id_edit_note : $id_edit_note
        // Thực thi khi gửi dữ liệu thành công
        }, success : function(data) {
            $('#modalDeleteNote .alert').html(data);
        }
    });
});