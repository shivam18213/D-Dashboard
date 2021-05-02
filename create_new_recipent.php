<!DOCTYPE html>
<html>
<head>
    <title> Recipent Sign_up </title>
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>
<form action="register_recipent.php" method="post" enctype="multipart/form-data">
<div align="middle" class="container">
<h1> RECIPANT REGISTRATION FORM</h1>
<table width="600" border="5" cellspacing="2" cellpadding="6" padding="50">
  <tr>
    <td>First Name:</td>
    <td> <input type="text" name="fname" required></td>
  </tr>
  <tr>
    <td>Last Name:</td>
    <td><input type="text" name="lname" required></td>
  </tr>
    <td>Occupation</td>
    <td><input type="txt" name="occu" required></td>
  <tr>
    <td>Contact Number:</td>
    <td><input type="text" name="con_number" required></td>
  </tr>
  <tr>
    <td>Use the Text Box , <br>Write LO for "Loan" <br> Write DO for "Donation"</td>
    <td><input type="txt" name="need" required></td>
  </tr>
  <tr>
    <td>Upload Your Adhar</td>
    <td><input type="file" name="fileAdhar" id="fileAdhar" required></td>
  </tr>
  <tr>
    <td>Upload Your Income Proof</td>
    <td><input type="file" name="fileIncome" id="fileIncome" required></td>
  </table>
  <br><br>
  <label for="about"><b>Describe yourself...</label>
<textarea id="about" name="about" rows="10" cols="1">
</textarea>
<td><input button type="submit"></td>
</div>
</form>

</body>
</html>
