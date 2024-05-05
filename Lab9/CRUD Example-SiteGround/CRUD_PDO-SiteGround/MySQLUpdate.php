<?php

require "MySQLConnectionInfo.php";

?>

<html>
	<head>
		<title>MySQL Insert</title>
	</head>
	<body>
		<?php 
			include "MySQLMenu.php";
		?>					
		Update the following fields.
		<br />
		<br />
		<form action="MySQLUpdateComplete.php" method="post">
			<input type="hidden" name="updatepersonId" value="<?php echo  $_POST['personId']; ?>" />
			First Name: <input type="text" name="updatefirstName" value="<?php echo  $_POST['firstName']; ?>" />
			<br />
			Last Name: <input type="text" name="updatelastName" value="<?php echo  $_POST['lastName']; ?>" />
			<br />
			<br />
			<input type="submit" value="Update Record" />
		</form>
		<br />
	</body>
</html>