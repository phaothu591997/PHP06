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
				if(empty($name)||empty($description)||empty($price)||empty($status)){
					$err ="xin vui lòng nhập đầy đủ thông tin";
					if(empty($name)){
						$errorName =" Enter your name product ";
					}
					if(empty($description)){
						$errorDescription =" Enter your description product ";
					}
					if(empty($price)){
						$errorPrice =" Enter your price product ";
					}
					if(empty($status)){
						$errorStatus =" Enter your price status ";
					}
				}
				else{
					$sql = "INSERT INTO products (name_product, description_product, price_product, 		img_product,status) VALUES ('$name', '$description',$price,'$imageName', $status)";
					$result = mysqli_query($conn, $sql);
					if($result){

					 $err ="Add thành công";
						echo "<script> window.location = 'list_product.php'; </script>";
					}
					else{
						echo "Add không thành công".$sql. "</br>".mysqli_error($result);
					}
					mysqli_close($conn);
				}
			}
		?>	
<div class="col-md-6">	
	<div class="box box-primary">
	    <div class="box-header with-border">
	        <h3 class="box-title"> ADD PRODUCT : <?php echo $err; ?> </h3>
	    </div>
	    <form role="form" action="" method="POST" enctype="multipart/form-data">
	        <div class="box-body">
	            <div class="form-group">
	                <label for="exampleInputEmail1"> name product : </label>
	                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
	                	value="<?php echo $name; ?>"  >
	                <span class="error"> <?php  echo $errorName; ?>   </span>
	            </div>

	             <div class="form-group">
	                <label for="exampleInputEmail1">  description product :</label>
	                <input type="text"class="form-control" id="exampleInputEmail1" name="description" 
	                	 	value="<?php echo $description; ?>"
	                <span class="error">  <?php  echo $errorDescription; ?> </span>
	            </div>

	            <div class="form-group">
	                <label for="exampleInputEmail1"> price product :</label>
	                <input type="text"class="form-control" id="exampleInputEmail" name="price"
	                	 value="<?php echo $price; ?>">
	                <span class="error">  <?php  echo $errorPrice; ?> </span>
	            </div>

	           	<div class="form-group">
	                <label for="exampleInputFile"> image product:</label>
	                <input type="file" id="exampleInputFile" name="image">
	                 <span class="error"> <?php  echo $errorImage;?>   </span>
	           </div>
	          	<div class="form-group">
	            	
	            	<label for="exampleInputFile">Status:</label>
						<input type="radio" name="status" value="1" <?php if($status == '0'){ echo 'checked';} ?>> Yes
						<input type="radio" name="status" value="2" <?php if($status == '1'){ echo 'checked';} ?>> No 
						<span class="error"> <?php  echo $errorStatus;?>   </span>
	            </div>
	        </div>
	         <!-- /.box-body -->
	        <div class="box-footer">
	            <button type="submit" class="btn btn-primary" name="add_product" value="Add product">
	            	 Add product
	            </button>
	        </div>
	     </form>
	</div>		
</div>