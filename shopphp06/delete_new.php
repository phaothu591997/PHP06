<?php include('inc/myconnect.php'); ?>
<?php 
	$id=$_GET['id'];
	$sql = "DELETE FROM news WHERE id =$id";
	$result = mysqli_query($conn, $sql);
	if($result){
		header('Location: list_new.php');
	}
	else{
		die("xóa không thành công" . "</br>" .$sql. mysqli_connect_error($sql));
		header('Location: list_new.php');
	}


?>