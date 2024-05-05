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
        $bottle="bottle";
        $endLine="There are no more bottles of beer.";
        echo "<div id=\"content\">";
            $i=99;
            for($i; $i >0; $i--){
                if ($i>2){
                    $bottle="bottles";
                }elseif ($i==1 || $i-1==1){
                    $bottle="bottle";
                }
                echo "$i $bottle of beer on the wall...</br>";
                echo "You take one down you pass it around ... </br>";
                $result=$i-1;
                echo "$result $bottle of beer on the wall...</br></br>";
                if ($i == 1){
                    echo "$endLine";
                }
            }
        echo "</div>";
        
        ?>

		

		<?php 
		include_once "footer.php";
		?>
	</body>
</html>