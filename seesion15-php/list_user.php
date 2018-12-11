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
					<th class="btn1"> ID  </th>
					<th  class="btn1"> Name  </th>
					<th  class="btn1"> Username  </th>
					<th  class="btn1"> Gender  </th>
					<th  class="btn1"> City  </th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT id, name, username, gender, city From register";
					$result = mysqli_query($conn, $sql);
					if(!$result ){
						die("Không thể thực hiện câu lệnh SQL: " .  mysqli_connect_error($result));
    					exit();
					}
					while ($row = $result->fetch_array()) { ?>
						<tr>
							<td  class="btn1"> <?php echo $row['id']; ?>  </td>
							<td  class="btn1"> <?php echo $row['name']; ?></td>
							<td  class="btn1"> <?php echo $row['username']; ?></td>
							<td  class="btn1"> <?php echo $row['gender']; ?></td>
							<td  class="btn1"> <?php echo $row['city']; ?></td>
							<td  class="btn"> <a href="edit_user.php?id=<?php echo $row['id'];?>" > Edit </a></td>
							<td  class="btn"> <a href="delete_user.php?id=<?php echo $row['id']; ?> " onclick="return confirm('bạn có muốn xóa không?')" >  Delete  </a></td>
						</tr>
					<?php } ?>	
			</tbody>
		</table>
	</div>
</body>
</html>