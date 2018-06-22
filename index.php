<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hotel Booking/Recommendation Platform</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="javascript:void(0)">Hotel Booking Portal</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">

	     <!-- <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	    -->
	    
	    </ul>
	  </div>
	</nav>

	

	<div id="myModal" class="myModal">
	  <div class="myModal-content">
	    <div class="myModal-header">
	      <h2>Welcome !</h2>
	    </div>
	    <div class="myModal-body">
	     

			<div class="container">
			  <h2 class="form_title">Please Enter the credentials</h2>
			  <form class="form-horizontal" action="intermediate/validate.php" method="post" enctype="application/x-www-form-urlencoded">
			    <div class="form-group">
			      <label class="control-label col-sm-2" for="email">User Name:</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" id="email" placeholder="Enter Username" name="username" required>
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="control-label col-sm-2" for="pwd">Password:</label>
			      <div class="col-sm-10">          
			        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
			      </div>
			    </div>
			   
			    <div class="form-group">        
			      <div class="col-sm-offset-2 col-sm-10">
			        <button type="submit" class="btn btn-default" name="login">Submit</button>
			      </div>
			    </div>
			  </form>
			</div>


	    </div>
	    <div class="myModal-footer">
	      <h3>Copyright  ©  Hotel Booking Platform</h3>
	    </div>
	  </div>

	</div>

	

</body>
</html>