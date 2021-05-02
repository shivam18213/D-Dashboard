<?php
$email=$_GET["email"];
$user_name=$_GET["user_name"];
$passwo=$_GET["passwo"];
$passwo = password_hash($passwo,PASSWORD_BCRYPT);
function val($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$servername = "localhost";
$username = "root";
$password = "Shivam@18213";
$dbname = "blog2";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO users_blog2 (email,user_name,passwo)
VALUES ('$email', '$user_name','$passwo')";

if ($conn->multi_query($sql) === TRUE) {
   $last_id=$conn->insert_id;
   
   $subject="hello";
   $body="creation successful";
   $headers="From: shivam@co";

   if(mail($email,$subject,$body,$headers)){
       echo" success";
   }
    echo "New record created successfully Recorded id is: ".$last_id." ".$user_name;
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close(); 
?>
