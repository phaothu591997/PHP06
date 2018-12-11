<!DOCTYPE html>
<html>
<head>
	<title>List_video</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/list_user.css">
</head>
<body>
	<div id="container">
		<?php include ("inc/myconnect.php")?>
		<table>
			<thead>
				<tr>
					<th> ID  </th>
					<th> Name  </th>
					<th> Username  </th>
					<th> Gender  </th>
					<th> City  </th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$sql = "SELECT id,name, username, gender,city FROM register";
					$result = mysqli_query($conn, $sql);
					if(!$result){
						die(" truy vấn k thành công ".mysqli_connect_error($result));
						exit();
					}
					while ($row = $result->fetch_array()) {?>
						<tr>
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['username'];?></td>
							<td><?php echo $row['gender'];?></td>
							<td><?php echo $row['city'];?></td>
						</tr>
				<?php	}?>
				 
			</tbody>
		</table>
	</div>
</body>
</html>