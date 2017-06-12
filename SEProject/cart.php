 
 <?php
session_start();
include('classes/crudp.class.php');
	include('classes/cart.class.php');

	include ('classes/validation.class.php');



 if ( ($_GET['name'])) {
     
        $name = $_GET['name'];

        $crud = new Crudp();
         echo "adela";
     

   
       

     echo  $_SESSION['cart'];
                      

     
			 $crud->cart($name,"");	
    //unset($_SESSION['cart']);
      
     
 }
 
  
   

  
    
?>
 
