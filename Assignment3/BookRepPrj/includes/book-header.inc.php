

<header>  
    <div class="navbar navbar-default ">
      <div class="container">
         <nav>
           <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
             <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-book"></span> Book Rep CRM</a>
           </div>
           <div class="navbar-collapse collapse navbar-right">
             <ul class="nav navbar-nav">
               <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
               <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
             </ul>
             <form class="navbar-form navbar-right" role="search" method="get" action="customer-list.php">
               <div class="form-group">
                 <input type="text" class="form-control" placeholder="Search Customer" name="search">
                 
                  <input type="hidden" name="sort" value="<?php echo $sort; ?>">
               </div>
               <button type="submit" class="btn btn-default">Submit</button>
             </form>               
           </div><!-- end navbar collapse -->
         
        </nav>
      </div>
    </div>  <!-- end navbar -->
</header>

