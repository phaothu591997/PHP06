<?php include('admin/header.php') ?>
<?php  include('admin/sidebar.php') ?>
<?php  include('admin/menu.php') ?>
	<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
   <div class="x_panel">
    <?php 

        include('inc/myconnect.php');
        $id = $_GET['id'];
        $err = $errorTitle = $errorDescription = $errorInformation = $errorImage = '';
        $title = $description = $information = $image ='';
        if(isset($_POST['edit'])){
        	$title = $_POST['title'];
          	$description = $_POST['description'];
          	$information = $_POST['information'];
          	if (!$_FILES['image']['error']) {
          		$image = $_FILES['image'];
	            $imageName   = uniqid().'_'.$image['name'];
	            $targetUpload = 'uploads/'.$imageName;
	            move_uploaded_file($image['tmp_name'], $targetUpload);
          	}
          	if(empty($title)|| empty($description) || empty($information)){
          		$err = 'please enter full information';
          		if(empty($title)){
              		$errorTitle = "please enter title";
            	}
            	if(empty($description)){
             		$errorDescription = "please enter description";
           		}

           		if(empty($information)){
              		$errorInformation= "please enter information";
           		 }
          	}
          	else{
          		$sql = " UPDATE news
            	SET title = '".$title."',
            		image = 'isset($imageName)?$imageName: " "',
            		description = '".$description."',
            		information = '".$information."'
            		WHERE id =$id";
            	Var_dump($sql); exit();		
            	$result = mysqli_query($conn,$sql);	
            	// Var_dump($result); exit();
          		if($result){
          			echo "<script> window.location = 'list_new.php'; </script>";
              	 // header('Location: list_new.php');
          		}
          		else{
          			echo "Add không thành công".$sql. "</br>".mysqli_error($result);
          		}
          		mysqli_close($conn); 
          	}
        }
        $sql_id = "SELECT title,image,description,information FROM news WHERE id = '".$id."'";
      	$result_id = mysqli_query($conn, $sql_id);
      	if($result_id){
      		list($title,$image,$description,$information) = mysqli_fetch_array($result_id,MYSQLI_NUM);
      	}
      	else{
          echo"id không đúng".$sql_id."</br>" .mysqli_error($result_id);
        }  
    ?>
      <div class="x_title">
        <h2>  Edit : <span class="error"> <?php echo $err; ?> </span> </h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
          </ul>
          <div class="clearfix"></div>
          </div>
          <div class="x_contents">
          <br />
           
          <form role="form" action="" method="POST" enctype="multipart/form-data">
          <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputEmail1"> Title News : </label>
                  <input type="text" name="title" class="form-control" id="exampleInputEmail1"    value="<?php echo $title ?>" >
                  <span class="error"> <?php echo $errorTitle; ?> </span>
              </div>

              <div class="form-group">
                  <label for="exampleInputFile"> Image News:</label>
                  <input type="file" id="exampleInputFile" name="image">
                  <img src="<?php echo 'uploads/'.$image; ?>">
             </div>

               <div class="form-group">
                  <label for="exampleInputEmail1"> Description News :</label>
                  <input type="text"class="form-control" id="exampleInputEmail1"
                     name="description" value="<?php echo $description ?>">
                    <span class="error"> <?php echo $errorDescription; ?> </span>   
              </div>

              <div class="form-group">
                  <label for="exampleInputEmail1">  Information News :</label>
                  <textarea name="information" cols="30" rows="10" class="form-control" id="exampleInputEmail"><?php echo $information; ?></textarea>
                    <span class="error"> <?php echo $errorInformation; ?></span>
              </div>
          </div>
           <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="edit" value="Add News">
                 Edit
            </button>
          </div>
       </form>
      </div>
    </div>
  </div>
</div>
<?php include('admin/footer.php') ?>