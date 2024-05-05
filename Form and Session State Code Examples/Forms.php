<?php

if(isset($_POST["firstNameTextBox"]))
    $firstName = $_POST["firstNameTextBox"];
    else
        $firstName = "Was not set by the form";
        
        echo <<<_END
        
<html>
	<head>
		<title>Form example</title>
	</head>
	
	<body>
		<form method="post">
			What is your name?
			<input type="text" name="firstNameTextBox" value="Submit" />
			<input type="submit" />
		</form>
		<br />
		The name you entered: $firstName
	</body>
</html>

_END;
        
  ?>
