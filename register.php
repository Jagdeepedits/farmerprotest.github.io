<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmerprotest";
$u_name=$_POST["Name"];
$mail=$_POST["Email"];
$phone=$_POST["Phone"];
$pass=$_POST["Password"];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO registration (Name,Email,Phone,Password) VALUES ('$u_name', '$mail', '$phone', '$pass')";

if ($conn->query($sql) === TRUE) {
    header("Location: Login.html");
  }else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>