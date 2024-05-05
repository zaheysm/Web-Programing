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
	<?php 
	interface Vehichle {
	    
	    public function displayVehicleInfo();
	}
	
	class LandVehicle implements Vehichle  {
        
	    protected $make;
	    protected $model;
	    protected $year;
	    protected $price;
	    
	    
	    function __construct($make, $model, $year, $price) {
	        $this->make = $make;
	        $this->model = $model;
	        $this->year = $year;
	        $this->price = $price;
	    }
	    
	    public function displayVehicleInfo()
        {
            echo "Make: $this->make, Model: $this->model, Year: $this->year, Price: $this->price,";
	    }
	
    
	   
	}
	
	class Car extends LandVehicle{
	    
	    private $speedLimit;
	    
	    function __construct($make, $model, $year, $price,$speedLimit) {
	        parent::__construct ($make, $model, $year, $price);
	        $this->speedLimit=$speedLimit;
	    }
	    
	    public function displayVehicleInfo()
	    {   
	        parent::displayVehicleInfo();
	        echo "Speed Limit: $this->speedLimit</br>";
	    } 
	    
	    
	}
	
	class WaterVehicle implements Vehichle{
	    protected $make;
	    protected $model;
	    protected $year;
	    protected $price;
	    
	    
	    function __construct($make, $model, $year, $price) {
	        $this->make = $make;
	        $this->model = $model;
	        $this->year = $year;
	        $this->price = $price;
	    }
	    
	    public function displayVehicleInfo()
	    {
	        echo "Make: $this->make, Model: $this->model, Year: $this->year, Price: $this->price,";
	    }
	    
	}
	
	class Boat extends WaterVehicle{
	    private $boatCapacity;
	    
	    function __construct($make, $model, $year, $price,$boatCapacity) {
	        parent::__construct ($make, $model, $year, $price);
	        $this->boatCapacity=$boatCapacity;
	    }
	    
	    public function displayVehicleInfo()
	    {  
	        parent::displayVehicleInfo();
	        echo "Boat Capacity:  $this->boatCapacity </br>";
	    }
	    
	}
	echo "<h3>Car</h3>";
	$car=new Car("Toyota","Camry",1992,2000,180);
	$car->displayVehicleInfo();
	$car=new Car("Mazda","6",2006,5000,220);
	$car->displayVehicleInfo();
	
	echo "<h3>Boat</h3>";
	$boat=new Boat("Mitsubishi","Turbo",1999,20000,18);
	$boat->displayVehicleInfo();
	$boat=new Boat("Hundai","XT",2012,26000,8);
	$boat->displayVehicleInfo();
        ?>

        </div>
			

		<?php 
		include_once "footer.php";
		?>
	</body>
</html>