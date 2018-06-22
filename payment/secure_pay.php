<?php
	
	session_start();
	if(!isset($_POST['confirm_booking']))
	{
		echo '<script type="text/javascript">
	                    alert("Error in Connection !");
	                    window.location="../index.php";
	                    </script> ' ;
	}
	else
	{

			//get the variable

			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$uname = $_POST['uname'] ;

			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'] ;
			$hname = $_POST['hname'] ;

			$_SESSION['fname']= $fname ;
			$_SESSION['hname']= $hname ;
			$_SESSION['lname']= $lname ;
			$_SESSION['uname']= $uname ;
			$_SESSION['city']= $city ;
			$_SESSION['state']= $state ;
			$_SESSION['zip']= $zip;


		



	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Secure Pay</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/payment.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">Hotel Booking Portal</a>
	</nav>

	<div class="container-fluid" id="welcome">
		 Pay Securely
	</div>

	<div id="wallet">
		<h2>Use My Wallet</h2>

		<div id="wallet_wrapper">
			
			<div id="wallet_wrapper_left">
				
				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
				    <path d="M0 0h24v24H0z" fill="none"/>
				    <path fill="#3d3d3d" d="M21 18v1c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2V5c0-1.1.89-2 2-2h14c1.1 0 2 .9 2 2v1h-9c-1.11 0-2 .9-2 2v8c0 1.1.89 2 2 2h9zm-9-2h10V8H12v8zm4-2.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
				</svg> <span> MYDIGITALWALLET</span>
			</div>
			
			<div id="wallet_wrapper_right">
				
				<span><strong>Wallet Id : </strong>1190AFDZ965</span>
				<br>
				<span><strong>Balance :</strong> $ 2345</span>

				<form action="../intermediate/confirm.php" method="post"><button type="submit" name ="confirm_btn" class="btn btn-default btn-info" area-pressed="true" style="float: right; position: relative; top: -40px;">Pay</button></form>
			</div>
		</div>

	</div>

	<div id="other_payment">
		<h2>Payment Options</h2>

		<div id="coming_soon">
			Coming Soon ..
		</div>
	</div>



</body>
</html>