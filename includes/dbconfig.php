<?php 
		//create connection
		
	$servername = "localhost";
	$username = "root";
	$password = "";
	
		
		$db = mysqli_connect($servername, $username, $password, "hms");
		//check connection
		if($db->connect_error){
			echo "Connection failed!". $db->connect_error;
		}

?>