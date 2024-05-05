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
        echo "<div id=\"random\">";
            $i=0;
            $range1=0;
            $range2=0;
            $range3=0;
            $range4=0;
            $range5=0;
            for($i; $i <500; $i++){
               $randnum=rand(1,50);
               if($randnum>=1 && $randnum<=10){
                   $range1++;
               }elseif ($randnum>=11 && $randnum<=20) {
                   $range2++;
               }elseif ($randnum>=21 && $randnum<=30) {
                   $range3++;
               }elseif ($randnum>=31 && $randnum<=40) {
                   $range4++;
               }else {
                   $range5++;
               }
               
            }
            echo " $range1 numbers are randomly generated in the range between 01 - 10 </br>";
            echo " $range2 numbers are randomly generated in the range between 11 - 20 </br>";
            echo " $range3 numbers are randomly generated in the range between 21 - 30 </br>";
            echo " $range4 numbers are randomly generated in the range between 31 - 40 </br>";
            echo " $range5 numbers are randomly generated in the range between 41 - 50 </br>";
            
            
            
            function printStarPrecent($range,$starcount) {
                echo "$range ";
                $starcount=$starcount/500*100;
                $i=0;
                for($i; $i <$starcount; $i++){
                    echo "*";
                }
                echo "</br>";
            }
            echo "</br>";
            printStarPrecent("01-10",$range1);
            printStarPrecent("11-20",$range2);
            printStarPrecent("21-30",$range3);
            printStarPrecent("31-40",$range4);
            printStarPrecent("41-50",$range5);
            
        echo "</div>";
        
        ?>

		

		<?php 
		include_once "footer.php";
		?>

	</body>
</html>