<?php 
	include 'config/database.php';
	class HomeModel extends ConnectDB {
		function getHomePage() {
			// echo "ket noi dc chua";
			$sql = "SELECT * FROM news";
			// var_dump($sql); exit();
			$listNews = mysqli_query($this->connect_db(), $sql);
    		return $listNews;
		}
	}
?>