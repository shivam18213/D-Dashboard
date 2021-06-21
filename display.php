<html>
<style>
.card_image{
  height:600px;
  width:800px;
  float:left;
  margin-left:40px;
}
.container_main{
  align-items:center;
}
.container_right{
  text-align: center;
}
body{
  background-color:rgb(222, 226, 227);
}
tr.odd{
  background-color: #efefef;
}
tr:hover{
  background-color: #c3e6e5;
}

</style>
<body>
 <img src="plant.png" class="card_image" />
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regestration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sql = "SELECT firstname, lastname,contactNumber, occupation , need, About  FROM users";
$result = $conn->query($sql);

?>

<table width="500" border="5" cellspacing="5" cellpadding="2" align ="center">
	
        <?php
        if(mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			
	?>		
	  <tr>
		<td>First Name</td>
		<td><?php echo $row["firstname"]; ?></td>
		
	  </tr>
	  <tr>
		<td>Last Name</td>
		<td><?php echo $row["lastname"]; ?></td>
		
	  </tr>
	  <tr>
		<td>Contact Number</td>
		<td><?php echo $row["contactNumber"]; ?></td>
		
	  </tr>
	  <tr>
		<td>OCCUPATION</td>
		<td><?php echo $row["occupation"]; ?></td>

	  </tr>
	   <tr>
		<td>NEED TYPE</td>
		<td><?php echo $row["need"]; ?></td>
	  </tr>
	  </tr> 
	   <tr>
		<td>About</td>
		<td><?php echo $row["About"]; ?></td>
		<tr>
		<td>Adhar</td>  
		<td><?php echo '<img src="data:iip/uploads;base64,'.base64_decode($row["Adhar"]).'" alt="Image;">';?> </td>
	  </tr>
	<?php	
		} 
	?>
		</table>	
<?php	
        } else {       
                       echo "0 results";
        }
      
	 

	
$conn->close();
?>

