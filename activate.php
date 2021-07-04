<?php
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

if(isset($_GET['token'])){
    $token = $_GET['token'];
    $updatequery= "UPDATE users_blog2 set Status='Active' where Token='$token'";
    $query = mysqli_query($conn,$updatequery);
}

?>

