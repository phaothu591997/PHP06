<!DOCTYPE html>
<html>
<head>
	<title>Edit_user</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/validate.css">
</head>
<body>
	<div id="container">
		<?php 
			include('inc/myconnect.php');
				$id=$_GET['id'];
				
				$name = $username = $password = $gender = $city ='';
				$err = $errorName = $errorUserName = $errorPassword =$errorGender = $errorCity= '';
			if(isset($_POST['edit'])){
				$name = $_POST['name'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$gender = isset($_POST['gender'])?$_POST['gender']:'';
				$city = isset($_POST['city'])?$_POST['city']:'';
				if(empty($name)|| empty($username)|| empty($password) || empty($gender) || empty($city)){
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
					$sql ="UPDATE register 
							SET name ='".$name."',
								username = '".$username."',
								password = '".$password."',
								gender = '".$gender."',
								city = '".$city."'
							WHERE id ='".$id."'";
					$result = mysqli_query($conn, $sql);
					 Var_dump($result); exit();
					if($result){
						header('Location:list_user.php');
						$err = "Sửa thông tin thành công";
					}
					else{
						echo "erro" . $sql. "</br>" . mysqli_error($conn);
					}
				}
			}
			$sql_id = "SELECT name,username,password,gender,city FROM register WHERE id = '".$id."'";
				$result_id = mysqli_query($conn,$sql_id);
				if($result_id){
					list($name,$username,$password,$gender,$city)=mysqli_fetch_array($result_id,MYSQLI_NUM);
				}
				else{
					echo"id không đúng".$sql_id."</br>" .mysqli_error($result_id);
				}
		?>
		<form action="#" method="POST" id="form">
			<h1 id="title-form"> From Edit </h1>
			<span id="err"> <?php echo $err; ?> </span>
			<p> Name :
				<input type="text" name="name"  value="<?php if(isset($name)){echo $name;}?>" id= "btn1"
					 class="btn" >
				<span class="error">  <?php echo $errorName; ?> </span>
			 </p>
			<p> UserName : 
				<input type="text" name="username"  value="<?php  echo $username; ?>" id= "btn2" class="btn">
				<span class="error"> <?php echo $errorUserName; ?> </span>
			</p>
			<p> Password : 
				<input type="password" name="password"  value="<?php  echo $password; ?>" id= "btn3" class="btn">  
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
			<input type="submit" name="edit" value="Edit" id="register">
		</form>
	</div>
</body>
</html>