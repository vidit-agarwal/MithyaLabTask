<?php

	$server = "localhost";
		$user = "root";
		$pass = "root";
		$db = "mithya_labs";

		
		$conn = new mysqli($server, $user, $pass, $db);
		
		if ($conn->connect_error) {
		    echo "Error is there" ;
		} 

		$nn = $_POST['username'] ;
		$hn = $_POST['draft_hotel'] ;
		$sql = "INSERT INTO booking (name, hotel, price, status) VALUES ('".$nn."', '".$hn."', '-' , 'p')";

		if ($conn->query($sql) === TRUE) {
		    //echo "New record created successfully";
		    header('location:../profile/userProfile.php');
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	

?>