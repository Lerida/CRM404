<?php
session_start();
include "classes/crudp.class.php";
include "classes/product.class.php";
include "classes/validation.class.php";






                   
    $crudp = new Crudp();

	$username=$_SESSION['loginuser'];

              $result=$crudp->isAdmin($username);

  



if(isset($_POST['pname']))
{	
	$e=array();
    	$validation= new Validation();
	$name =htmlspecialchars($_POST['pname']);
	$description =htmlspecialchars ( $_POST['description']);
    $category = htmlspecialchars ($_POST['category']);
    $price =htmlspecialchars( $_POST['price']);	
  $target_dir = "../SE/Images/";
     $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $e[]= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
    
    if ($uploadOk == 0) {
 $e[]= "Sorry, your file was not uploaded.";

} else{
    
 if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $e[]="The file ". basename( $_FILES["photo"]["name"]). " has been uploaded. <br>Your product is added.";
           $Crudp = new Crudp();
                    	$product = new Product($name,$description,$category,$price,$target_file);
                    $message= $Crudp->create($product);

        } else {
            $e[]= "Sorry, there was an error uploading your file.";
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
        background-image: url(Images/makeup2.jpg);
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #e7e6e2;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 60%;
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
    border: 3px solid #5eb5ab;;
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
	-moz-box-shadow: 0px 0px 0px 2px #008080;
	-webkit-box-shadow: 0px 0px 0px 2px #008080;
	box-shadow: 0px 0px 0px 2px #008080;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #008080), color-stop(1, #1f7368));
	background:-moz-linear-gradient(top, #008080 5%, #1f7368 100%);
	background:-webkit-linear-gradient(top, #008080 5%, #1f7368 100%);
	background:-o-linear-gradient(top, #008080 5%, #1f7368 100%);
	background:-ms-linear-gradient(top, #008080 5%, #1f7368 100%);
	background:linear-gradient(to bottom, #008080 5%, #1f7368 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#008080', endColorstr='#1f7368',GradientType=0);
	background-color:#008080;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	border-radius:10px;
	border:1px solid #4e6096;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-size:19px;
    font-family: 'Josefin Sans', sans-serif;
	padding:12px 37px;
	text-decoration:none;
	text-shadow:0px 1px 0px #283966;
    }
    .myButton:hover {
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #1f7368), color-stop(1, #008080));
        background:-moz-linear-gradient(top, #1f7368 5%, #008080 100%);
        background:-webkit-linear-gradient(top, #1f7368 5%, #008080 100%);
        background:-o-linear-gradient(top, #1f7368 5%, #008080 100%);
        background:-ms-linear-gradient(top, #1f7368 5%, #008080 100%);
        background:linear-gradient(to bottom, #1f7368 5%, #008080 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1f7368', endColorstr='#008080',GradientType=0);
        background-color:#008080;
    }
    .myButton:active {
        position:relative;
        top:1px;
    }
    .uploadfile {
    color:darkcyan;
    }
        
    </style>
    
    <body>
        
        
    
      <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" onclick="document.location.href='Admin1View.php'">&#10006;</span>
            <div style="text-align:center;">

                <p style="font-family:'Amaranth', sans-serif; padding:5px; padding-bottom:none;color: #008080;"> Fill the form correctly to add a new product.</p>
                <img src="Images/kiss.png" height="50px" width="initial;" style="margin-top:-16px; margin-bottom: 11px; margin-left: -3px;">
                <hr style="width:40%;float:left; margin-top:5px;">
                <hr style="width:40%;float:right; margin-top:5px;">

            </div>
        </div>
          
        <div class="modal-body" style="">
        <form action="Addproduct.php" method="POST" style="width:90%;" enctype="multipart/form-data">
            <div style="width:80%;float:left;margin-top:-37px; font-family:'Amaranth', sans-serif;color: #008080;">
            <p>Product Name <input type="text" name="pname" size="20" placeholder="Product Name"></p>
            <p>Description <input type="text" name="description" size="100" placeholder="Description"></p>
            <p>Category <input type="text" name="category" size="20" placeholder="Category"></p>
            <p>Price<input type="text" name="price" size="20" placeholder="Price"></p>
            <p>Amount<input type="text" name="amount" size="20" placeholder="Amount"></p>
            <p>Supermarket<input type="text" name="spm" size="20" placeholder="Supermarket"></p>
            <input type="file" name="photo" id="photo" required>
            </div>
            
            <div style="width:30%; float:right;text-align:center;margin-right: -147px; margin-top:-15px; font-family:'Amaranth', sans-serif;color:white;">
		    <div style="position:absolute; color:red; top:570px; left:540px;"> <?php if (isset($_POST['submit'])) 
  
            for ($i = 0; $i < count($e); $i++) {print $e[$i];}  ?> </div>
             
            
           <p> <input type="submit" name="submit" value="Add Product "  class="myButton" style="margin-bottom: 36px; margin-left: -80px;"> </p>
            
            </div>
            
            
        </form>
        </div> 
      </div>

    </div>

    
    
    </body>
    </html>