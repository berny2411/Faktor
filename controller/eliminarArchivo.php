<?php
	
	$file = $_POST['id'];
	if(is_file($file)){
		if(!unlink($file)){
		echo false;
		} else {
			echo true;
		}
	}
	
?>
