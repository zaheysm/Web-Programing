<?php

session_start();

if(isset($_POST["firstNameTextBox"]))
{
    $_SESSION["firstName"] = $_POST["firstNameTextBox"];
    header("Location: Session_RetrieveValues.php");
    exit;
}

?>

<html>
	<head>
		<title>Form example</title>
	</head>

	<body>
		<form method="post">
			What is your name? 
			<input type="text" name="firstNameTextBox" value="Put your name here" />
			<input type="submit" />
		</form>
	</body>
</html>
