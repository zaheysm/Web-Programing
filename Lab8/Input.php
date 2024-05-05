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
	<form action="Input.php" method="post" >
	 Employee Name: <INPUT TYPE = "Text" NAME= "EmployeeName"><br>
	 Employee Id: <INPUT TYPE = "Text" NAME= "EmployeeID"><br>
	 Telephone Number: <INPUT TYPE = "Text" NAME= "TelephoneNumber"><br>
	 Email Address: <INPUT TYPE = "Text" NAME= "Email"><br>
	 Position:
	 <input TYPE="radio" id="Manager" name="Position" Value="Manager">
	 <label for="Manager">Manager</label>
	 <input TYPE="radio" id="TeamLead" name="Position" Value="Team Lead">
	 <label for="TeamLead">Team Lead</label>
	 <input TYPE="radio" id="ITDeveloper" name="Position" Value="IT Developer">
	 <label for="ITDeveloper">IT Developer</label>
	 <input TYPE="radio" id="ITAnalyst" name="Position" Value="IT Analyst">
	 <label for="ITAnalyst">IT Analyst</label><br>
	 
	 It Projects:<br> 	 
	 <select name = 'ItProjects[]' multiple> 
                <option value = 'ProjectA'>ProjectA</option>
                <option value = 'ProjectB'>ProjectB</option>
                <option value = 'ProjectC'>ProjectC</option>
                <option value = 'ProjectD'>ProjectD</option>
            </select>
	 <br>

	 <input type="submit" value="Submit Information">
	 </form>
	 </div>
	
	<div id="content2">
	<?php 
        
	if ($_POST){
	    displayInfo();
	}
	
	function displayInfo() {
	    echo "Employee Name: ".$_POST['EmployeeName']."<br>";
	    echo "Employee ID: ".$_POST['EmployeeID']."<br>";
	    echo "Telephone Number: ".$_POST['TelephoneNumber']."<br>";
	    echo "Email Address: ".$_POST['Email']."<br>";
	    echo "Position: ".$_POST['Position']."<br>";
	    echo "Project: ";
	    foreach ($_POST['ItProjects'] as $project){
	        echo $project."<br>";
	    }
	  
	    
	    }
	    
	
        ?>
        </div>
         
        </div>
			

		<?php 
		include_once "footer.php";
		?>
	</body>
</html>