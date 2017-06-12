<?php
session_start();
    include('classes/crudp.class.php');
  include ('classes/user.class.php');
	
	include('classes/product.class.php');
    include ('classes/validation.class.php');
                 
                   
    $crudp = new Crudp();

	$username=$_SESSION['loginuser'];

              $result=$crudp->isAdmin($username);

  

          
    $categories = $crudp->readSupermarket();



?>



<html lang="en">


    
       <head>
    <title>
 Cocomed 
    </title>

        
         <link rel="icon" href="Images/smallogo.png">
        
        <link href="Fonts/Amaranth.css" media="all" rel="stylesheet" type="text/css" />
        <link href="Fonts/Josefin.css" media="all" rel="stylesheet" type="text/css" />
        <link href="Fonts/Stalemate.css" media="all" rel="stylesheet" type="text/css" />
        <link href="style.css" media="all" rel="stylesheet" type="text/css" />
        <!--<script src="emriifile" type="text/javascript"></script>-->
    
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

<!--<script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/D15CB9ED-5B19-FC41-99E7-5E746D990985/main.js" charset="UTF-8"></script> ----></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
        function showProducts(name){
            
            
            $.ajax({
                type: "POST",
                url: "InventorySupermarket.php",
                data: {'name' : name},
                
                success: function(result){
                    $("#products").html(result);
                }
            });
            
        }
    </script>
    
    
<style>
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
        background-image: url(Images/black.jpg);
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
    .feature_divider {
    border: solid 2px;
    display: block;
    width: 70px;
    margin: 25px auto;
    border-color: #808080;
     
    }
      body {
        background-color: #151823;
        margin: 0;
    }
    .left-div1 {
  
    position: fixed;
    text-align: center;
    color: #5b5b5a;
    margin-top: 500px;
    }

    .button {
      flex: 1 1 auto;
      margin: 10px;
      padding: 20px;
      border: 2px solid #f7f7f7;
      text-align: center;
      text-transform: uppercase;
      position: relative;
      overflow:hidden;
      transition: .3s;
      color: #f7f7f7;
      font-family: 'Lato', sans-serif;
      font-weight: 300;
     }
    
    @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css);
    @import url(http://fonts.googleapis.com/css?family=Lato:300,400,700);
    
    a.animated-button.victoria-four {
	border: 2px solid #1C9C47;
    }
    a.animated-button.victoria-four:after {
        background: #1C9C47;
        opacity: .5;
        -moz-transform: translateY(-50%) translateX(-50%) rotate(90deg);
        -ms-transform: translateY(-50%) translateX(-50%) rotate(90deg);
        -webkit-transform: translateY(-50%) translateX(-50%) rotate(90deg);
        transform: translateY(-50%) translateX(-50%) rotate(90deg);
    }
    a.animated-button.victoria-four:hover:after {
        opacity: 1;
        height: 600% !important;
    }
    /* Global Button Styles */
a.animated-button:link, a.animated-button:visited {
	position: relative;
	display: block;
	margin: 30px auto 0;
	padding: 25px 40px;
	color: #fff;
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
	color: #FFF;
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
	color: #fff;
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
     /* Modal Here */
      .modal1 {
        visibility: hidden; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background:  rgba(17, 17, 17, 0.85);
    }

    /* Modal Content */
    .modal-content1 {
        position: relative;
        background-color: #fefefe;
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
        to {top:0; opacity:1}
    }

    @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }

    /* The Close Button */
    .close1 {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close1:hover,
    .close1:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
    
    .close2 {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close2:hover,
    .close2:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
      .close3 {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close3:hover,
    .close3:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
    
    .modal-header1 {
        background: gray;
        padding: 2px 16px;
        color: white; 
    }

    .modal-body1 {
        background-color: gray;
        padding: 2px 16px;
        height: 350px;
    }

</style>
    
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<body>
   
    
    <div style="margin-top:100px;">
            <div style="margin:auto;text-align:center;">
                <h1 style="color:white;font-family: 'Josefin Sans', sans-serif;">Inventory</h1>
                <div class="feature_divider"></div>
                <p style="text-align: center; font-family: 'Josefin Sans', sans-serif;font-size: 18px;color: white;">
                Products according to supermarkets.<br>
           
                
            </div>
            <div>
                
                <table style="margin-left:10px;">
                  <thead>
                    <tr style=" color: #f7f7f7;font-family: 'Lato', sans-serif;font-weight: 300;text-transform: uppercase;"><th>Supermarket Id</th></tr>
                    <div class="left-div1">
                      <?php
                        
                      foreach($categories as $category){
                              //     
                      echo '<tr><td>';
                      //echo '<div class="button" onclick="showProducts(\'' . $category['category']  . '\')">' . $category['category'] . '</div>';
                          
                      echo   '<div onclick="showProducts(\'' . $category['SupermarketId']  . '\')"> <a href="#" class="animated-button victoria-four">' . $category['SupermarketId'] . '</a> </div>';
                      echo '</td>';
                      echo '</tr>';
                      }    
                        
                     ?>
                      </div>
                  </thead>
                  <tbody>
                 
                    </tbody>
            </table>
                <div id="products" style="width: 80%;float: right;margin-top: -230px;"></div>
        </div>
        
    </div> 
    
    
       <button type="button" name="Back" class="myButton" onClick="document.location.href='InvManager.php'">Back
        </button>
  </body>
    
    <style>
        .prod_div{
            color:white;
        }
    </style>
</html>