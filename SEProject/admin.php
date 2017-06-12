<?php
session_start();
    include('classes/crudp.class.php');
  include ('classes/user.class.php');

    include ('classes/validation.class.php');
                 
                   
?>

<html>

 <body style="margin: auto;">
    <div style="width: 60%; align:center; margin:auto;">
    <div style="margin-top:170px; float:left; width: 45%;">  
    <form style="padding-top:120px;">
        <button type="button" name="Add user" class="myButton" onClick="document.location.href='adminUser.php'">Add User
        </button>
    </form>

    
 
    </div>
    </div>
     </html>
    
    
   <style>
     body {
        background-repeat: no-repeat;
        background-size: cover;
        margin: 0;
    }    
    
	.nav {
		width: 100%;
		height: 80px;
		background-color: gray;
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
        background-image: url(Images/contact_back.png);
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
        height: 300px;
    }

   
    .rightModal{
        text-align: center;
        font-family: 'Josefin Sans', sans-serif;
        color:#444749;
        width:50%;
        float: right;
        height: inherit;
        background-image: url(Images/white.jpeg); 
        background-size: cover;
        opacity: 1.8;
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
       background:#414a4e;
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
	-moz-box-shadow: 0px 10px 14px -7px  #d9b38c;
	-webkit-box-shadow: 0px 10px 14px -7px  #d9b38c;
	box-shadow: 0px 10px 14px -7px  #d9b38c;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05,  #d9b38c), color-stop(1, #ffe6f2));
	background:-moz-linear-gradient(top,  #d9b38c 5%, #ffe6f2 100%);
	background:-webkit-linear-gradient(top,  #d9b38c 5%, #ffe6f2 100%);
	background:-o-linear-gradient(top,  #d9b38c 5%, #ffe6f2 100%);
	background:-ms-linear-gradient(top,  #d9b38c 5%, #ffe6f2 100%);
	background:linear-gradient(to bottom,  #d9b38c 5%, #ffe6f2 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=' #d9b38c', endColorstr='#ffe6f2',GradientType=0);
	background-color:#d9b38c;
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
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05,    #d9b38c), color-stop(1,  #ffe6e6));
        background:-moz-linear-gradient(top,   #d9b38c 5%, #ffe6e6 100%);
        background:-webkit-linear-gradient(top,   #d9b38c 5%, #ffe6e6 100%);
        background:-o-linear-gradient(top,   #d9b38c 5%, #ffe6e6 100%);
        background:-ms-linear-gradient(top,   #d9b38c 5%,  #ffe6e6  100%);
        background:linear-gradient(to bottom,   #d9b38c 5%,  #ffe6e6 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='  #d9b38c', endColorstr=' #ffe6e6 ',GradientType=0);
        background-color:  #d9b38c;
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
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #5cbf2a), color-stop(1, #0f5e24));
	background:-moz-linear-gradient(top, #5cbf2a 5%, #0f5e24 100%);
	background:-webkit-linear-gradient(top, #5cbf2a 5%, #0f5e24 100%);
	background:-o-linear-gradient(top, #5cbf2a 5%, #0f5e24 100%);
	background:-ms-linear-gradient(top, #5cbf2a 5%, #0f5e24 100%);
	background:linear-gradient(to bottom, #5cbf2a 5%, #0f5e24 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#5cbf2a', endColorstr='#0f5e24',GradientType=0);
	background-color:#5cbf2a;
}
.myButton1:active {
	position:relative;
	top:1px;
}

    @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css);
    @import url(http://fonts.googleapis.com/css?family=Lato:300,400,700);
    
    a.animated-button.victoria-four {
    font-family: 'Josefin Sans', sans-serif;
	border: 2px solid  #ff66ff;
    width: 50%;
    color:   #cc00ff;
    }
    a.animated-button.victoria-four:after {
        background: #ffe6ff;
        color: #330033;
        opacity: .5;
        -moz-transform: translateY(-50%) translateX(-50%) rotate(90deg);
        -ms-transform: translateY(-50%) translateX(-50%) rotate(90deg);
        -webkit-transform: translateY(-50%) translateX(-50%) rotate(90deg);
        transform: translateY(-50%) translateX(-50%) rotate(90deg);
    }
    a.animated-button.victoria-four:hover:after {
        color: #330033;
        opacity: 1;
        height: 600% !important;
    }
    /* Global Button Styles */
a.animated-button:link, a.animated-button:visited {
	position: relative;
	display: block;
	margin: 30px auto 0;
	padding: 25px 40px;
	color:  #cc00ff;
	font-size:14px;
	font-weight: bold;
	text-align: center;
	text-decoration: none;
	text-transform: uppercase;
	overflow: hidden;
	letter-spacing: .08em;
	border-radius: 0;
	text-shadow: 0 0 1px rgba(0, 0, 0, 0.2), 0 1px 0 rgba(0, 0, 0, 0.2);
	-webkit-transition: all 1s ease;
	-moz-transition: all 1s ease;
	-o-transition: all 1s ease;
	transition: all 1s ease;
}
a.animated-button:link:after, a.animated-button:visited:after {
	content: "";
	position: absolute;
	height: 0%;
	left: 50%;
	top: 50%;
	width: 150%;
	z-index: -1;
	-webkit-transition: all 0.75s ease 0s;
	-moz-transition: all 0.75s ease 0s;
	-o-transition: all 0.75s ease 0s;
	transition: all 0.75s ease 0s;
}
a.animated-button:link:hover, a.animated-button:visited:hover {
	color:#330033;
	text-shadow: none;
}
a.animated-button:link:hover:after, a.animated-button:visited:hover:after {
	height: 450%;
}
a.animated-button:link, a.animated-button:visited {
	position: relative;
	display: block;
	margin: 30px auto 0;
	padding: 25px 40px;
	color:  #3d004d;
	font-size:14px;
	border-radius: 0;
	font-weight: bold;
	text-align: center;
	text-decoration: none;
	text-transform: uppercase;
	overflow: hidden;
	letter-spacing: .08em;
	text-shadow: 0 0 1px rgba(0, 0, 0, 0.2), 0 1px 0 rgba(0, 0, 0, 0.2);
	-webkit-transition: all 1s ease;
	-moz-transition: all 1s ease;
	-o-transition: all 1s ease;
	transition: all 1s ease;
}

</style>
<div class="nav">
    <!--Left part of nav bar-->
    
    <div style="float:left; margin-left: 10px; margin-right: -60px; margin-top: 28px ">  <a href="firstpage.php"> <img class="jmlog" src="Images/cocomed2.png" height="50px" width="320px" href="firstpage.php" style="margin-right:30px; margin-top:-15px;" id="jmlogo"></a></div>
    
    <div style="float:left;">
        <ul style=" margin-top: 4px;" class="topnav">
            <li>   
                <a href="logout.php" class="underline hide product"> Log Out</a> &nbsp; &nbsp; &nbsp;
               
            </li>
        </ul>
    </div>
    
    <div class="dropdown" style="float:right;visibility:hidden;">
      <img class="dropbtn" src="Images/sidemenu.png" height="40px" width="40px">
      <div class="dropdown-content">
        <div class="show-on">
        <a href="logout.php" class="underline"> Log Out </a>
       
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
    

<!-- The Modal -->

    
        </div>  
      
    </div>
        
      
    <div class="footer-div">
    <!--Left div-->
   
    
  
        <p style="float:right;font-size:14px; font-family: 'Josefin Sans', sans-serif; color:white; margin-top: 0px;">						Copyright &#169; 2017 &nbsp; Cocomed Albania - T&euml; gjitha t&euml; drejtat e rezervuara.</p>


</div>   
             <!-- Ad