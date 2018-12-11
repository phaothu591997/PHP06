<?php 
	$conn = mysqli_connect('localhost','root','','18php06');
	if(!$conn){
		 die("Kết nối thất bại: " . mysqli_connect_error());
	}
	else{
		echo"kết nối thành công";
	}
?>