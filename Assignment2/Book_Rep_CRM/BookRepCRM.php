<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; 
   charset=UTF-ISO-8859-1" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Book Template</title>

   <link rel="shortcut icon" href="../../assets/ico/favicon.png">

   <!-- Google fonts used in this theme  -->
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>  

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

<?php include 'book-header.inc.php'; ?>
   
<div class="container">
   <div class="row">  <!-- start main content row -->

      <div class="col-md-2">  <!-- start left navigation rail column -->
         <?php include 'book-left-nav.inc.php'; ?>
      </div>  <!-- end left navigation rail --> 

      <div class="col-md-10">  <!-- start main content column -->
        
         <!-- Customer panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4>My Customers</h4></div>
           <table class="table">
             <tr>
               <th>Name</th>
               <th>Email</th>
               <th>University</th>
               <th>City</th>
             </tr>
             <?php 

             $filename="customers.txt";
             $file = array();
             $customersFile=file($filename) or die('ERROR: Cannot read file');
             $delimiter=',';  

             $customers=array();
             foreach ($customersFile as $customer) {
                 $newcustomers=array();
                 $file=explode($delimiter, $customer);
                // $newCustomer=new Customers($file[0],$file[1], $file[2], $file[3], $file[4], $file[5],$file[6], $file[7], $file[8], $file[9], $file[10]);
                 $newcustomers['id']=$file[0];
                 $newcustomers['name']=$file[1].' '.$file[2];
                 $newcustomers['email']=$file[3];
                 $newcustomers['university']=$file[4];
                 $newcustomers['city']=$file[6];
                 
                 $customers[$newcustomers['id']]=$newcustomers;
                 
             }
             
            /* for ($i = 0; $i < count($customers); $i++) {
                 $id=$customers[$i].",".$customers[$i];
                 echo "<tr>";
                 echo "<form action=\"BookRepCRM.php\" method=\"GET\">";
                 echo "<th><button type=\"submit\" name=\"Id\" value=\"$id\" class=\"btn-link\">".$customers[$i]."</button></th>";
                 echo "</form>";
                 echo "<th>"; echo $customers[$i][0]; echo "</th>";
                 echo "<th>"; echo $customers[$i][1]; echo "</th>";
                 echo "<th>"; echo $customers[$i][2]; echo "</th>";
                 echo "</tr>";
             }*/
             foreach ($customers as $customer){
                 $id=$customer['id'];
                 $name=$customer['name'];
                 //$id=$customer['id'];
               //  echo "<form action=\"BookRepCRM.php\" method=\"GET\">";
               //  echo "<th><button type=\"submit\" name=\"Id\" value=\"$id\" class=\"btn-link\">".$customer['name']."</button></th>";
               //  echo "</form>";
                 echo "<tr><th><a href='?id=$id'>$name</a></th>";
                 echo "<th>".$customer['email']."</th>";
                 echo "<th>".$customer['university']."</th>";
                 echo "<th>".$customer['city']."</th></tr>";
             }
                
             
                
             ?>
           </table>
         </div>           
         

      </div>
            


   
   
     <?php    
    
   /*  if ($_GET){
         $delimiter=',';
         $temp=explode($delimiter, $_GET['Id']);
         books($temp[0],$temp[1]);    
     }*/
     if (isset($_GET['id'])){
         $delimiter=',';
         
         $id=$_GET['id'];
         $name=$customers[$id];
         books($id, $name);
         
     }
     
                
                function books($id,$name) {
                 $books=file("orders.txt") or die('ERROR: Cannot read file');
                 $delimiter=',';                
                 $i=0;
                 $booksInventory=array();
                 foreach ($books as  $book){
                     $booksFiled=explode($delimiter, $book);
                     $newBook=new Books($booksFiled[0], $booksFiled[1], $booksFiled[2], $booksFiled[3], $booksFiled[4]);
                     $booksInventory[$i]=$newBook;                
                     $i++;
                     
                 }
                 $found=FALSE;
                 for ($i=0;$i<count($booksInventory);$i++){
                     if ($booksInventory[$i]->getCustomerId()==$id){
                         
                         $found=TRUE;
                         break;
                     }
                 }
                 if($found){
                     
                     echo '<div class="col-md-10">  <!-- start main content column -->
                        <div class="panel panel-danger spaceabove">
                      <div class="panel-heading"><h4>Orders for '. $name['name'].'</h4></div>
                      <table class="table">
                      <tr>
                      <th>Book ISBN</th>
                      <th>Book Title</th>
                      <th>Book Category</th>
                      </tr>';
                 for ($i=0;$i<count($booksInventory);$i++){
                     if ($booksInventory[$i]->getCustomerId()==$id){
                         // " <!-- Book panel  -->"
           
                         echo "<tr>";
                         echo "<th>".$booksInventory[$i]->getBoolIsbn()."</th>";
                         echo "<th>".$booksInventory[$i]->getBookTitle()."</th>";
                         echo "<th>".$booksInventory[$i]->getBookCategory()."</th>";
                         echo "</tr>";
                       
               
                     }
                 }
                 echo "</table>
                  </div>
                 </div>
                </div>";
                 }else{
                     echo '<div class="col-md-10">  <!-- start main content column -->
                    <div class="panel panel-danger spaceabove">
                        No orders found for '. $name['name'].'
                    </div>
                    </div>';
                 }
                 
                  
              }
          
  
              
              class Books {
                  
                  private  $orderId;
                  private $customerId;
                  private $boolIsbn;
                  private $bookTitle;
                  private $bookCategory;
                  
                  /**
                 * @return mixed
                 */
                public function getOrderId()
                {
                    return $this->orderId;
                }
            
                /**
                 * @return mixed
                 */
                public function getCustomerId()
                {
                    return $this->customerId;
                }
            
                /**
                 * @return mixed
                 */
                public function getBoolIsbn()
                {
                    return $this->boolIsbn;
                }
            
                /**
                 * @return mixed
                 */
                public function getBookTitle()
                {
                    return $this->bookTitle;
                }
            
                /**
                 * @return mixed
                 */
                public function getBookCategory()
                {
                    return $this->bookCategory;
                }
            
                function __construct($orderId, $customerId, $boolIsbn, $bookTitle,$bookCategory) {
                      $this->orderId = $orderId;
                      $this->customerId = $customerId;
                      $this->boolIsbn = $boolIsbn;
                      $this->bookTitle = $bookTitle;
                      $this->bookCategory=$bookCategory;
         
                  }
                  
                  
              }
              ?> 
             </div>  <!-- end main content column --> 
         </div>  <!-- end main content row -->
         




   
   
 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
 <script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>