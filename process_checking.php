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
 <img src="img/plant.png" class="card_image" />
<?php
$uname=$_GET["user_name"];
$user_password=$_GET["passwo"];

function val($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$linkadd1='http://localhost/phpmyadmin/phplessons/iip/updatepass.php';
$linkadd2='http://localhost/phpmyadmin/phplessons/delete.php';
$linkadd3='http://127.0.0.1:5000';
$linkadd4='http://127.0.0.1:4000'; 
$result = $conn->query("select * from users_blog2 where user_name='$uname'and Status='Active'");
$row =  $result->fetch_assoc(); 
if($row['user_name']==$uname && password_verify($user_password,$row['passwo']) ){
echo "";
echo "<a href='".$linkadd1."'>CLICK HERE TO UPDATE PASSWORD</a>";
echo "</br>";

echo "<a href='".$linkadd2."'>CLICK HERE TO VIEW THE LIST OF RECIPENTS</a>";
echo "</br>";
echo "<a href='".$linkadd3."'>CLICK HERE TO CHAT</a>";
echo "</br>";
echo "<a href='".$linkadd4."'>CHECK OUT OUR OTHER PRODUCTS</a>";
}
$conn->close(); 

?>
</body>
</html>

