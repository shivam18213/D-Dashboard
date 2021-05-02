<?php
$server_name="localhost";
$username="root"
$password="Shivam@18213"

$conn= new mysqli("$servername","$username","$password");

if($conn->connect_error){
die ("connection failed"); 
}
else{
echo "connected successfully";
}
?>

