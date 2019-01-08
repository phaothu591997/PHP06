<?php
	class User{
		var $name;
		var $email;
		var $password;
		var $phone;
		var $addrees;
		private function addUser(){
			echo "add";
		}
		function editUser(){
			echo "edit";
		}
		function registerUser(){
			echo "register";
		}
		function viewUser(){
			echo "view";
		}
		private function listUser(){
			echo "list";
		}
	}


	class Customer extends User{
		var $addreesGh;
		var $idKH;
		function payCustomer(){
			echo "pay";
		}
		function politeCustomer(){
			echo "polite";
		}
		
	}
	$user = new User();
	$user->registerUser();
	echo "<br>";
	$customer = new Customer();
	$customer ->payCustomer();
 ?>