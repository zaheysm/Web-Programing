<?php
session_start();


if (isset($_POST['Email']))  {
    pullInfo();
}

function pullInfo() {
    require "SQLConnection.php";
    $employees=array();
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       
        
        $sqlQuery = "SELECT * FROM person WHERE Email='".$_POST['Email']."' AND Password='".$_POST['Password']."'";        
        $result = $pdo->query( $sqlQuery );
        $rowCount = $result->rowCount();
        if ($rowCount>0){
            $employees=array();
            for($i=0; $i<$rowCount; ++$i)
            {
                $row = $result->fetch();
                $employees['FirstName']=$row[1];
                $employees['LastName']=$row[2];
                $employees['email']=$row[3];
                $employees['phone']=$row[4];
                $employees['SIN']=$row[5];
                $employees['Password']=$row[6];
             }
            $_SESSION["employee"]=$employees;
            header("Location: ViewAllEmployees.php");
            exit;
        }else {
            echo "*** There are no rows to display from the Person table ***";
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
		<title>PHP and MySQL </title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php 
		  include_once "header.php";
		  include_once "Menu.php";
		?>
	</head>
	<body>
	<div id="content">
	
	<form action="Login.php" method="post" >
	 Email Address: <INPUT TYPE = "Text" NAME= "Email" required><br>
	 Password: <INPUT TYPE = "password" NAME= "Password" required><br>

	 <input type="submit" value="Submit Information">
	 </form>

         
        </div>
			

		<?php 
		include_once "footer.php";
		?>
	</body>
</html> 