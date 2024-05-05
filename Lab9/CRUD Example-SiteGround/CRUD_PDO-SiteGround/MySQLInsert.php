<?php

require "MySQLConnectionInfo.php";

$error = "";

if(!isset($_POST["firstName"]) || !isset($_POST["lastName"]))
{
	$error = "Please enter a first and last name.";
}
else
{
	if($_POST["firstName"] != "" && $_POST["lastName"] != "")
	{		
		try {
			$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
			  // set the PDO error mode to exception
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 echo "Connected successfully" . "</br>";				
				
			$sqlQuery = "INSERT INTO person (FirstName, LastName) VALUES('".$_POST["firstName"]."', '".$_POST["lastName"]."')";
			
			try {
				$result = $pdo->query( $sqlQuery );
				echo "Person Successfully Added". "<br>";
			}
			catch(PDOException $e) {
				  echo "Person Could not be added:  " . $e->getMessage();
			}		
			
			$pdo = null;
			}
		
		catch(PDOException $e) {
				  echo "Connection failed:  " . $e->getMessage();
		}
			
	}
	else	
		$error = "Please enter a first and last name.";	
}

?>

<html>
	<head>
		<title>MySQL Insert</title>
	</head>
	<body>
		<?php 
			include "MySQLMenu.php";
		?>			
		<form action="MySQLInsert.php" method="post">
			First Name: <input type="text" name="firstName" />
			<br />
			Last Name: <input type="text" name="lastName" />
			<br />
			<br />
			<input type="submit" value="Submit to Database" />
		</form>
		<br />
		<br />
		<?php 
			echo $error;
		?>		
	</body>
</html>

