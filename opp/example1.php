<?php
	class User{
		public $name;
		public $email;
		public $password;
		public $phone;
		public $addrees;
		private function addUser(){
			echo "add";
		}
		public function editUser(){
			echo "edit";
		}
		public function registerUser(){
			echo "register";
		}
		public function viewUser(){
			echo "view";
		}
		private function listUser(){
			echo "list";
		}
	}


	class Customer extends User{
		public $addreesGh;
		public $idKH;
		public function payCustomer(){
			echo "pay";
		}
		public function politeCustomer(){
			echo "polite";
		}
		
	}
	$user = new User();
	$user->registerUser();
	echo "<br>";
	$customer = new Customer();
	$customer ->payCustomer();
 ?>