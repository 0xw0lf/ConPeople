<?php 
session_start();
require_once ('dbconfig/config.php');  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body id ="login-bg" style="background-color:#95a5a6";>

<div id="main-box">
<center>	

	<h2>Login form </h2>
	<img src ="img/ava.png" class="ava"/>

	<form action="login.php" method="post">
		<label color="#574b90"><b>UserName:</b></label>
			<input name ="username" type="text" class="inputvalues" placeholder="Type ur name"><br>
		<label><b>Password:</b></label>
			<input name="password" type="Password" class="inputvalues" placeholder="Type ur Pass"><br>
			

			<input name="login" type="Submit" id="login_btn" value="Login">
			<a href="register.php"><input type="button" id="reg_btn" value="Register"></a>
	</form></center></div>


	<?php 
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];

			$query="select * from fileuploadtable WHERE username='$username' AND password='$password' ";
			
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{			
				$row = mysqli_fetch_assoc($query_run);

				$_SESSION['username'] = $row['username'];
				$_SESSION['imglink'] = $row['imglink'];
				
				header('Location:hp.php');
			}
			else
			{
				echo '<script type="text/javascript"> alert("Not Registered")</script>';
			}
		}
	
	 ?>
		


</body>
</html>