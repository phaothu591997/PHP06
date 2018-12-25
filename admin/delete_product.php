<?php include('inc/myconnect.php'); ?>
<?php 
	$id =$_GET['id'];
	$sql = "DELETE FROM products WHERE id =$id";
	$result = mysqli_query($conn, $sql);
	if($result){
		header("Location:list_product.php");
	}
	else{
		die("xóa không thành công".$sql."</br>". mysqli_error($result));
		header("Location:list_user.php");
	}
?>