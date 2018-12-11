<!DOCTYPE html>
<html>
<head>
	<title> From</title>
</head>
<body>
	<?php
		$errorName = $errorUserName=$errorPassword = $errorGender = '';
		$name = $username = $password = $gender = '';
		if(isset($_POST['register'])){
			$name = $_POST['name'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$gender = isset($_POST['gender'])?$_POST['gender']:'';
			if(empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password'])){
				echo"vui long nhap day du thong tin ";
				if($name == ''){
					$errorName ='ten k dc de trong';
				}
				if($username == ''){
					$errorUserName ='ten k dc de trong';
				}
				if($password == ''){
					$errorPassword ='ten k dc de trong';
				}
				if($gender == ''){
					$errorGender = "chua chon gioi tinh";
				}
				// if(is_null($_POST['gender'])){
				// 	$gender;
				// }
				// else{
				// 	$gender = $_POST['gender'];
				// }
			}
			else{
				echo "dang ky thanh cong";
			}
		}
		else{
			// echo "chưa submit";
		}
	?>
	<h1>Register From   </h1>
	<form action="#" method="POST">
		<p>  Name <input type="text" name="name" value="<?php echo $name?>"> 
			<span> <?php echo $errorName; ?> </span>
		</p>
		<p>  UserName <input type="text" name="username" value="<?php echo $username?>">
			<span> <?php echo $errorUserName; ?></span>
		</p>
		<p>  Password <input type="password" name="password" value="<?php echo $password?>"> 
			<span> <?php echo $errorPassword; ?> </span>
		</p>
		<p> gender: </span>
			Male  <input type="radio" name="gender" value="male">
			Female <input type="radio" name="gender" value="female">
			 <span> <?php echo $errorGender; ?>
		</p>

		<input type="submit" name="register" value="Register">
	</form>
</body>
</html>