<?php 
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>My BookStore</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>
	
    <!--Main Container Starts-->
    <div class="main_wrapper">
    	
        <!--Header Starts-->
    	<div class="header_wrapper">
           <!-- <a href="../index.php"><img src="../images/logo.gif" style="float:left;"></a> -->
              <a  href="../index.php"><img style="border:1px solid red; height:100%; width:100%;" src="../images/logo.gif"></a>
        </div>
        <!--Header Ends-->
        
        <!--Navagation Bar starts-->
        <div id="navbar">
        	
            <ul id="menu">
        		<li><a href="../index.php">Home</a></li>
                <li><a href="../all_products.php">All Products</a></li>
                <li><a href="customer/my_account.php">My Account</a></li>
                <?php 
				if(isset($_SESSION['customer_email'])){
					
                echo "<span style='display:none;'><li><a href='../user_register.php'>Sign Up</a></li></span>";
				
				}
				
				else {
					
					echo "<li><a href='../user_register.php'>Sign Up</a></li>";
					
					}
          
				?>
                <li><a href="../cart.php">Shopping Cart</a></li>
                <li><a href="../contact.php">Contact Us</a></li>
        
        	</ul>
            
             <div id="form">
             	<form method="get" action="results.php" enctype="multipart/form-data">
                	
                    <input type="text" name="user_query" placeholder="Search a Product"/>
                    <input type="submit" name="search" value="Search" />
                    
                </form>
            </div>
            
        </div>
        <!--Navagation Bar Ends-->
       
       
        <div class="content_wrapper">
        	
            <div id="left_sidebar">
            
            	<div id="sidebar_title">Manage Account:</div>
                
                <ul id="cats">
                	<?php 
						
						$customer_session = $_SESSION['customer_email'];
						
						$get_customer_pic = "select * from customers where customer_email='$customer_session'";
						
						$run_customer = mysqli_query($con, $get_customer_pic); 
						
						$row_customer = mysqli_fetch_array($run_customer); 
						
						$customer_pic = $row_customer['customer_image'];
						
						echo "<img src='customer_photos/$customer_pic' width='150' height='150'>";
					
					?>
					<li><a href="my_account.php?my_orders">My Orders</a></li>
                    <li><a href="my_account.php?edit_account">Edit Account</a></li>
                    <li><a href="my_account.php?change_pass">Change Password</a></li>
                    <li><a href="my_account.php?delete_account">Delete Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    
                </ul>
            </div>
            
            
        	<div id="right_content">
           
            <?php cart(); ?> 
            
            	<div id="headline">
                	<div id="headline_content">
                    	<?php 
						if(isset($_SESSION['customer_email'])){
							
							echo "<b>Welcome:" . "</b> &nbsp;" . "<b style='color:yellow;'>" . $_SESSION['customer_email'] . "</b>";
							
							
							}
						
						
						?>
                        
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
           
           <h2 style="background:#000; color:#FC9; padding:20px; text-align:center; border-top:2px solid #FFF;">Manage Your Account Here</h2>
           
           <?php getDefault(); ?>
           
           <?php
		   if(isset($_GET['my_orders']))
		   
		   {
			   include("my_orders.php");
			   
			   
			   }
			   
			   if(isset($_GET['edit_account']))
		   
		   {
			   include("edit_account.php");
			   
			   
			   }
			   
			    if(isset($_GET['change_pass']))
		   
		   {
			   include("change_pass.php");
			   
			   
			   }
			   
			    if(isset($_GET['delete_account']))
		   
		   {
			   include("delete_account.php");
			   
			   
			   }
		   
		   
		   
		   ?>
           
           
            </div>
            
            
            
            </div>
        
        
        </div>
        
        
        <div class="footer">
        
        <h1 style="color:#000; padding-top:30px; text-align:center;">&copy; 2016 - By THE BOOKSTORE </h1>
        
        </div>
    
    
    
    </div>
    <!--Main Container End-->
    
</body>
</html>