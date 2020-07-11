<h1>Search by District</h1>
<form action="search.php" method="post" enctype="multipart/form-data">
    district:  <input type="text" name="district" value="" placeholder="" size="20">
    <input type="submit" value="Search" name="submit">
</form>

<?php 

include_once("dbconfig/config.php");

    if (isset($_POST['district']))
    {
        $district = $_POST['district'];
        
        $sql = "SELECT * FROM fileuploadtable WHERE district='$district'";
        
        $result = $con->query($sql);
        
        if ($result->num_rows > 0) {
   ?>

   <h3>Search results:</h3>

   <?php
            while($row = $result->fetch_assoc()) {
                echo '<table>';
                echo '<tr><td>ID:</td><td>'.$row["id"].'</td></tr>';
                echo '<tr><td>Avatar:</td><td><img src="'.$row["imglink"].'" width="100px" /></td></tr>';
                echo '<tr><td>Username:</td><td>'.$row["username"].'</td></tr>';
                echo '<tr><td>District:</td><td>'.$row["district"].'</td></tr>';
                echo '</table>';
                echo '<hr />';
            }
        }
        else {
           echo "0 results";
        }
    }
    

