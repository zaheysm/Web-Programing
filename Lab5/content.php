<?php
    date_default_timezone_set("Asia/Amman");
    $tomorrow=strtotime("tomorrow");
    $week=strtotime("next Monday");
	echo "<div id=\"content\">";
	echo "$text1 $text2 </br>" ;
	echo "Today is ". date("m/d/y"). "</br>";
	echo "The current time is ". date("h:i:s a "). "</br>";
	echo "Today is ". date("m/d/y"). "</br>";
	echo "Tomorrow is ". date("m/d/y",$tomorrow). "</br>";
	echo "Next Monday is ". date("m/d/y",$week). "</br>";
	echo "</div>";
?>