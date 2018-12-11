<!DOCTYPE html>
<html>
<head>
	<title>validate</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/validate.css">
</head>
<body>
	<div id="container">
		<?php 
			include('inc/myconnect.php');
			$name = $username = $password = $gender = $city ='';
			$err = $errorName = $errorUserName = $errorPassword =$errorGender = $errorCity= '';
			if(isset($_POST['register'])){
				$name = $_POST['name'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$gender = isset($_POST['gender'])?$_POST['gender']:'';
				$city = isset($_POST['city'])?$_POST['city']:'';
				if(empty($_POST['name'])|| empty($_POST['username'])|| empty($_POST['password'])){
					$err ="xin vui lòng điền đầy đủ thông tin";
					if($name == ''){
						$errorName = 'xin vui lòng nhập name';
					}
					if($username == ''){
						$errorUserName = 'xin vui lòng nhập username';
					}
					if($password == ''){
						$errorPassword = 'xin vui lòng nhập password';
					}
					if($gender == ''){
						$errorGender = " xin vui lòng chọn giới tính";
					}
					if($city == ''){
						$errorCity= " xin vui lòng chọn thành phố";
					}
				}
				else{
					$sql = "INSERT INTO register (name,username,password,gender,city)
					VALUES ('$name','$username','$password', '$gender', '$city')";
					$result = mysqli_query($conn, $sql);
					if($result){
						echo "insert thành công";
					}
					else{
						echo "erro" . $sql. "</br>" . mysqli_error($conn);
					}
					mysqli_close($conn);
					$err = "Đăng ký thành công";
				}
			}

		?>
		<form action="#" method="POST" id="form">
			<h1 id="title-form"> From Register </h1>
			<span id="err"> <?php echo $err; ?> </span>
			<p> Name :
				 <input type="text" name="name"  value="<?php  echo $name ?>" id= "btn1" class="btn" >
				<span class="error">  <?php echo $errorName; ?> </span>
			 </p>
			<p> UserName : 
				<input type="text" name="username"  value="<?php  echo $username ?>" id= "btn2" class="btn">
				<span class="error"> <?php echo $errorUserName; ?> </span>
			</p>
			<p> Password : 
				<input type="password" name="password"  value="<?php  echo $password ?>" id= "btn3" class="btn">  
				<span class="error"> <?php echo $errorPassword; ?> </span>
			</p>

			<p> Gender:
				<input type="radio" name="gender" value="male"  <?php if($gender =='male'){echo "checked";}?>> Male
				<input type="radio" name="gender" value="female" <?php if($gender =='female'){echo "checked";}?>> Female 
				<span class="error1"> <?php echo $errorGender; ?> </span>
			</p>

			<p>City:
				<select name="city">
					<option value="">Choose city</option>
					<option value="DaNang" <?php if($city == 'DaNang') echo "selected";?> > Da Nang</option>
					<option value="HaNoi" <?php if($city == 'HaNoi') echo "selected";?> >Ha Noi</option>
					<option value="HoChiMinh" <?php if($city == 'HoChiMinh') echo "selected";?> >Ho Chi Minh</option>
				</select>
				<span class="error1"><?php echo $errorCity;?></span>
			</p>

			<input type="submit" name="register" value="Register" id="register">
			<a href="list_user.php" id="list_user"> Danh sách thành viên </a>
		</form>
	</div>
</body>
</html>