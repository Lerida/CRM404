<?php
session_start();
    include('classes/crudp.class.php');
  include ('classes/user.class.php');

    include ('classes/validation.class.php');
                 
                   
    $crudp = new Crudp();

	$username=$_SESSION['loginuser'];

              $result=$crudp->isAdmin($username);



?>


<html>
    <head>
    <title>
   Cocomed
    </title>

        <link rel="icon" href="Images/cocomed2.png">
        
        <link href="Fonts/Amaranth.css" media="all" rel="stylesheet" type="text/css" />
        <link href="Fonts/Josefin.css" media="all" rel="stylesheet" type="text/css" />
        <link href="Fonts/Stalemate.css" media="all" rel="stylesheet" type="text/css" />
        <link href="style.css" media="all" rel="stylesheet" type="text/css" />
        <!--<script src="emriifile" type="text/javascript"></script>-->
    
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

  </head>
    <style>
     body {
        background-image: url(Images/urban.jpg);
       background-color: #f9f2ec;
        margin: 0;
    }    
    
	.nav {
		width: 100%;
		height: 80px;
		background-color:   #fcc6e2;
        opacity: 1.2;
        position: fixed;
        margin-top: 0px;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
	}
    a {
        text-decoration: none !important;
        margin-top: 20px;
        color: white;
    }
    div.show-on-hover{
        color: white;
    }
    div.show-on-hover ul.aa{
        display: none;
        text-decoration: none;
    }
    div.show-on-hover:hover ul.aa{
        display: block;
        color: white;
        text-align: left;
    }
    div.show-on-hover ul.aa:hover{
        text-decoration: none;
        color: white;
    }
    li{
        display: inline-flex;
        font-family: 'Josefin Sans', sans-serif;
        padding-right: 30px;
        font-size: 20px;
    }
    .modal {
      /*  display: none;  Hidden by default */
        visibility: hidden;
        position: fixed; /* Stay in place */
        z-index: 4000; /* Sit on top */
        padding-top: 50px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-image: url(Images/white3.jpg); 
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
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
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
    h5{
        margin-bottom: -13px;
    }
      .footer-pop {
           position:static;
           bottom:0;
           width:100%;
           height:60px;   /* Height of the footer */
           background:#414a4e;
   }
    .hide{
        visibility: visible;
    }
    input:checked {
    height: 50px;
    width: 50px;
    }
    
        .footer-div {
       position:absolute;
       opacity: 0.6;
       bottom:0;
       float: left;
       width:100%;
       z-index: -1;
       height:100px;   /* Height of the footer */
       background: #d2a679;
   }
    
     #Image{
        width:60px;
        height:60px;
        background: #414a4e; /* Old browsers */
        opacity:0.6;
        margin-top: 10px;
        -webkit-animation: scale 3s ease-in-out infinite alternate; 
    }
    

/***Animation****/
    @-webkit-keyframes scale {
        0% {

        }

        100% {
         -webkit-transform: scale(1.2);
        }
        
        
        100%{opacity: 1;}
    }

    @keyframes fadey { 
        0% { opacity: 0; }
        15% { opacity: 1; }
        85% { opacity: 1; }
        100% { opacity: 0; }
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
        
    .myButton1 {
	-moz-box-shadow: 0px 10px 14px -7px #3dc21b;
	-webkit-box-shadow: 0px 10px 14px -7px #3dc21b;
	box-shadow: 0px 10px 14px -7px #3dc21b;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #0f5e24), color-stop(1, #5cbf2a));
	background:-moz-linear-gradient(top, #0f5e24 5%, #5cbf2a 100%);
	background:-webkit-linear-gradient(top, #0f5e24 5%, #5cbf2a 100%);
	background:-o-linear-gradient(top, #0f5e24 5%, #5cbf2a 100%);
	background:-ms-linear-gradient(top, #0f5e24 5%, #5cbf2a 100%);
	background:linear-gradient(to bottom, #0f5e24 5%, #5cbf2a 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0f5e24', endColorstr='#5cbf2a',GradientType=0);
	background-color:#0f5e24;
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
	padding:13px 32px;
	text-decoration:none;
	text-shadow:0px 1px 0px #245e1b;
}
.myButton1:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05,   #ffe6e6), color-stop(1, #0f5e24));
	background:-moz-linear-gradient(top,   #ffe6e6 5%, #0f5e24 100%);
	background:-webkit-linear-gradient(top,   #ffe6e6 5%, #0f5e24 100%);
	background:-o-linear-gradient(top,   #ffe6e6 5%, #0f5e24 100%);
	background:-ms-linear-gradient(top,   #ffe6e6 5%, #0f5e24 100%);
	background:linear-gradient(to bottom,   #ffe6e6 5%, #0f5e24 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='  #ffe6e6', endColorstr='#0f5e24',GradientType=0);
	background-color:  #ffe6e6;
}
.myButton1:active {
	position:relative;
	top:1px;
}

</style>
    
<div class="nav">
    <!--Left part of nav bar-->
    
    <div style="float:left; margin-left: 10px; margin-right: -60px; margin-top: 28px ">  <a href="login.php.php"> <img class="jmlog" src="Images/cocomed2.png" height="50px" width="320px" href="firstpage.php" style="margin-right:30px; margin-top:-15px;"></a></div>
    
    <div style="float:left;">
        <ul style=" margin-top: 4px;" class="topnav">
           
            <li>   
                <a href="logout.php" class="underline hide product"> Log Out </a>
            </li>
        </ul>
    </div>
    
    <div class="dropdown" style="float:right;visibility:hidden;">
      <img class="dropbtn" src="Images/sidemenu.png" height="40px" width="40px">
      <div class="dropdown-content">
        <div class="show-on">
        <a href="ViewOrders.php" class="underline"> Products </a>
     </div>
      </div>
    </div>
      <!--Rightt part of nav bar-->
    <div style="float:right;" class="rightcontact">
        <ul style=" margin-top: 4px;">
            <li style=" padding-right: 13px;" class="rightcont"><a href="" class="lng" data-lng="albanian" ><img src="Images/al.png"></a></li>
            <li class="rightcont"><a href="" class="lng" data-lng="english"><img src="Images/ENG.png"></a></li>
        </ul>
        
    </div>
    
</div>



    <body style="margin: auto;">
    <div style="width: 60%; align:center; margin:auto;">
    <div style="margin-top:240px; float:left; width: 45%;">  
    <form >
        <button type="button" name="Adduser" class="myButton" onClick="document.location.href='adminMain.php'">Add New User
        </button>
    </form>

    <form >
        <input type="button" value="Update User" onClick="document.location.href='adminUpdate.php'" class="myButton"/>
    </form>
    <form>
        <input type="button" value="Add Product"  onClick="document.location.href='Addproduct.php'" class="myButton"/>
        
    </form>
   
    </div>  
    <div style="margin-top:240px; float:right; width:45%;">
    <form action="post">
        <input type="button" name ="viewall" value="View All Users"  onClick="document.location.href='ViewallUsers.php'" class="myButton"/>
    </form>
    <form>
        <input type="button" value="Check Inventory" onClick="document.location.href='ViewAllProducts.php'" class="myButton"/>
    </form>
    

         <form>
        <input type="button" value="Send Request" onClick="document.location.href='SendRequest.php'" class="myButton"/>
        
    </form>
        <form action="post">
            <a href="logout.php" class="animated-button victoria-four">Log Out</a>
        </form>
    </div>
    </div>
        
        
             <!-- Add new User Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&#10006;</span>
            <div style="text-align:center;">

                <p style="font-family:'Amaranth', sans-serif; padding:5px; padding-bottom:none;color:#ffb3d9;"> Fill the form correctly to add a new user to the list.</p>
                <h4 style="font-family:'Stalemate',cursive; font-size:40px; margin-top:20px;margin-bottom: 11px; color:   #ffe6e6;">Admin</h4>
                <hr style="width:40%;float:left; margin-top:-52px;">
                <hr style="width:40%;float:right; margin-top:-52px;">

            </div>
        </div>
          
        <div class="modal-body" style="">
        <form action="" method="POST" style="width:80%;">
            <div style="width:35%;float:left;margin-top:-37px; font-family:'Amaranth', sans-serif;color:green;">
            <p>Name <input type="text" name="Name" placeholder="Name"/></p>
            <p>Surname <input type="text"  name="Surname" placeholder="Surname"/></p>
            <p>Username <input type="text" name="Username" placeholder="Username"/></p>
            <p>Password <input type="password" name="Password" placeholder="Password"/></p>
            <p>Email <input type="email" name="Email" placeholder="E-Mail "/></p>
            </div>
            
            <div style="width:65%; float:right;text-align:center;margin-right: -147px; font-family:'Amaranth', sans-serif;color:white;">
		    
            <input type="submit"  name="submit" class="myButton" style="margin-top: 215px; float:left;">
            </div>
            
            
        </form>
        </div> 
      </div>

</div>
    

   
    
</body>

<script type="text/javascript" language="javascript">
         // Get the modal
    var mod = document.getElementById('myModal');

    // Get the button that opens the modal
    var button = document.getElementById("mybtn");

    // Get the <span> element that closes the modal
    var span1 = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    button.onclick = function() {
        mod.style.visibility = "visible";
    }

    // When the user clicks on <span> (x), close the modal
    span1.onclick = function() {
        mod.style.visibility = "hidden";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == mod) {
            mod.style.visibility = "hidden";
        }
    }
</script>

</html>