<?php include('admin/header.php') ?>
<?php  include('admin/sidebar.php') ?>
<?php  include('admin/menu.php') ?>
	<div class="row">
   		<div class="col-md-12 col-sm-12 col-xs-12">
   			<?php include('inc/myconnect.php') ?>
   			<table>
   				<thead>
   					<tr>
   						<th> ID </th>
   						<th> Title </th>
   						<th> Description </th>
   						<th> Image </th>
   						<th> Information </th>
   						<th> Edit </th>
   						<th> Dlete </th>
   					</tr>
   				</thead>
   				<tbody>
   				<?php 
   					$sql = "SELECT id, title, description, image, information FROM news";
   					$result = mysqli_query($conn, $sql);
   					if(!$result){
   						die("không thể thực select" .mysqli_connect_error(sql));
   						exit();
   					}
   					while ($row =  $result->fetch_array()){?>
   					<tr>
   						<td> <?php echo $row['id']; ?> </td>
   						<td> <?php echo $row['title']; ?> </td>
   						<td> <?php echo $row['description']; ?> </td>
   						<td> <img src="<?php echo 'uploads/'.$row['image']; ?>"></td>
   						<td> <?php echo $row['information']; ?> </td>
   						<td> <a href="edit_new.php?id=<?php echo $row['id']; ?>" 
   							class="button-new"> Edit </a></td>
   						<td> <a href="delete_new.php?id=<?php echo $row['id'];?>"
   							 onclick="return confirm('Bạn có muốn xóa không?')"class="button-new">	Delete</a></td>
   					</tr>
   				<?php } ?>	
   				</tbody>
   			</table>
   		</div>
   	</div>		
<?php include('admin/footer.php') ?>