<?php 
	/**
	 * 
	 */
	class Session	{
		// Ham gui du lieu
		public function send($user)	{
			$_SESSION['user'] = $user;
 		}

 		// Ham bat dau luu session
 		public function start() {
 			session_start();
 		}

 		// Ham lay du lieu
 		public function get() {
 			// Neu khong ton tai session dang luu
 			if ( isset($_SESSION['user'])) {
 				// Gan $user voi session
 				$user = $_SESSION['user'];
 			}
 			// Nguoc lai khong ton tai session
 			else {
 				$user = '';
 			}
 			return $user;
 		}

 		// Ham xoa session
 		public function destroy() {
 			session_destroy();
 		}
	}
	
 ?>