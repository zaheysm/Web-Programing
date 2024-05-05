<html>
	<head>
		<title>Logical and Conditional Example</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css" />
		<?php 
		  include_once "header.php";
		  include_once "Menu.php";
		?>
	</head>
	<body>
		
        <?php
        echo "<div id=\"content\">";
            $i=99;
            for($i; $i >0; $i--){
                if ($i==1){
                    echo "$i bottle of beer can serve ONLY ONE guest";
                }else if ($i%2== 0){
                    echo "$i bottles of beer can serve even number of guests</br>";
                }else {
                    echo "$i bottles of beer can serve odd number of guests </br>";
                }
            }
        echo "</div>";
        
        ?>

		

		<?php 
		include_once "footer.php";
		?>
	</body>
</html>