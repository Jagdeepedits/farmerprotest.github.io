<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmerprotest";
$u_name=$_POST["Name"];
$mail=$_POST["Email"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM registration where Name= '$u_name'";
$result = $conn->query($sql);
$f=0;
if ($result->num_rows > 0) 
{
  // output data of each row

	while($row = $result->fetch_assoc()) 
	{
        
		    if( $row["email"] === $mail )
		    {	
		    	$f=1;
		    	break;	
		    }
	}
	if($f==1)
		header("Location: Newpass.html");
	else
		echo "Wrong Email!!";		
}

else
{
	echo "username not exist";
    header("Location: ./Login.html");
}
$conn->close();
?>