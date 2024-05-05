<?php 
session_start();

if(isset($_SESSION["bookID"])){
    $bookID= $_SESSION["bookID"];
}


require "SQLConnection.php";
    
$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
// set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bookarr=Array();
try {
    $sqlQuery = "SELECT CoverImage,Title,ISBN10,ISBN13,CopyrightYear,LatestInstockDate,TrimSize,PageCountsEditorialEst,
                    Description,SubcategoryID,ImprintID,BindingTypeID,
                    ProductionStatusID FROM books where ID='".$bookID."'";
    $result = $pdo->query( $sqlQuery );
    $rowCount = $result->rowCount();
    if ($rowCount>0){

            $row = $result->fetch();
            $bookarr['CoverImage']=$row[0];
            $bookarr['Title']=$row[1];
            $bookarr['ISBN10']=$row[2];
            $bookarr['ISBN13']=$row[3];
            $bookarr['CopyrightYear']=$row[4];
            $bookarr['LatestInstockDate']=$row[5];
            $bookarr['TrimSize']=$row[6];
            $bookarr['PageCountsEditorialEst']=$row[7];
            $bookarr['Description']=$row[9];
         
        
        
        
    }else {
        echo "*** There are no rows to display from the Person table ***";
    }
    
    $sqlQuery = "SELECT FirstName,LastName FROM authors 
                       INNER JOIN bookauthors ON authors.ID=bookauthors.AuthorId
                        where BookId='".$bookID."'";
    $result = $pdo->query( $sqlQuery );
    $rowCount = $result->rowCount();
    $authorsarr=array();
    if ($rowCount>0){
        
        for ($i = 0; $i < $rowCount; $i++) {
            $row = $result->fetch();
            $authorsarr[$i]['Authors']=$row[0]." ".$row[1];
        }
        
        
    }
    
    $sqlQuery = "SELECT SubcategoryName FROM subcategories where ID=(SELECT SubcategoryID FROM books where ID='".$bookID."') ";
    $result = $pdo->query( $sqlQuery );
    $rowCount = $result->rowCount();
    if ($rowCount>0){
        $row = $result->fetch();
        $bookarr['SubcategoryName']=$row[0];
        
    }
    
    $sqlQuery = "SELECT Imprint FROM imprints where ID=(SELECT ImprintID FROM books where ID='".$bookID."') ";
    $result = $pdo->query( $sqlQuery );
    $rowCount = $result->rowCount();
    if ($rowCount>0){
        $row = $result->fetch();
        $bookarr['Imprint']=$row[0];
        
    }
    
    $sqlQuery = "SELECT BindingType FROM bindingtypes where ID=(SELECT BindingTypeID FROM books where ID='".$bookID."') ";
    $result = $pdo->query( $sqlQuery );
    $rowCount = $result->rowCount();
    if ($rowCount>0){
        $row = $result->fetch();
        $bookarr['BindingType']=$row[0];
        
    }
    
    $sqlQuery = "SELECT ProductionStatus FROM productionstatuses where ID=(SELECT ProductionStatusID FROM books where ID='".$bookID."') ";
    $result = $pdo->query( $sqlQuery );
    $rowCount = $result->rowCount();
    if ($rowCount>0){
        $row = $result->fetch();
        $bookarr['ProductionStatus']=$row[0];
        
    }
    
    
}catch(PDOException $e) {
    echo "Connection failed:  " . $e->getMessage();
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

      <div class="col-md-10">  <!-- start main content column -->
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4>Book Details</h4></div>
           
           <table class="table">
             <tr>
               <th>Cover</th>
               <td><?php echo "<img src=\BookRepPrj\\BookRepPrj\\images\\tinysquare\\".$bookarr['ISBN10'].".jpg>"; ?></td>
             </tr>            
             <tr>
               <th>Title</th>
               <td><em><?php echo $bookarr['Title']; ?></em></td>
             </tr>    
             <tr>
               <th>Authors</th>
               <td>
               	<?php foreach ($authorsarr as $author){
               	    echo $author['Authors']."<br>";
               	}?>
               </td>
             </tr>   
             <tr>
               <th>ISBN-10</th>
               <td><?php echo $bookarr['ISBN10']; ?></td>
             </tr>
             <tr>
               <th>ISBN-13</th>
               <td><?php echo $bookarr['ISBN13']; ?></td>
             </tr>
             <tr>
               <th>Copyright Year</th>
               <td><?php echo $bookarr['CopyrightYear']; ?></td>
             </tr>   
             <tr>
               <th>Instock Date</th>
               <td>
               		<?php echo $bookarr['LatestInstockDate']; ?>
               </td>
             </tr>              
             <tr>
               <th>Trim Size</th>
               <td><?php echo $bookarr['TrimSize']; ?></td>
             </tr> 
             <tr>
               <th>Page Count</th>
               <td><?php echo $bookarr['PageCountsEditorialEst']; ?></td>
             </tr> 
             <tr>
               <th>Description</th>
               <td><?php echo $bookarr['Description']; ?></td>
             </tr> 
             <tr>
               <th>Sub Category</th>
               <td><?php echo $bookarr['SubcategoryName']; ?></td>
             </tr>
             <tr>
               <th>Imprint</th>
               <td><?php echo $bookarr['Imprint']; ?></td>
             </tr>   
             <tr>
               <th>Binding Type</th>
               <td><?php echo $bookarr['BindingType']; ?></td>
             </tr> 
             <tr>
               <th>Production Status</th>
               <td><?php echo $bookarr['ProductionStatus']; ?></td>
             </tr>              
           </table>

         </div>           
      </div>



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