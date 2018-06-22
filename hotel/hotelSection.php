<?php
	session_start();
	if(!isset($_SESSION['userlog']))
	{
			echo '<script type="text/javascript">
	                    alert("Please Login To continue !");
	                    window.location="../index.php";
	                    </script> ';	
	}
	else
	{

	}

?>

<?php

	//fetch user ip 

	$ip = $_SERVER['REMOTE_ADDR'];
	
	$database = "mithya_labs" ;
	$server = "localhost";
	$username = "root";
	$password = "root";

	$connection = new mysqli($server,$username,$password,$database) ;

	
	if($connection->connect_error)
	{
		echo '<script type="text/javascript">
	                    alert("Error in Connection !");
	                    window.location="index.php";
	                    </script> ' ;
	}

	$sql = "SELECT ip FROM visitor where ip = '$ip' and hotel ='".$_POST['hotelList']."' ";
	$sql_res = $connection->query($sql);

	if ($sql_res->num_rows == 0) 
	{
		$connection->query("INSERT INTO visitor (ip, hotel) VALUES ('$ip' , '".$_POST['hotelList']."' )") ;
	} 
		
	//now get the count

	$sql_res = $connection->query("SELECT ip FROM visitor where  hotel ='".$_POST['hotelList']."' ") ;

	$count = $sql_res->num_rows ;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Hotel Page</title>
	<link rel="stylesheet" type="text/css" href="../css/hotelSection.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">Hotel Booking Portal</a>
	</nav>

	<div class="container-fluid" id="welcome">
		 Hotel : <span><?php  echo $_POST['hotelList'];?></span>
	</div>

	<div id="album">
		<div class="polaroid rotate_right">
		  <img src="../image/img1.jpg" alt="Pulpit rock" width="264" height="213">
		  <p class="caption">The Luxurious Resort with greenry.</p>
		</div>

		<div class="polaroid rotate_left">
		  <img src="../image/img2.jpg" alt="Monterosso al Mare" width="264" height="213">
		  <p class="caption">Pool side part area for people.</p>
		</div>
		<div class="polaroid rotate_right">
		  <img src="../image/img3.jpg" alt="Pulpit rock" width="264" height="213">
		  <p class="caption">Luxurious furnished Interior with wood and leather.</p>
		</div>

		<div class="polaroid rotate_left">
		  <img src="../image/img4.jpg" alt="Monterosso al Mare" width="264" height="213">
		  <p class="caption">Exotic swimming pools and party clubs.</p>
		</div>
	</div>

	<div id="book_hotel">

		<h2>Book Your Room </h2>
		<form class="needs-validation"  action="../payment/secure_pay.php" method="post" novalidate>

			<input type="hidden" name="hname" value="<?php echo $_POST['hotelList']; ?>">
		  <div class="form-row">
		    <div class="col-md-4 mb-3">
		      <label for="validationCustom01">First name</label>
		      <input type="text" class="form-control" id="validationCustom01" name="fname" placeholder="First name" required>
		      <div class="valid-feedback">
		        Looks good!
		      </div>
		    </div>
		    <div class="col-md-4 mb-3">
		      <label for="validationCustom02">Last name</label>
		      <input type="text" class="form-control" id="validationCustom02" name="lname" placeholder="Last name" required>
		      <div class="valid-feedback">
		        Looks good!
		      </div>
		    </div>
		    <div class="col-md-4 mb-3">
		      <label for="validationCustomUsername">Username</label>
		      <div class="input-group">
		        <div class="input-group-prepend">
		          <span class="input-group-text" id="inputGroupPrepend">@</span>
		        </div>
		        <input type="text" class="form-control" id="validationCustomUsername" name="uname" placeholder="Username" aria-describedby="inputGroupPrepend" required>
		        <div class="invalid-feedback">
		          Please choose a username.
		        </div>
		      </div>
		    </div>
		  </div>
		  <div class="form-row">
		    <div class="col-md-6 mb-3">
		      <label for="validationCustom03">City</label>
		      <input type="text" class="form-control" id="validationCustom03" name="city" placeholder="City" required>
		      <div class="invalid-feedback">
		        Please provide a valid city.
		      </div>
		    </div>
		    <div class="col-md-3 mb-3">
		      <label for="validationCustom04">State</label>
		      <input type="text" class="form-control" id="validationCustom04" name="state" placeholder="State" required>
		      <div class="invalid-feedback">
		        Please provide a valid state.
		      </div>
		    </div>
		    <div class="col-md-3 mb-3">
		      <label for="validationCustom05">Zip</label>
		      <input type="text" class="form-control" id="validationCustom05" name="zip" placeholder="Zip" required>
		      <div class="invalid-feedback">
		        Please provide a valid zip.
		      </div>
		    </div>
		  </div>
		 
		  <button class="btn btn-success" id="confirm_dialog" name="confirm_booking" type="submit">Confirm</button></form>
		

		<form action="../intermediate/draft.php" method="post">
			<input type="hidden" name="draft_hotel" value="<?php echo $_POST['hotelList']; ?>">
			<input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
			 <button class="btn btn-danger" id="confirm_dialog" type="submit">Book Later</button>
		</form>
		
		
		
	</div>

	<div id="visitor_count">
		<button type="button" class="btn btn-warning">
		  <span style="color:white; font-weight: 600; font-size: 20px;">Visitors </span> <span class="badge badge-light"><?php echo $count ?></span>
		</button>
	</div>




</body>

<script>
	(function() {
	  'use strict';
	  window.addEventListener('load', function() {
	    // Fetch all the forms we want to apply custom Bootstrap validation styles to
	    var forms = document.getElementsByClassName('needs-validation');
	    // Loop over them and prevent submission
	    var validation = Array.prototype.filter.call(forms, function(form) {
	      form.addEventListener('submit', function(event) {
	        if (form.checkValidity() === false) {
	          event.preventDefault();
	          event.stopPropagation();
	        }
	        form.classList.add('was-validated');
	      }, false);
	    });
	  }, false);
	})();
</script>

<script>
	
	window.onload=function()
	{
		const url = '../hotelList.json';

		$.ajax({
			  type: "POST",
			  url: "../getHotelPrice.php",
			  data: { 
			  		name_hotel: "<?php  echo $_POST['hotelList']; ?>" 
			   }
		}).done(function( msg ) {
		 	
		 	console.log("fetched") ;
		 	 
		});	
	}
</script>


</html>