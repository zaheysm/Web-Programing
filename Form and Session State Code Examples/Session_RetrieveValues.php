<?php
session_start();

if(isset($_SESSION["firstName"]))
{
    echo "Your first name is ".$_SESSION["firstName"];
}

?>
<html>
	<head>
		<title>Form example</title>
	</head>
	<body>
		
	</body>
</html>