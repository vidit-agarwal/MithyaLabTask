<?php
	session_start();
	if(!isset($_POST['confirm_btn']))
	{
		echo '<script type="text/javascript">
	                    alert("Not authenticated !");
	                    window.location="../index.php";
	                    </script> ' ; 
	}
	else
	{
		//insert into the db as a confirm booking

		$server = "localhost";
		$user = "root";
		$pass = "root";
		$db = "mithya_labs";

		
		$conn = new mysqli($server, $user, $pass, $db);
		
		if ($conn->connect_error) {
		    echo "Error is there" ;
		} 

		$nn = $_SESSION['fname'].' '.$_SESSION['lname'] ;
		$sql = "INSERT INTO booking (name, hotel, price, status) VALUES ('".$nn."', '".$_SESSION['hname']."', '".$_SESSION['price']."' , 'c')";

		if ($conn->query($sql) === TRUE) {
		    //echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/confirm.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">Hotel Booking Portal</a>
	</nav>

	<div id="transaction_succ">
		<h2>Transaction has been processed successfully !</h2>
		<br>
		<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
			<path d="M0 0h24v24H0z" fill="none"/>
			<path fill="green" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
		</svg>

	
		<h4>You have booked the hotel !</h4>
	
		<a href="../profile/userProfile.php" class="btn btn-default btn-warning">Continue</a>
	</div>






</body>
</html>