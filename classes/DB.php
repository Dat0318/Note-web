<?php 
	/**
	 * 
	 */
	class DB {
		// Khai bao cac bien duoi dang private
		private
			$hostname = 'localhost',
			$username = 'root',
			$password = '',
			$dbname = 'inote';

		// Khai bao cac bien ket noi
		public $cn = NULL;
		public $rc = NUll;

		// Ham ket noi
		public function connect() {
			// Ket noi
			$this->cn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
		}

		// Ham ngat ket noi
		public function close() {
			// Nou da ket noi
			if ($this->cn) {
				// Ngat ket noi
				mysqli_close($this->cn);
			}
		}

		// Hàm truy vấn
    public function query($sql = null) 
    {       
        // Nếu đã kết nối
        if ($this->cn){
            // Truy vấn
            mysqli_query($this->cn, $sql);
        }
    }

		// Ham den hang
		public function num_rows($sql = null) {
			// Neu da ket noi
			if ($this->cn) {
				$query = mysqli_query($this->cn, $sql);
				$row = mysqli_num_rows($query);
				return $row;
			}
		}

		// Ham lay du lieu
		public function fetch_assoc($sql = null, $type) {
			// Neu da ket noi
			if ($this->cn) {
				// Thuc thi truy van
				$query = mysqli_query($this->cn, $sql);
				// Neu tham so type = 0
				if ($type == 0) {
					while ($row = mysqli_fetch_assoc($query)) {
						$data[] = $row;
					}
					return $data;
				}
				// Neu tham so type = 1
				else if ($type == 1) {
					$data = mysqli_fetch_assoc($query);
					return $data;
				}
			}
		}

		// Ham xu ly chuoi du lieu truy van
		public function real_escape_string($string) {
			// Neu da ket noi
			if ($this ->cn) {
				// Xu ly chuoi du lieu truy van
				$string = mysqli_real_escape_string($this->cn, $string);
			}
			// Nguoc lai chua ket noi
			else {
				$string = $string;
			}
			return $string;
		}

		// Ham lay ID vua insert
		public function insert_id() {
			// Neu da ket noi
			if ($this->cn) {
				// Lay ID vua insert
				return mysqli_insert_id($this->cn);
			}
		}

	}
 ?>