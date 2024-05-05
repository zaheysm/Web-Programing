<?php
session_start();


if (isset($_POST['FirstName']))  {
    saveInfo();
}

function saveInfo() {
    
    $employees=array();
    $employees['FirstName']=$_POST['FirstName'];
    $employees['LastName']=$_POST['LastName'];
    $employees['email']=$_POST['Email'];
    $employees['phone']=$_POST['Phone'];
    $employees['SIN']=$_POST['SIN'];
    $employees['Password']=$_POST['Password'];
    try {
        require "SqlConnection.php";
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $sqlQuery = "INSERT INTO person (FirstName, LastName,Email,Phone,SIN,Password) VALUES('".$employees['FirstName']."', '".$employees['LastName']."',
                                  '".$employees['email']."','".$employees['phone']."','".$employees['SIN']."','".$employees['Password']."')";
        
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
    

    $_SESSION["employee"]=$employees;
    header("Location: ViewAllEmployees.php");
    exit;
    
    
}


?>
<html>
	<head>
		<title>PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php 
		  include_once "header.php";
		  include_once "Menu.php";
		?>
	</head>
	<body>
	<div id="content">
	
	<form action="CreateAccount.php" method="post" >
	Please fill in all information.<br>
	 First Name: <INPUT TYPE = "Text" NAME= "FirstName" required><br>
	 Last Name: <INPUT TYPE = "Text" NAME= "LastName" required><br>
	 Email Address: <INPUT TYPE = "Text" NAME= "Email" required><br>
	 Phone Number: <INPUT TYPE = "Text" NAME= "Phone" required><br>
	 SIN: <INPUT TYPE = "Text" NAME= "SIN" required><br>
	 Password: <INPUT TYPE = "password" NAME= "Password" required><br>

	 <input type="submit" value="Submit Information">
	 </form>

         
        </div>
			

		<?php 
		include_once "footer.php";
		?>
	</body>
</html>