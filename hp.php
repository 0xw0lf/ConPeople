<?php 
 session_start();
 ?>

<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="hpbg" style="background-color:#95a5a6";>

<center>	
<div id="main-title">
	<h2>Home Page </h2>
	<h3>Welcome
		<?php 
		echo $_SESSION['username']
		 ?></h3></div></center>

    
    <h3>Search by District</h3>
<form class="search-box" action="hp.php" method="post" enctype="multipart/form-data">
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
    

      </select>
    <input type="submit" value="Search" name="submit">
</form><br>
<center>
<form class="pro-form" action="hp.php" method="post">
  <?php echo '<img class="ava1" src="'.$_SESSION['imglink'].'">'; ?>
  <br>
  <a href="#" class="userpro">User Profile </a>
    <a href="login.php"><br>
  <input name="logout" type="button" id="logout_btn" value="Logout" />
  </a>
</form></center>
 


<?php 

include_once("dbconfig/config.php");

    if (isset($_POST['district']))
    {
        $district = $_POST['district'];
        
        $sql = "SELECT * FROM fileuploadtable WHERE district='$district'";
        
        $result = $con->query($sql);
        
        if ($result->num_rows > 0) {
   ?>

   <h3><br>Results:</h3>

   <?php
            while($row = $result->fetch_assoc()) {
                echo '<table>';
                echo '<tr><td>Profile Pic:</td><td><img src="'.$row["imglink"].'" width="100px" /></td></tr>';
                echo '<tr><td>Username:</td><td>'.$row["username"].'</td></tr>';
                echo '<tr><td>District:</td><td>'.$row["district"].'</td></tr>';
                echo '</table>';
                echo '<hr>';
            }
        }
        else {
           echo "0 results";
        }
    }
    
if(isset($_POST['logout']))
{
 	session_destroy();
 	} 
?>

</body>
</html>