<html>
	<head>
		<title>Include Example</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css" />
	</head>
	<body>
	
		<?php
    		$firstName="Zahi";
    		$middleName="Sami";
    		$lastName="Masarwa";
    		$studentNumber="040985420";
    		$email="masa0019@algonquinlive.com";
    		$text1="Hello World!!";
    		$text2="This is the first time I am using PHP!!";
			include_once "header.php";
			include_once "content.php";
			include_once "footer.php";
			include_once "Menu.php";
			date_default_timezone_set("Asia/Amman");
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
	</body>
</html>