<!DOCTYPE html>
<html>
<head>
    <title> CREATING NEW DONAR </title>
</head>
<style>
    </style>
<body>    
<?php
$email=$_GET["email"];
$user_name=$_GET["user_name"];
$passwo=$_GET["passwo"];
$passwo = password_hash($passwo,PASSWORD_BCRYPT);


$token = bin2hex(random_bytes(15)); 

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

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} echo "<p style='color:red;'>" . $ip['countryName'] . "</p>";

$emailquery= "SELECT * FROM users_blog2 WHERE email='$email' ";
$mysqli_result= $conn->query($emailquery);

$emailcount= mysqli_num_rows($mysqli_result);
if($emailcount > 0){
    echo "<p stryle= 'color:red;'> email already exists reload and try again </p>";
    $conn->close();
}



$sql = "INSERT INTO users_blog2 (email,user_name,passwo,Token,Status)
VALUES ('$email', '$user_name','$passwo','$token','Inactive')";

if ($conn->multi_query($sql) === TRUE) {
   $last_id=$conn->insert_id;
   
   $to_email = $email;
   $subject="hello";
   $body="creation successful.$user_name.click to confirm http://localhost/phpmyadmin/phplessons/iip/activate.php?token=$token";
   $headers="From: shivam@co";

   if(mail($to_email,$subject,$body,$headers)){
       $_SESSION['msg'] = "check mail";
       header('location: login_donar.php');
       echo" success";
   }
    echo "New record created successfully Recorded id is: ".$last_id." ".$user_name;
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close(); 
?>

</body>
</html>
