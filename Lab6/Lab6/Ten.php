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
        $bottleTake="You take them down you pass them around ... ";
        $endLine="There are no more bottles of beer.";
        echo "<div id=\"content\">";
            $i=90;
            $bottle="bottles";
            for($i; $i >0; $i=$i-10){
                echo "$i $bottle of beer on the wall...</br>";
                            
                $result=$i-10;
                if ($result==0){
                    $bottle="bottle";
                    echo "$bottleTake </br>";
                }else{
                    echo "$i $bottle of beer......</br>";    
                    echo "You take 10 down you pass it around ... </br>";
                }
                echo "$result $bottle of beer on the wall...</br></br>";
                if ($i==10){
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