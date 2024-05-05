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
	<div id="content">
	<form action="Calculator.php" method="GET" >
	<INPUT TYPE = "Text" NAME = "num1">
	<select id="math" name="math">                      
    <option value="+">+</option>
    <option value="-">-</option>
    <option value="*">*</option>
    <option value="/">/</option>
    <option value="exp">exp</option>
    </select>
	<INPUT TYPE = "Text" NAME = "num2">
	<input type="submit" value="=">
	
	<?php 
	function isprime($result) {
	    $index=2;
	    $prime=TRUE;
	    while(($index*$index)<=$result && $prime){
	        if ($result% $index==0){
	            $prime=FALSE;
	        }
	        $index++;
	    }
	    if ($prime) {
	        echo "</br>$result is prime number </br>";
	    }else {
	        echo "</br>$result is not prime number</br>";
	    }
	    
	}
	function evenOdd($result) {
	    if($result%2==0){
	        echo "$result is an even number </br>";
	    }else{
	        echo "$result is an odd number </br>";
	    }
	}
	$result=0;
	if ($_GET){       
        $num1 = $_GET["num1"];
        $num2 = $_GET["num2"];
        switch ($_GET["math"]) {
            case '+':
                $result=$num1+$num2;
                echo "$num1 plus $num2 equals $result</br>";
                isprime($result);
                evenOdd($result);
            break;
            case '-':
                $result=$num1-$num2;
                echo "$num1 minus $num2 equals $result</br>";
                isprime($result);
                evenOdd($result);
                break;
            case '*':
                $result=$num1*$num2;
                echo "$num1 multiply $num2 equals $result</br>";
                isprime($result);
                evenOdd($result);
                break;
            case '/':
                $result=$num1/$num2;
                echo "$num1 devided by $num2 equals $result</br>";
                isprime($result);
                evenOdd($result);
                break;
            case 'exp':
                $result=pow($num1,  $num2 );
                echo "$num1 exponent $num2 equals $result</br>";
                isprime($result);
                evenOdd($result);
                break;
            default:
                echo "choose one of the mathematical operations";
            break;
        }
 
	}
        
  
        
        ?>
        </form>
        </div>
			

		<?php 
		include_once "footer.php";
		?>
	</body>
</html>