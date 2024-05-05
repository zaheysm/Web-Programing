<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; 
   charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Book Template</title>

   <link rel="shortcut icon" href="../../assets/ico/favicon.png">   

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_bookTheme/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Bootstrap theme CSS -->
   <link href="bootstrap3_bookTheme/theme.css" rel="stylesheet">


   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="bootstrap3_bookTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/respond.min.js"></script>
   <![endif]-->


</head>

<body>

<?php include 'includes/book-header.inc.php'; ?>
   
<div class="container">
   <div class="row">  <!-- start main content row -->

      <div class="col-md-2">  <!-- start left navigation rail column -->
         <?php include 'includes/book-left-nav.inc.php'; ?>
      </div>  <!-- end left navigation rail --> 

      <div class="col-md-8">  <!-- start main content column -->
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4>My Customers <?php 
           if (isset($_GET['search'])){
               $sortName="lastName";
               if (isset($_SESSION['sortMethod'])){
                   $sortName=$_SESSION['sortMethod'];
               }
               
               
               echo $sortName."=".$_GET['search'];
               echo '<form action="customer-list.php" method="GET">';
               echo '<button type="submit" name="Id=Clear" class="btn-link">Remove Filter</button>';
               echo "</form>";
           }
           if (isset($_GET['Clear'])){
               unset($_GET['search']);
           }
           require "SQLConnection.php";
           if (!isset($_GET['search'])){
               
               $customers=array();
               try {
                   $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                   // set the PDO error mode to exception
                   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   
                   $columns = array('lastName','email','address','city','country');
                   $column = isset($_GET['sorting']) && in_array($_GET['sorting'], $columns) ? $_GET['sorting'] : $columns[0];
                   echo $column;
                  
                   $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
                   $_SESSION['sortMethod']=$column;
                   $_SESSION['sortOrder']=$sort_order;
                   $sqlQuery = "SELECT firstName,lastName,email,address,city,country FROM customers order by $column $sort_order";
                   
                   $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order);
                   $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
                   $add_class = ' class="highlight"';
                   
                   $result = $pdo->query( $sqlQuery );
                   $rowCount = $result->rowCount();
                   if ($rowCount>0){
                       
                       for($i=0; $i<$rowCount; ++$i){
                           $row = $result->fetch();
                           $customers[$i]['firstName']=$row[0];
                           $customers[$i]['lastName']=$row[1];
                           $customers[$i]['email']=$row[2];
                           $customers[$i]['address']=$row[3];
                           $customers[$i]['city']=$row[4];
                           $customers[$i]['country']=$row[5];
                       }
                       
                       
                   }else {
                       echo "*** There are no rows to display from the Person table ***";
                   }
                   
                   $pdo = null;
               }
               
               catch(PDOException $e) {
                   echo "Connection failed:  " . $e->getMessage();
               }
           }
           
           function searchResult($name){
               $customers=null;
               try {
                   require "SQLConnection.php";
                   $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                   // set the PDO error mode to exception
                   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   
                  // $columns = array('lastName','email','address','city','country');
                 //  $column = isset($_GET['sorting']) && in_array($_GET['sorting'], $columns) ? $_GET['sorting'] : $columns[0];
                   
                //   $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
                   if (isset($_SESSION['sortMethod'])){
                       $column=$_SESSION['sortMethod'];
                       $sort_order=$_SESSION['sortOrder'];
                   }else {
                       $column="lastName";
                       $sort_order="ASC";
                   }
                   $sqlQuery = "SELECT firstName,lastName,email,address,city,country FROM Customers Where lastName='".$name."' order by $column $sort_order";
                   
                   $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order);
                   $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
                   $add_class = ' class="highlight"';
                   
                   $result = $pdo->query( $sqlQuery );
                   $rowCount = $result->rowCount();
                   if ($rowCount>0){
                       
                       for($i=0; $i<$rowCount; ++$i)
                       {
                           $row = $result->fetch();
                           
                           
                           
                           $customers[$i]['firstName']=$row[0];
                           $customers[$i]['lastName']=$row[1];
                           $customers[$i]['email']=$row[2];
                           $customers[$i]['address']=$row[3];
                           $customers[$i]['city']=$row[4];
                           $customers[$i]['country']=$row[5];
                           
                       }
                    
                       
                       printtable($customers);
                       
                   }else {
                       echo "*** There are no rows to display from the Person table ***";
                   }
                   
                   $pdo = null;
               }catch(PDOException $e) {
                   echo "Connection failed:  " . $e->getMessage();
               }
           }
           
           
           ?></h4></div>
           <table class="table" id="CustomerTable">
             <tr>
               <th><a href="?sorting=lastName&order=<?php echo $asc_or_desc; ?>" >Name<?php
               if ( $_SESSION['sortOrder']=="DESC" && $_SESSION['sortMethod']=="lastName"){
                       echo '<span class="glyphicon glyphicon-arrow-down"></span>';
               }else if( $_SESSION['sortOrder']=="ASC" && $_SESSION['sortMethod']=="lastName") {
                       echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                   }
                ?>
               </a></th>
               <th><a href="?sorting=email&order=<?php echo $asc_or_desc; ?>">Email
               <?php
               if ( $_SESSION['sortOrder']=="DESC" && $_SESSION['sortMethod']=="email"){
                       echo '<span class="glyphicon glyphicon-arrow-down"></span>';
               }else if( $_SESSION['sortOrder']=="ASC" && $_SESSION['sortMethod']=="email") {
                       echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                   }
                ?>
               
               </a></th>
               <th><a href="?sorting=address&order=<?php echo $asc_or_desc; ?>">Address
               <?php
               if ( $_SESSION['sortOrder']=="DESC" && $_SESSION['sortMethod']=="address"){
                       echo '<span class="glyphicon glyphicon-arrow-down"></span>';
               }else if( $_SESSION['sortOrder']=="ASC" && $_SESSION['sortMethod']=="address") {
                       echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                   }
                ?>
               
               
               </a></th>
               <th><a href="?sorting=city&order=<?php echo $asc_or_desc; ?>">City<?php
               if ( $_SESSION['sortOrder']=="DESC" && $_SESSION['sortMethod']=="city"){
                       echo '<span class="glyphicon glyphicon-arrow-down"></span>';
               }else if($_SESSION['sortOrder']=="ASC" && $_SESSION['sortMethod']=="city") {
                       echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                   }
                ?>
               </a></th>
               <th><a href="?sorting=country&order=<?php echo $asc_or_desc; ?>">Country
               <?php
               if ( $_SESSION['sortOrder']=="DESC" && $_SESSION['sortMethod']=="country"){
                       echo '<span class="glyphicon glyphicon-arrow-down"></span>';
               }else if($_SESSION['sortOrder']=="ASC" && $_SESSION['sortMethod']=="country") {
                       echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                   }
                ?>
               
               </a></th>
             </tr>
			<?php 
			
			if(isset($_GET['search'])){
			    searchResult($_GET['search']);
			    // printtable($customers,$_GET['search']);
			    
			    
			}else {
			    printtable($customers);
			}

			
			function printtable($customers){
			    $tableContent="";
			    foreach ($customers as $row){
			        $tableContent=$tableContent."<tr><th>".$row['firstName'].
			        " ".$row['lastName']."</th>".
			        "<th>".$row['email']."</th>".
			        "<th>".$row['address']."</th>".
			        "<th>".$row['city']."</th>".
			        "<th>".$row['country']."</th></tr>";
			    }
			   
			    echo $tableContent;
		
			}
	

			
			
			
			?>
           </table>
         </div>           
      </div>
      
      <div class="col-md-2">  <!-- start left navigation rail column -->
         <div class="panel panel-info spaceabove">
            <div class="panel-heading"><h4>Categories</h4></div>
               <ul class="nav nav-pills nav-stacked">

               </ul> 
         </div>
         
         <div class="panel panel-info">
            <div class="panel-heading"><h4>Imprints</h4></div>
            <ul class="nav nav-pills nav-stacked">

            </ul>
         </div>         
      </div>  <!-- end left navigation rail --> 


      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
</div>   <!-- end container -->
   


   
   
 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
 <script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>