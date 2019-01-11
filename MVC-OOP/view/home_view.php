<?php 
	while($new = $listNews->fetch_assoc()) {
		echo $new['id'].' ==> '.$new['title']."<br>";
	}

?>