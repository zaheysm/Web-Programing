<?php 
    session_start();
    if (isset($_GET['BookId'])){
        $_SESSION["bookID"]=$_GET['BookId'];
        header("Location: book-details.php");
        exit;
        
    
    }

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

      <div class="col-md-6">  <!-- start main content column -->
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">                   
           <div class="panel-heading"><h4><?php echo "Catalog ";
           if (isset($_GET['categories'])){
               echo $_GET['type']."=".$_GET['categories'];
               echo '<form action="book-list.php" method="GET">';
               echo '<button type="submit" name="Id=Clear" class="btn-link">Remove Filter</button>';
               echo "</form>";
           }
           if (isset($_GET['Clear'])){
               unset($_GET['categories']);
           }
           
           ?>  </h4></div>        
           <table class="table">
             <tr>
               <th>Cover</th>
               <th>ISBN</th>
               <th>Title</th>
             </tr>
             <?php 
             require "SQLConnection.php";
             
             $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
             // set the PDO error mode to exception
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $tableContent="";
             try {
                 
                 
                 
                 $sqlQuery = "SELECT ID,ISBN10,ISBN13,Title FROM books order by Title";
                 $result = $pdo->query( $sqlQuery );
                 $rowCount = $result->rowCount();
                 if ($rowCount>0){
                     
                     for($i=0; $i<$rowCount; ++$i)
                     {
                         $row = $result->fetch();
                         $tableContent=$tableContent."<tr><th><img src=\BookRepPrj\\BookRepPrj\\images\\tinysquare\\".$row[1].".jpg></th>
                         <th>".$row[2]."</th>".
                         "<th><a href='?BookId=$row[0]'>".$row[3]."</a></th></tr>";
                     }
                     
                     
                 }else {
                     echo "*** There are no rows to display from the Person table ***";
                 }
                 
                
             }
             
             catch(PDOException $e) {
                 echo "Connection failed:  " . $e->getMessage();
             }
             
             
             if (isset($_GET['categories'])){
                 $tableContent="";
                 try {
                     
     
                     $sqlQuery = "SELECT ID,ISBN10,ISBN13,Title FROM books where ".$_GET['type']."='".$_GET['categories']."'";
                     $result = $pdo->query( $sqlQuery );
                     $rowCount = $result->rowCount();
                     if ($rowCount>0){
                         
                         for($i=0; $i<$rowCount; ++$i)
                         {
                             $row = $result->fetch();
                             $tableContent=$tableContent.'<tr><th><img src="\images\tinysquare'.$row[1].'jpg"/></th>'.
                                 "<th>".$row[2]."</th>".
                                 "<th><a href='?BookId=$row[0]'>".$row[3]."</a></th></tr>";
                         }
                         echo $tableContent;
                         
                     }else {
                         echo "*** There are no rows to display from the Person table ***";
                     }
                     
                     
                 }
                 
                 catch(PDOException $e) {
                     echo "Connection failed:  " . $e->getMessage();
                 }
                 unset($_GET['categories']);
             }else {
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
                  <?php
                  try {
                      $sqlQuery = "SELECT ID,SubcategoryName FROM  subcategories limit 20";
                      $result = $pdo->query( $sqlQuery );
                      $rowCount = $result->rowCount();
                      if ($rowCount>0){
                          
                          for($i=0; $i<$rowCount; ++$i)
                          {
                              $row = $result->fetch();
                              echo "<li><a href='?categories=$row[0]&type=SubcategoryID'>$row[1]</a></li>";
                          }
                      }
                      
                      
                     
                  } catch(PDOException $e) {
                      echo "Connection failed:  " . $e->getMessage();
                  }
                  ?>
             </ul> 
         </div>
                 
      </div>  <!-- end left navigation rail --> 
      
      <div class="col-md-2">  <!-- start left navigation rail column -->
         <div class="panel panel-info spaceabove">
            <div class="panel-heading"><h4>Imprints</h4></div>
            <ul class="nav nav-pills nav-stacked">
                  <?php
                  try {
                      $sqlQuery = "SELECT * FROM  imprints";
                      $result = $pdo->query($sqlQuery);                
                      $rowCount = $result->rowCount();
                      if ($rowCount>0){
                          
                          for($i=0; $i<$rowCount; ++$i)
                          {
                              $row = $result->fetch();
                              echo "<li><a href='?categories=$row[0]&type=ImprintID'>$row[1]</a></li>";
                          }
                      }
                      
                      
                      
          
                  } catch(PDOException $e) {
                      echo "Connection failed:  " . $e->getMessage();
                  }
                  ?>   
             </ul>
         </div>    

         <div class="panel panel-info">
            <div class="panel-heading"><h4>Status</h4></div>
            <ul class="nav nav-pills nav-stacked">
                <?php
                  try {
                      $sqlQuery = "SELECT * FROM  productionstatuses";
                      $result = $pdo->query($sqlQuery);                
                      $rowCount = $result->rowCount();
                      if ($rowCount>0){
                          
                          for($i=0; $i<$rowCount; ++$i)
                          {
                              $row = $result->fetch();
                              echo "<li><a href='?categories=$row[0]&type=ProductionStatusID'>$row[1]</a></li>";
                          }
                      }
                  } catch(PDOException $e) {
                      echo "Connection failed:  " . $e->getMessage();
                  }
                  ?> 
             </ul>
         </div>  
         
         <div class="panel panel-info">
            <div class="panel-heading"><h4>Binding</h4></div>
            <ul class="nav nav-pills nav-stacked">
             <?php
                  try {
                      $sqlQuery = "SELECT * FROM  bindingtypes";
                      $result = $pdo->query($sqlQuery);                
                      $rowCount = $result->rowCount();
                      if ($rowCount>0){
                          
                          for($i=0; $i<$rowCount; ++$i)
                          {
                              $row = $result->fetch();
                              echo "<li><a href='?categories=$row[0]&type=BindingTypeID'>$row[1]</a></li>";
                          }
                      }
                      
                      
                      
                      $pdo = null;
                  } catch(PDOException $e) {
                      echo "Connection failed:  " . $e->getMessage();
                  }
                  ?> 
               
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