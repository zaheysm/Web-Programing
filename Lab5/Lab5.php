<html>
	<head>
		<title>Include Example</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css" />
		<div>
		<?php 
		  include_once "header.php";
		  include_once "Menu.php";
		?>
		</div>
	</head>
	<body>
	
		<?php
    		$firstName="";
    		$middleName="";
    		$lastName="";
    		$studentNumber="";
    		$email="";
    		$text1="Hello World!!";
    		$text2="This is the first time I am using PHP!!";
			date_default_timezone_set("America/Toronto");
			$tomorrow=strtotime("tomorrow");
			$week=strtotime("next Monday");
			echo "<div id=\"content\">";
			echo "$text1 $text2 </br>" ;
			echo "Today is ". date("m/d/y"). "</br>";
			echo "The current time is ". date("h:i:s a "). "</br>";
			echo "Today is ". date("m/d/y"). "</br>";
			echo "Tomorrow is ". date("m/d/y",$tomorrow). "</br>";
			echo "Next Monday is ". date("m/d/y",$week). "</br>";
			echo "</div>";
			
		?>
		
		<div>
		<?php 
		include_once "footer.php";
		?>
		</div>
	</body>
</html>