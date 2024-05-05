<?php

require "MySQLConnectionInfo.php";

$error = "";

if(!isset($_POST['personId']))
{
	$error = "Person could not be deleted.";
}
else
{
	try {
		$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
			  // set the PDO error mode to exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully" . "</br>";
		
		$sqlQuery = "DELETE FROM person WHERE PersonId = ".$_POST['personId'];
		
		try {
			$result = $pdo->query( $sqlQuery );
			echo "Person Successfully Deleted". "<br>";
			}
		catch(PDOException $e) {
			echo "Person Could not be deleted:  " . $e->getMessage();
		}	
		
		$pdo = null;		
	}	
	catch(PDOException $e) {
		echo "Connection failed:  " . $e->getMessage();
	}	

}

?>

<html>
	<head>
		<title>MySQL Insert</title>
	</head>
	<body>
		<?php 
			include "MySQLMenu.php";

			echo $error;
		?>
	</body>
</html>