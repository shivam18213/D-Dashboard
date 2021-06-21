
<?php
$target_dir = "uploads/";
$target_file1 = $target_dir . basename($_FILES["fileAdhar"]["name"]);
$target_file2 = $target_dir . basename($_FILES["fileIncome"]["name"]);
$uploadOk = 1;
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

/*if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
} */

if (file_exists($target_file1) && file_exists($target_file2)) {
  echo "Sorry, File Already Exists , Please rename the File ";
  $uploadOk = 0;
}

/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType !="pdf" ) {
  echo "Sorry, only JPG, JPEG, PNG, GIF & PDF  files are allowed.";
  $uploadOk = 0;
} */

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileAdhar"]["tmp_name"], $target_file1) && move_uploaded_file($_FILES["fileIncome"]["tmp_name"], $target_file2)) {
    echo "The file ". htmlspecialchars(basename( $_FILES["fileAdhar"]["name"]))."And ".htmlspecialchars(basename( $_FILES["fileIncome"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

function val($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if($uploadOk == 1){
  $fname = val($_POST["fname"]);  
  $lname = val($_POST["lname"]);  
  $occu= val($_POST["occu"]);
  $need=val($_POST["need"]);
  $con_number=val($_POST["con_number"]);
  $about=val($_POST["about"]);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regestration";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO users (firstname, lastname,contactNumber,occupation,need,Adhar,Income,About)
VALUES ('$fname', '$lname','$con_number','$occu','$need','$target_file1','$target_file2','$about')";
/*if ($conn->multi_query($sql) === TRUE) {
   $last_id=$conn->insert_id;
    echo "New record created successfully Recorded id is: ".$last_id;
    // the message
    $msg = "First line of text\nSecond line of text";
    
    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);
    
    // send email
    mail("shivamvitcc23@gmail.com","My subject",$msg);




  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/
$conn->close(); 
}
?>
