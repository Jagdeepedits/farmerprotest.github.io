<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmerprotest";
$user=$_POST["user_name"];
$pass=$_POST["pass"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM registration where Name= '$user'";
$result = $conn->query($sql);
$f=0;
if ($result->num_rows > 0) 
{
  // output data of each row

	while($row = $result->fetch_assoc()) 
	{
 
		if( $row["Password"] === $pass )
		{	
			$f=1;
			break;	
		}
	}
	if($f==1)
		header("Location: ./Final.html");
	else
		echo "password no matched";		
}

else
{
	echo "username not exist";
    header("Location: ./Regis.html");
}
$conn->close();
?>