<?php
session_start();

if (isset($_SESSION["login"])){
    $employees= $_SESSION["login"];
}elseif(isset($_SESSION["employee"])){
    $employees= $_SESSION["employee"];
}else{
    header("Location: Login.php");
    exit;
}

?>


<html>
	<head>
		<title>Forms and Session State</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php 
		  include_once "header.php";
		  include_once "Menu.php";
		?>
	</head>
	<body>
	<div id="content">
	<div id="content1">
		        <?php		        
		        if(count($employees)>0){

                    echo "First Name: ".$employees['FirstName']."<br>";
                    echo "Last Name: ".$employees['LastName']."<br>";
                    echo "Email Address: ".$employees['email']."<br>";
                    echo "Phone Number: ".$employees['phone']."<br>";
                    echo "SIN: ".$employees['SIN']."<br>";
                    echo "Password: ".$employees['Password']."<br>";
            }else {
                echo "There is no session saved";
            }    
            
        ?>
        </div>
	<div id="content2">
	<?php 
	require "SqlConnection.php";
	try {
	    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
	    // set the PDO error mode to exception
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   
	    
	    $sqlQuery = "SELECT * FROM person";
	    $result = $pdo->query( $sqlQuery );
	    $rowCount = $result->rowCount();
	    $columnCount =$result->columnCount();
	    if ($rowCount>0){
	        echo "<table> <tr>";
	        echo "<th>First Name</th>";
	        echo "<th>Last Name</th>";
	        echo "<th>Email Address</th>";
	        echo "<th>Phone Number</th>";
	        echo "<th>SIN</th>";
	        echo "<th>Password</th></tr>";
	        for($i=0; $i<$rowCount; ++$i)
	        {
	            $row = $result->fetch();
	            for ($j=1;$j<$columnCount;$j++){
	                echo "<th>$row[$j]</th>";
	            }
	                 
	            
	                echo "</tr>";

	        }
	        echo "</table>";
                        
	    }else {
	        echo "*** There are no rows to display from the Person table ***";
	    }
	    
	    $pdo = null;
	}
	
	catch(PDOException $e) {
	    echo "Connection failed:  " . $e->getMessage();
	}
	
	
	
	
	?>
	</div>
  </div>
			
		<?php 
		include_once "footer.php";
		?>

	</body>
</html>
