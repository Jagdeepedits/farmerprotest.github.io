<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmerprotest";
$u_name=$_POST["Name"];
$newpass=$_POST["Password"];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE registration SET Password = '$newpass' WHERE Name = '$u_name';";

if ($conn->query($sql) === TRUE) {
  
  header("Location: ./Login.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>