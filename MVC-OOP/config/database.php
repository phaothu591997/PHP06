<?php 	
	class ConnectDB {
		function connect_db() {
			$conn = mysqli_connect('localhost','root','','shopphp06');
			if(!$conn){
				 die("Kết nối thất bại: " . mysqli_connect_error());
			}
			else{
				echo"kết nối thành công";
				return $conn;
			}
		}
	}			
?>
