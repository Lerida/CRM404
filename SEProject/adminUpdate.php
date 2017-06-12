<?php
session_start();
include "classes/crud.class.php";
include "classes/user.class.php";
include "classes/validation.class.php";




                   
    $crud = new Crud();

	$username=$_SESSION['loginuser'];

              $result=$crud->isAdmin1($username);


  


    $e=array();
if (isset($_POST['update'])){
   $validation= new Validation();
   $Crud = new Crud();
   $result = array("success"=>true,"message"=>' ');

    
		$Username=$_POST['Username'];
		$Name=$_POST['Name'];

		
        $result = $Crud->updateName($Name,$_POST['Username']);
    
   	$e[] =  $result;
    
    

}

    else if (isset($_POST['update1'])){

    $validation= new Validation();
    $Crud = new Crud();
	$result = array("success"=>true,"message"=>' ');
	
		$Username=$_POST['Username'];
	
		$Surname=$_POST['Surname'];

	
        $result = $Crud->updateSrName($Surname,$_POST['Username']);
    
       	$e[] =  $result;
    
    
    
}
    else if (isset($_POST['update2'])){

    $validation= new Validation();
    $Crud = new Crud();
	$result = array("success"=>true,"message"=>' ');
	
    
		$Username=$_POST['Username'];
		
		$passw=$_POST['Password'];
        
	if ($passw != $validation-> checkPass($passw)){ //validation per password
        
          $e[]  = " Password must be more than 8 characters, ";
		 "must contain at least one small case letter, ";
		 "must contain at least one capital letter, ";
		"must contain at least one number.";
    
    
    }
		
else{  
			$result = $Crud->updatePass($passw,$_POST['Username']);    
    	$e[] =  $result;
} }
    else if (isset($_POST['update3'])){

    $validation= new Validation();
    $Crud = new Crud();
	$result = array("success"=>true,"message"=>' ');

		$Username=$_POST['Username'];
	
		$Email=$_POST['Email'];
		
if(!filter_var($Email, FILTER_VALIDATE_EMAIL))	{ 
	    $e[] = 'Please enter a valid email address!';
	}
		else{ $result = $Crud->updateEmail($Email,$_POST['Username']);
        	$e[] =  $result;
            }
}
  else if (isset($_POST['update4'])){

    $validation= new Validation();
    $Crud = new Crud();
	$result = array("success"=>true,"message"=>' ');
	

		$Username=$_POST['Username'];
		$Name=$_POST['Name'];
		$Surname=$_POST['Surname'];
		$Password=$_POST['Password'];
		$Email=$_POST['Email'];
		
	   
		$user = new user("",$Name,$Surname,$Username,$Password,$Email);
		
        $result = $Crud->updateAll($user,	$Username);
    
       	$e[] =  $result;
    
    
    
}
?>


<html>
    <head>
    <title>
   Farma Net Albania
    </title>

      
         <link rel="icon" href="Images/smallogo.png">
        <link href="Fonts/Amaranth.css" media="all" rel="stylesheet" type="text/css" />
        <link href="Fonts/Josefin.css" media="all" rel="stylesheet" type="text/css" />
        <link href="Fonts/Stalemate.css" media="all" rel="stylesheet" type="text/css" />
        <link href="style.css" media="all" rel="stylesheet" type="text/css" />
        <!--<script src="emriifile" type="text/javascript"></script>-->
    
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

   </head>
        
        
    <style>
        
        .modal {
      /*  display: none;  Hidden by default */
        
        position: fixed; /* Stay in place */
        z-index: 4000; /* Sit on top */
        padding-top: 50px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-image:url(Images/fond2.png);
        background-size: cover;
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-image: url(Images/adduser.jpg);
        background-size: cover;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 80%;
      background-color: #f9f2ec;
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0} 
        to {top:0; opacity:2}
    }

    @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:2}
    }

    /* The Close Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
        color: white; 
    }

    .modal-body {
        padding: 2px 16px;
        height: 550px;
    }

    /* Form here */
     input[type=text], select {
        width: 100%;
        padding: 8px 10px;
        margin: 4px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
         -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
    }
    input[type=text]:focus {
    border: 3px solid #555;
    }
      input[type=email], select {
        width: 100%;
        padding: 8px 10px;
        margin: 4px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
         -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
    }
    input[type=email]:focus {
    border: 3px solid #555;
    }
    
    
    input[type=password], select {
        width: 100%;
        padding: 8px 10px;
        margin: 4px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
         -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
    }
    input[type=password]:focus {
    border: 3px solid #555;
    }
        
   .myButton {
	-moz-box-shadow: 0px 10px 14px -7px  #f453ad;
	-webkit-box-shadow: 0px 10px 14px -7px  #f453ad;
	box-shadow: 0px 10px 14px -7px  #f453ad;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05,  #f453ad), color-stop(1, #ffe6f2));
	background:-moz-linear-gradient(top,  #f453ad 5%, #ffe6f2 100%);
	background:-webkit-linear-gradient(top,  #f453ad 5%, #ffe6f2 100%);
	background:-o-linear-gradient(top,  #f453ad 5%, #ffe6f2 100%);
	background:-ms-linear-gradient(top,  #f453ad 5%, #ffe6f2 100%);
	background:linear-gradient(to bottom,  #f453ad 5%, #ffe6f2 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=' #f453ad', endColorstr='#ffe6f2',GradientType=0);
	background-color:#f453ad;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:20px;
	font-weight:bold;
    font-family: 'Josefin Sans', sans-serif;

	padding:18px 32px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
        width: 60%;

    }
    .myButton:hover {
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05,    #f453ad), color-stop(1,  #ffe6e6));
        background:-moz-linear-gradient(top,   #f453ad 5%, #ffe6e6 100%);
        background:-webkit-linear-gradient(top,   #f453ad 5%, #ffe6e6 100%);
        background:-o-linear-gradient(top,   #f453ad 5%, #ffe6e6 100%);
        background:-ms-linear-gradient(top,   #f453ad 5%,  #ffe6e6  100%);
        background:linear-gradient(to bottom,   #f453ad 5%,  #ffe6e6 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='  #f453ad', endColorstr=' #ffe6e6 ',GradientType=0);
        background-color:  #f453ad;
    }
    .myButton:active {
        position:relative;
        top:1px;
    }
        
    </style>
    <body>
        
        
               
        
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" onclick="document.location.href='Admin1View.php'">&#10006;</span>
            <div style="text-align:center;">

                <p style="font-family:'Amaranth', sans-serif; padding:5px; padding-bottom:none;color:#f453ad;;"> Fill the form correctly to update an existing user.</p>
                <h4 style="font-family:'Stalemate',cursive; font-size:40px; margin-top:20px;margin-bottom: 11px; color: #f453ad;">Admin</h4>
                <hr style="width:40%;float:left; margin-top:-52px;">
                <hr style="width:40%;float:right; margin-top:-52px;">

            </div>
        </div>
          
        <div class="modal-body" style="">
        <form action="" method="POST" style="width:80%;">
            <div style="width:35%;float:left;margin-top:-37px; font-family:'Amaranth', sans-serif;color: #f453ad;">
            <p>Name <input type="text" name="Name" placeholder="Name"/></p>
            <p>Surname <input type="text"  name="Surname" placeholder="Surname"/></p>
            <p>Username <input type="text" name="Username" placeholder="Username"/></p>
            <p>Password <input type="password" name="Password" placeholder="Password"/></p>
            <p>Email <input type="email" name="Email" placeholder="E-Mail "/></p>
            </div>
            
            <div style="width:65%; float:right;text-align:center;margin-right: -147px; margin-top:-15px; font-family:'Amaranth', sans-serif;color:white;">
		    <div  style="position:absolute; color:red; top:560px; left:530px;"> <?php 
                if (isset($_POST['update'])||isset($_POST['update1'])||isset($_POST['update2'])||isset($_POST['update3'])||isset($_POST['update4'])) {
    
    

  
            for ($i = 0; $i < count($e); $i++) {print $e[$i];} }
                
                
                
                
                
                ?> </div>
             
            
           <p> <button type="submit" name="update"  class="myButton" style="    margin-bottom: 36px; float:left;">Update Name </button> </p>
		
           <p> <button type="submit" name="update1"  class="myButton" style="    margin-bottom: 36px; float:left;">Update Surname </button> </p>
            
           <p> <button type="submit" name="update2"  class="myButton" style="    margin-bottom: 36px; float:left;">Update Password </button> </p>
                
           <p> <button type="submit" name="update3"  class="myButton" style="     margin-bottom: 36px;float:left;">Update Email </button> </p>
                
           <p> <button type="submit" name="update4"  class="myButton" style="     margin-bottom: 36px;float:left;">Update All</button> </p>
                
            </div>
            
            
        </form>
        </div> 
      </div>

    </div>

    </body>
</html>