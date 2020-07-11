<?php
 require ('dbconfig/config.php');  
?>

<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">

<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imglink").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>


</head>
<body id="regbg" style="background-color:#95a5a6";>
<form class="myform" action="register.php"method="post" enctype="multipart/form-data" >
		<div id="main-box">
		<center>
			<h2>Registration Form</h2>
			<img id="uploadPreview" src="img/ava.png" class="ava"/><br>
			<input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>

		<br>
		<label> Full Name :
			<input name="fullname" type="text" class="inputvalues" placeholder="Enter ur Fullname" required /></label><br>

		<label> UserName :
			<input name="username" type="text" class="inputvalues" placeholder="Enter ur name" required /></label><br>

		<lable>District :</lable>
			<select name="district"  class="inputvalues"/>
			<option>Tirunelveli</option>
			<option>Chennai</option>
			<option>Cuddalore</option>
			<option>Kanchipuram</option>
			<option>Tiruvallur</option>
			<option>Tiruvannamalai</option>
			<option>Vellore</option>
			<option>Viluppuram</option>
			<option>Ariyalur</option>
			<option>Nagapattinam</option>
			<option>Perambalur</option>
			<option>Thanjavur</option>
			<option>Tiruchirappalli</option>
			<option>Karur</option>
			<option>Tiruvarur</option>
			<option>Dharmapuri</option>
			<option>Krishnagiri</option>
			<option>Namakkal</option>
			<option>Salem</option>
			<option>Erode</option>
			<option>Tiruppur</option>
			<option>Coimbatore</option>
			<option>Nilgiris</option>
			<option>Madurai</option>
			<option>Theni</option>
			<option>Dindigul</option>
			<option>Sivagangai</option>
			<option>Virudunagar</option>
			<option>Ramanathapuram</option>
			<option>Thoothukudi</option>
			<option>Kanyakumari</option>
			<option>Pudukkottai</option>
		

			</select><br>
		
		<label> Password : 
			<input  name="password" type="Password" class="inputvalues"  placeholder="Type ur Pass" required /></label><br>
		
		<label>Confirm Password :
				<input name="cpassword" type="password" placeholder="Enter Password"  class="inputvalues" required /></label>
			

			<input name="submit_btn" type="submit" id="signup_btn" value="Sign up" /><br>
		
			</center>
			<a href="login.php"><input type="button" id="back_btn" value="<< Back to login" /></a>

</form>











<?php 
	if(isset($_POST['submit_btn']))
	{	
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$district = $_POST['district'];

	$img_name=$_FILES['imglink']['name'];
	$img_size=$_FILES['imglink']['size'];
	$img_tmp=$_FILES['imglink']['tmp_name'];

	$directory = 'uploads/';
	$target_file = $directory.$img_name;

	if($password==$cpassword)
				{
					
					$query= "select * from fileuploadtable WHERE username='$username'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with the same username
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else if(file_exists($target_file))
					{
						echo '<script type="text/javascript"> alert("Image file already exists.. Try another image file") </script>';
					}
					
					else if($img_size>2097152)
					{
						echo '<script type="text/javascript"> alert("Image file size larger than 2 MB.. Try another image file") </script>';
					}
					
					else
					{
						move_uploaded_file($img_tmp,$target_file); 	
						$query= "insert into fileuploadtable values('','$username','$password','$fullname','$target_file','$district')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';
						}
					}	
					
					
				}
		else
		{
			echo '<script type="text/javascript"> alert("Password Not same")</script>';
		}

		}


	
?>

	
</center>
</div>

</body>
</html>