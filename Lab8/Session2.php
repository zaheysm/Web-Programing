<?php
session_start();

            
if(isset($_SESSION["employee"])){ 
    $employees= $_SESSION["employee"];
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
		        <?php

            
		        if(count($employees)>0){

                    echo "Employee Name: ".$employees['name']."<br>";
                    echo "Employee ID: ".$employees['id']."<br>";
                    echo "Telephone Number: ".$employees['telephone']."<br>";
                    echo "Email Address: ".$employees['email']."<br>";
                    echo "Position: ".$employees['Position']."<br>";
                    echo "It projects :<br>";
                    foreach ($employees['itProjects'] as $project){
                        echo $project."<br>";
                    }
            }else {
                echo "There is no session saved";
            }

            
            
            
        ?>




        </div>
			

		<?php 
		include_once "footer.php";
		?>
	</body>
</html>
