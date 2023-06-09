<?php 
	
	$db = new mysqli("localhost", "root", "", "restaurant");
	
	if($db->connect_errno) {
		
		echo "Connection failed, please try again!";
		
	}
	
?>