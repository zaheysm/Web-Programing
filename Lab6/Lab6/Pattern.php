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
            for($i=0;$i<=10;$i++)
            {
                
                if($i%2!=0 || $i==10){
                    for($j=1;$j<=$i;$j++)
                    {
                        echo "* ";
                    }
                    
                }
                
                echo "<br>";
                if($i==9){
                    echo "<br>";
                }
            }
            echo "<br>";
            for($i=9;$i>=1;$i--)
            {
                
                if($i%2!=0){
                    for($j=1;$j<=$i;$j++)
                    {
                        echo "* ";
                    }
                    
                }
                echo "<br>";
                
               
            }
            
        echo "</div>";
        
        ?>

		

		<?php 
		include_once "footer.php";
		?>

	</body>
</html>