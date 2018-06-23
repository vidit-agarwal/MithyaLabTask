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
<!DOCTYPE html>
<html>
<head>
	<title>Welcome page</title>
	<link rel="stylesheet" type="text/css" href="../css/profile.css">
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
		Welcome : <span><?php  echo $_SESSION['username'];?></span>

		<a href="../logout.php"><span id="logout">Logout</span></a>
	</div>

	<div style="width:100%; height: auto;">
		<div id="doBook">
			<h2 id="title_confirm">Your Confirm Bookings</h2>
			<div>
				
				<?php

					$server = "localhost";
					$un = "root";
					$pwd = "root";
					$db = "mithya_labs";

					
					$connect = new mysqli($server, $un, $pwd, $db);
					// Check connection
					if ($connect->connect_error) {
					    die("Connection failed: " . $connect->connect_error);
					} 

					$sql = "SELECT * FROM booking WHERE status = 'c' ";
					$result = $connect->query($sql);

					if ($result->num_rows > 0) {
					   
					    while($row = $result->fetch_assoc()) {
					        echo '
					        		<div id="bookingContent">
					
										<div id="bookingContent_left">
											<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24">
											    <path d="M0 0h24v24H0z" fill="none"/>
											    <path fill="grey" d="M20 6h-3V4c0-1.11-.89-2-2-2H9c-1.11 0-2 .89-2 2v2H4c-1.11 0-2 .89-2 2v11c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zM9 4h6v2H9V4zm11 15H4v-2h16v2zm0-5H4V8h3v2h2V8h6v2h2V8h3v6z"/>
											</svg>
										</div>

										<div id="bookingContent_right">
											
											<div style="display: inline;">
												<span style="float: left;"><strong>Name :&nbsp;</strong></span> '; echo $row['name'] ;
											echo '</div>
											
											<div>
												<span style="float: left;"><strong>Hotel :&nbsp;</strong></span>'; echo $row['hotel'] ;
											echo '</div>

											<div>
												<span style="float: left;"><strong>Price :&nbsp;</strong></span>'; echo $row['price'] ;
											echo '</div>

										</div>

										<div id="bookingRight">
											<svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 24 24">
												<path d="M0 0h24v24H0z" fill="none"/>
												<path fill="green" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
											</svg>
											<span class="suc_tip">Booking is Successful!</span>
										</div>
									</div>
					        ';
					    }
					} else {
					    echo "<div style='font-weight:500; text-align:center; margin-top:10px;' >No Bookings Found !</div>";
					}
					$connect->close();

				
				?>

			</div>
		</div>

		<div id="doBook">
			<h2 id="title_draft">Your Draft Bookings</h2>
			<div>
				
				<?php

					$server = "localhost";
					$un = "root";
					$pwd = "root";
					$db = "mithya_labs";

					
					$connect = new mysqli($server, $un, $pwd, $db);
					// Check connection
					if ($connect->connect_error) {
					    die("Connection failed: " . $connect->connect_error);
					} 

					$sql = "SELECT * FROM booking WHERE status = 'p' ";
					$result = $connect->query($sql);

					if ($result->num_rows > 0) {
					   
					    while($row = $result->fetch_assoc()) {
					        echo '
					        		<div id="bookingContent">
					
										<div id="bookingContent_left">
											<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24">
											    <path fill="grey" d="M11.5 2C6.81 2 3 5.81 3 10.5S6.81 19 11.5 19h.5v3c4.86-2.34 8-7 8-11.5C20 5.81 16.19 2 11.5 2zm1 14.5h-2v-2h2v2zm0-3.5h-2c0-3.25 3-3 3-5 0-1.1-.9-2-2-2s-2 .9-2 2h-2c0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.5-3 2.75-3 5z"/>
											    <path fill="none" d="M0 0h24v24H0z"/>
											</svg>
										</div>

										<div id="bookingContent_right">
											
											<div style="display: inline;">
												<span style="float: left;"><strong>Name :&nbsp;</strong></span> '; echo $row['name'] ;
											echo '</div>
											
											<div>
												<span style="float: left;"><strong>Hotel :&nbsp;</strong></span>'; echo $row['hotel'] ;
											echo '</div>

											<div>
												<span style="float: left;"><strong>Price :&nbsp;</strong></span>'; echo 'not paid' ;
											echo '</div>

										</div>

										<div id="bookingRight">
											<svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 24 24">
												<path d="M0 0h24v24H0z" fill="none"/>
												<path fill="orange" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
											</svg>
											<span class="suc_tip">Booking is Pending!</span>
										</div>
									</div>
					        ';
					    }
					} else {
					    echo "<div style='font-weight:500; text-align:center; margin-top:10px;' >No Bookings Found !</div>";
					}
					$connect->close();

				
				?>
			</div>
		</div>
	</div>


	<div class="container" id="mainWrapper">
		<div class="heading">
			<h2>Want to Book Hotel ?</h2>
		</div>

		<div class="subHeading">
			<h4>Have a look at amazing Deals</h4>
		</div>

		<div id="hotelSelect">
			
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <label class="input-group-text" for="inputGroupSelect01">Hotels</label>
			  </div>

			  <form method="post" action="../hotel/hotelSection.php">
				  <select class="custom-select" id="hotelList" name="hotelList">
				   
				  </select>
			</div>

			
		</div>

		 
		 <div id="wrapperDesc">
				<svg style="fill:#3d3d3d;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
				    <path fill="#3d3d3d" d="M12 5.9c1.16 0 2.1.94 2.1 2.1s-.94 2.1-2.1 2.1S9.9 9.16 9.9 8s.94-2.1 2.1-2.1m0 9c2.97 0 6.1 1.46 6.1 2.1v1.1H5.9V17c0-.64 3.13-2.1 6.1-2.1M12 4C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"/>
				    <path d="M0 0h24v24H0z" fill="none"/>
				</svg><div id="uniq_id"></div>

				<br>


				<svg style="fill:#3d3d3d;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
				    <path fill="#3d3d3d" d="M15 11V5l-3-3-3 3v2H3v14h18V11h-6zm-8 8H5v-2h2v2zm0-4H5v-2h2v2zm0-4H5V9h2v2zm6 8h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V9h2v2zm0-4h-2V5h2v2zm6 12h-2v-2h2v2zm0-4h-2v-2h2v2z"/>
				    <path d="M0 0h24v24H0z" fill="none"/>
				</svg> <div id="location"></div>

				<br>

				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
				    <path d="M0 0h24v24H0z" fill="none"/>
				    <path fill="#3d3d3d" d="M22 3H2C.9 3 0 3.9 0 5v14c0 1.1.9 2 2 2h20c1.1 0 1.99-.9 1.99-2L24 5c0-1.1-.9-2-2-2zM8 6c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm6 12H2v-1c0-2 4-3.1 6-3.1s6 1.1 6 3.1v1zm3.85-4h1.64L21 16l-1.99 1.99c-1.31-.98-2.28-2.38-2.73-3.99-.18-.64-.28-1.31-.28-2s.1-1.36.28-2c.45-1.62 1.42-3.01 2.73-3.99L21 8l-1.51 2h-1.64c-.22.63-.35 1.3-.35 2s.13 1.37.35 2z"/>
				</svg> <div id="phone"></div>

				<br>
				
				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 18 18">
				    <path  fill="#3d3d3d" d="M9 11.3l3.71 2.7-1.42-4.36L15 7h-4.55L9 2.5 7.55 7H3l3.71 2.64L5.29 14z"/>
				    <path fill="none" d="M0 0h18v18H0z"/>
				</svg> <div id="rating"></div>

				<br>

				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
				    <path  fill="#3d3d3d" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z"/>
				    <path fill="none" d="M0 0h24v24H0z"/>
				</svg> <div id="price"></div>

				<br>
				
				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
				    <path d="M0 0h24v24H0z" fill="none"/>
				    <path fill="#3d3d3d" d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/>
				</svg> <div id="rooms"></div>


				 <button type="submit" class="btn btn-default btn-success" area-pressed="true">View Deal</button>
				</form>
				
			
		 </div>

		 
	</div>



	


	
	

</body>
<script>
	function checkout()
	{

		document.getElementById('wrapperDesc').style.display="block";
		var selectedHotel = $("#hotelList option:selected").val();
       // document.getElementById('hotelDesc').innerHTML= selectedHotel;

        $.ajax({
			  type: "POST",
			  url: "../parseJson.php",
			  data: { 
			  		name_hotel: selectedHotel 
			   }
		}).done(function( msg ) {
		 	
		 	 var resultJsonObj = JSON.parse(msg) ;
		 	 console.log(resultJsonObj);
		 	  document.getElementById('uniq_id').innerHTML= resultJsonObj[0];
		 	   document.getElementById('location').innerHTML= resultJsonObj[1];
		 	    document.getElementById('phone').innerHTML= resultJsonObj[2];
		 	     document.getElementById('rating').innerHTML= resultJsonObj[3];
		 	      document.getElementById('price').innerHTML= resultJsonObj[5] + '  / day';
		 	      document.getElementById('rooms').innerHTML= "";
		 	      
		 	      var container ;

		 	      var wrapper = $('#rooms');
		 	      for (var key in resultJsonObj[4])
		 	      {
				    container = $('<div></div>');
				    wrapper.append(container);
				    container.append('<span>' + key +' : </span>');
				    container.append('<span>' + resultJsonObj[4][key] +'</span>');
				    wrapper.append('<br>');
				}
		});	
    }
</script>
<script>
	
	let dropdown = $('#hotelList');

	dropdown.empty();

	dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
	dropdown.prop('selectedIndex', 0);

	const url = '../hotelList.json';

	// Populate dropdown with list of provinces
	$.getJSON(url, function (data) {
		$.each(data, function (key, entry) {
		dropdown.append($('<option></option>').attr('value', entry.name).text(entry.name));
		})
	});

	$( "#hotelList" ).change(function() {
	  checkout();
	});
</script>


</html>