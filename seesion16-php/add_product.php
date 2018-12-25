<!DOCTYPE html>
<html>
<head>
	<title>add_product</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/add_product.css">
</head>
<body>
	<div class="container">
		<?php 
			include('inc/myconnect.php');
			$name = $description = $price = $image = $status = '';
			$err = $errorName = $errorDescription = $errorPrice = $errorImage = $errorStatus = '';
			if(isset($_POST['add_product'])){
				$name        = $_POST['name'];
				$description = $_POST['description'];
				$price       = $_POST['price'];
				$image       = $_FILES['image'];
				$status      = $_POST['status'];
				$imageName   = uniqid().'_'.$image['name'];
				$targetUpload = 'uploads/'.$imageName;
				move_uploaded_file($image['tmp_name'], $targetUpload);
				if(empty($name) || empty($description) || empty($price) || empty($status)){
					$err = " xin vui lòng nhập đầy đủ thông tin";
					if(empty($name)){
						$errorName = "please enter your name product";
					}
					if(empty($description)){
						$errorDescription = "please enter your description";
					}
					if(empty($price)){
						$errorPrice = "please enter your price product";
					}
					if(empty($image)){
						$errorImage = "please enter your image product";
					}
					if(empty($status)){
						$errorStatus = "please enter your status product";
					}
				}
				else{
					$sql = "INSERT INTO products (name_product, description_product, price_product, img_product, status)
							VALUES ('$name','$description',$price,'$imageName' ,$status)";	
					$result = mysqli_query($conn, $sql);	
					if($result){
						header("Location:list_product.php");
					}
					else{
						echo "erro" . $sql. "</br>" . mysqli_error($conn);
					}
					mysqli_close($conn);
				}
			}		
		?>
		<form action="" method="POST" enctype="multipart/form-data">
			<h1>Add Product: <span class="err"> <?php  echo $err; ?> </span> </h1>
			<p> product name:
				<input type="text" name="name" value="<?php echo $name; ?>">
				<span class="error"> <?php  echo $errorName; ?>   </span>
			</p>
			<p> product  description:
				<textarea name="description" cols="30" rows="10"><?php echo $description; ?></textarea>
				<span class="error">  <?php  echo $errorDescription; ?> </span>
			</p>
			<p> product price:
				<input type="text" name="price" value="<?php echo $price; ?>">
				<span class="error"> <?php  echo $errorPrice; ?>   </span>
			</p>
			<p>Product image: 
				<input type="file" name="image">
				<span class="error"> <?php  echo $errorImage;?>   </span>
			</p>

			<p>Status:
				<input type="radio" name="status" value="1" checked> Yes
				<input type="radio" name="status" value="0" <?php if($status == '0'){ echo 'checked';} ?>> 
			</p>
			<p>
				<input type="submit" name="add_product" value="Add product">
			</p>
		</form>
	</div>
</body>
</html>