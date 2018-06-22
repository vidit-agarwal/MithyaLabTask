
<?php
	if(isset($_POST['login']))
	{
		 $userlogin = $_POST['username'];
		 $passlogin = $_POST['pwd'] ;
		 if(empty($userlogin) || empty($passlogin))
  			{
                 /*$output = "Please enter all details." ;*/
                 	echo '<script type="text/javascript">
                    alert("Please enter all details !");
                    window.location="../index.php";
                    </script> ';
            }
           else
           {
           		 $mysqli = NEW  MySQLi('localhost', 'root', 'root' , 'mithya_labs') ;
           		  $userlogin=$mysqli->real_escape_string($userlogin);
                  $passlogin=$mysqli->real_escape_string($passlogin);

                  $query=$mysqli->query("SELECT * FROM user_login WHERE username='$userlogin' AND userpassword = '$passlogin' " );

                  //here we can use md5() function for checking hash passwords  , here i am not using encryption but there are functions like md5 , salting , btype , that can encrypt pass 
                  if($query->num_rows==0)
                    {
                        echo '<script type="text/javascript">
                        alert("Invalid Username/Password !");
                        window.location="../index.php";
                        </script> ';
                    }
                   else
                   {
                   		session_start();
                   		while($row = mysqli_fetch_array($query))
                   		{
                   			$_SESSION['userlog'] = $row['sno'] ;
                   			$_SESSION['username'] = $row['username'] ;
                   		
                   		}

                   		header("location: ../profile/userProfile.php");
                   		
                   }
           }
	 } 
	else 
	{
		header("location: ../index.php");
	}
?>