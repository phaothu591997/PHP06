 <div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <?php 
        include('inc/myconnect.php');
        $err = $errorTitle = $errorDescription = $errorInformation = $errorImage = '';
        $title = $description = $information = $image = '';
        if(isset($_POST['add_new'])){
          $title = $_POST['title'];
          $image       = $_FILES['image'];
          $description = $_POST['description'];
          $information = $_POST['information'];
          $imageName   = uniqid().'_'.$image['name'];
          $targetUpload = 'uploads/'.$imageName;
          move_uploaded_file($image['tmp_name'], $targetUpload);
          if(empty($title)|| empty($description) || empty($information) || empty($image)){
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
            $sql = "INSERT INTO news (title,image,description,information) 
                    VALUES ('$title','$imageName','$description','$information')";
            $result = mysqli_query($conn, $sql);
            if($result){
               echo "<script> window.location = 'list_new.php'; </script>";
               // header('Location: list_new.php');
            }
            else{
              echo "k thanh công" .$sql. "</br>" . mysqli_error($conn);
            } 
            mysqli_close($conn);       
          }
        }
      ?>
      <div class="x_title">
        <h2> ADD News: <span class="error"> <?php echo $err; ?> </span> </h2>
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
            <button type="submit" class="btn btn-primary" name="add_new" value="Add News">
                 Add News
            </button>
          </div>
       </form>
      </div>
    </div>
  </div>
</div>