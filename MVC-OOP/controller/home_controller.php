<?php 
	include 'model/home_model.php';
	class homeController {
		function handleRequest() {
			$model    = new HomeModel();
			$listNews = $model ->getHomePage();
			include 'view/home_view.php';
		}
	}

?>