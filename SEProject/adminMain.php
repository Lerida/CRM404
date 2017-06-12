<?php

session_start();
include "classes/crud.class.php";
include "classes/user.class.php";
include "classes/validation.class.php";


                 
                   
    $crud = new Crud();

	$username=$_SESSION['loginuser'];

              $result=$crud->isAdmin1($username);


  

          

if(isset($_POST['submit']))
{	
    $e=array();
	$validation= new Validation();
    
	$name = $_POST['Name'];
	$surname = $_POST['Surname'];
    $username = $_POST['Username'];
    $pass = $_POST['Password'];	
	$email = $_POST['Email'];
	
	if ($username != $validation->checkUName($username)){
        $e[]  = " Username must contain only letters!"; //validation per username
        
    }
    
    else if ($pass != $validation-> checkPass($pass)){ //validation per password
        
          $e[]  = " Password must be more than 8 characters, ";
		 "must contain at least one small case letter, ";
		 "must contain at least one capital letter, ";
		"must contain at least one number.";
    
    
    }else if($name=="")	{
		$e[] = " Please enter your name!";
      
	}
    
    
    else if ($validation->letterOnly($name)==false){
        	$error[] = " Incorrect name! Your name must include letters only !";	
        
    }
   
    else if($surname=="")	{
		$e[] = "Please enter your surname!";	
	}
     else if ($validation->letterOnly($surname)==false){
        	$error[] = " Incorrect Surname! Your surname must include letters only!";	
        
    }
	else if($email=="")	{
		$e[] = "Please enter your email!";	
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL))	{ //perdor filter per email sipas requirments
	    $e[] = 'Please enter a valid email address!';
	}
	else if($pass=="")	{
		$e[] = "Please enter a password !";
	}
	

	else
	{
		try
		{
			$Crud = new Crud();
			if (sizeof($Crud->check($username))!=1){
			$user = new User("",$name,$surname,$username,$pass,$email);
			$message= $Crud->create($user);	
			$e[]="Your new User has been added!";
           
			}else {
			
			$e[]="Sorry! This user already exists. ";
               
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
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
        background-color: white; /* Fallback color */
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-image:url(Images/fond.png);
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
        height: 400px;
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

                <p style="font-family:'Amaranth', sans-serif; padding:5px; padding-bottom:none;color:#f453ad;"> Fill the form correctly to add a new user to the list.</p>
                <h4 style="font-family:'Stalemate',cursive; font-size:40px; margin-top:20px;margin-bottom: 11px; color: white;">Admin</h4>
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
            
            <div style="width:65%; float:right;text-align:center;margin-right: -147px; font-family:'Amaranth', sans-serif;color:white;">
		    <div style="position:absolute; color:red; top:590px; left:550px;"> <?php if (isset($_POST['submit'])) 
  
                                        for ($i = 0; $i < count($e); $i++) {
                                        print $e[$i];}  ?> </div>
            <input type="submit"  name="submit" class="myButton" style="margin-top: 215px; float:left;">
            <input type="button"   style="margin-top:20px; background-color:#808080; float:left;" value="Back" onClick="document.location.href='Admin1View.php'"  class="myButton">
            </div>
            
            
        </form>
        </div> 
      </div>

</div>
    
</body> 
    </html>