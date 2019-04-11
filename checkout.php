<?php 
session_start(); 

include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>My Bookstore</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>
	
    <!--Main Container Starts-->
    <div class="main_wrapper">
    	
        <!--Header Starts-->
    	<div class="header_wrapper">
          <a  href="index.php"><img style="border:1px solid red; height:100%; width:100%;" src="images/logo.gif"></a>
        </div>
        <!--Header Ends-->
        
        <!--Navagation Bar starts-->
        <div id="navbar">
        	
          <ul id="menu">
        		<li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Books</a></li>
                <li><a href="customer_register.php">Sign Up</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
        
        	</ul>
            
             <div id="form">
             	<form method="get" action="results.php" enctype="multipart/form-data">
                	
                     <input type="text" name="user_query" placeholder="Search a Book"/>
                    <input type="submit" name="search" value="Search" />
                    
                </form>
            </div>
            
        </div>
        <!--Navagation Bar Ends-->
       
       
        <div class="content_wrapper">
        	
            <div id="left_sidebar">
            
            	<div id="sidebar_title">Categories</div>
                
                <ul id="cats">
                	<?php getCats(); ?>
                    
                </ul>
                
                 <div id="sidebar_title">Most Popular Authors</div>
                 
                 <ul id="cats">
                 
                 <?php getBrands(); ?>
                
            
            	</ul>
            </div>
            
            
        	<div id="right_content">
           
            <?php cart(); ?> 
            
            	<div id="headline">
                	<div id="headline_content">
                    	<?php 
                        if(!isset($_SESSION['customer_email']))
						{
							echo "<b>Welcome Guest!</b> <b style='color:yellow'>Shopping Cart</b>";
							
							}
							else {
								echo "<b>Welcome:" . "<span style='color:skyblue'>" . $_SESSION['customer_email'] . "</span>" . "</b>" . "<b style='color:yellow'>Your Shopping Cart </b>";
								}
						?> 
                    	<span> - Total Items: <?php items(); ?> - Total Price: <?php total_price(); ?> - <a href="cart.php" style="color:#FF0;">Go to Cart</a>
                        <?php 
                       
					   if(!isset($_SESSION['customer_email'])){
					    
						echo "<a href='checkout.php' style='color:#F93;'>Login</a>";
					   }
					   else {
						   echo "<a href='logout.php' style='color:#F93;'>Logout</a>";
						   }
						
						?>
                        </span>
                    </div>
                </div>
     
            <div>
           
		   <?php 
		   if(!isset($_SESSION['customer_email']))
		   { 
			   include("customer/customer_login.php");
			   
			   }
			   else {
				   
				   include("payment_options.php");
				   
				   }
		   
		  
		   
		   ?>
            </div>
            
            
            
            </div>
        
        
        </div>
        
    <div id="templatemo_footer">
    
	       <a href="index.php">Home</a> | <a href="results.php">Search</a> | <a href="all_products.php">Books</a> | <a href="#">New Releases</a> | <a href="#">FAQs</a> | <a href="#">Contact Us</a><br />
        Copyright © 2016 <a href="#"><strong>TheBookStore</strong></a> 
       </div> 
        
    
    </div>
    <!--Main Container End-->
    
</body>
</html>