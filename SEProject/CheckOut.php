<?php
session_start();
include "classes/validation.class.php";
include('classes/crudp.class.php');


	$validation= new Validation();
     $crud = new Crudp();
	$username=$_SESSION['loginuser'];

              $result=$crud->isAdmin($username);

  


          
     $cart = $crud->readCart();
     $total=0;

   foreach ($cart as $row) {
                           
                          $row['name'] ;
                        $row['price'] ;
                          
    $total= $total+ $row['price'];
   }


 if(isset($_POST['submit'])){
     
  $db = "crm404";

    $dbH = "localhost";
    $dbU = "root";
    $dbP = "";
    $dbCon = mysql_connect($dbH,$dbU,$dbP);
    mysql_select_db($db);


    $sql= "INSERT INTO orders(user,price,adress,date) VALUES ";

    $valuesArr = array();

    $cart =  $crud->readCart(); 
 
    $name=htmlspecialchars($row['name']);

    $user=$_SESSION['loginuser'];
    $adress=htmlspecialchars ($_POST['adress']);
    $price=htmlspecialchars($row['price']);

    $createdate= date('Y-m-d H:i:s');

    $valuesArr[] = "('$user', '$total',' $adress',' $createdate')";
  
    $sql .= implode(',', $valuesArr);
    mysql_query($sql) or exit(mysql_error()); 
    $id = mysql_insert_id();
 
    $crud->emptyCart();

    $valuesArr1 = array();
       $sql1= "INSERT INTO orderitem(orderId, itemName,price) VALUES ";
    foreach ($cart as $row) {
      
        $name=htmlspecialchars($row['name']);
        $user=$_SESSION['loginuser'];
        $adress=htmlspecialchars($_POST['adress']);
        $price=  htmlspecialchars($row['price']);
    
        $createdate= date('Y-m-d H:i:s');

        $valuesArr1[] = "('$id', '$name','  $price')";

      
        
    }

  $sql1 .= implode(',', $valuesArr1);
    
        mysql_query($sql1) or exit(mysql_error());   
   echo '<a href="pdf.php?id='.$id.'"target="_blank" ><img src="Images/print_icon.png" style="width:35px;height:35px;padding-left:50px;"></a>'; echo " "; echo "<br>"; 
                                                echo   '</td></tr>';


}

 

?>



<html>
    <head>
       
    <title>
 Cocomed
    </title>

        
        <link rel="icon" href="Images/smallogo.png">
         <link href="Fonts/Josefin.css" media="all" rel="stylesheet" type="text/css" />
    </head>
    <style>
        .view{
            padding: 40px;
            border: 1px solid #1C9C47;
            margin:auto;
            width:40%;
            height:auto;
            background-color: white;
            margin-top: 100px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            font-family: 'Josefin Sans', sans-serif;
        }
        th, td {
            text-align: left;
            padding: 8px;
            font-family: 'Josefin Sans', sans-serif;
        }
         input[type=text], select {
        width: 30%;
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
        .myButton {
        -moz-box-shadow: 0px 10px 14px -7px #ff99ff;
        -webkit-box-shadow: 0px 10px 14px -7px #ff99ff;
        box-shadow: 0px 10px 14px -7px #ff99ff;
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05,    #ffccff), color-stop(1,  #ff80ff));
        background:-moz-linear-gradient(top,    #ffccff 5%,  #ff80ff 100%);
        background:-webkit-linear-gradient(top,    #ffccff 5%,  #ff80ff 100%);
        background:-o-linear-gradient(top,    #ffccff 5%,  #ff80ff 100%);
        background:-ms-linear-gradient(top,    #ffccff 5%,  #ff80ff 100%);
        background:linear-gradient(to bottom,    #ffccff 5%,  #ff80ff 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='   #ffccff', endColorstr=' #ff80ff',GradientType=0);
        background-color:   #ffccff;
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
        padding: 5px 32px;
        text-decoration:none;
        text-shadow:0px 1px 0px #ff99ff;
        width: 30%;

        }
        .myButton:hover {
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05,  #ff80ff), color-stop(1,    #ffccff));
            background:-moz-linear-gradient(top,  #ff80ff 5%,    #ffccff 100%);
            background:-webkit-linear-gradient(top,  #ff80ff 5%,    #ffccff 100%);
            background:-o-linear-gradient(top,  #ff80ff 5%,    #ffccff 100%);
            background:-ms-linear-gradient(top,  #ff80ff 5%,    #ffccff 100%);
            background:linear-gradient(to bottom,  #ff80ff 5%,    #ffccff 100%);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=' #ff80ff', endColorstr='   #ffccff',GradientType=0);
            background-color: #ff80ff;
        }
        .myButton:active {
            position:relative;
            top:1px;
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
        width: 25%;
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
    
    .modal-header1 {
        background: gray;
        padding: 2px 16px;
        color: white; 
    }

    .modal-body1 {
        font-family: 'Josefin Sans', sans-serif;
        font-size: x-large;
        text-align: center;
        background-color: gray;
        padding: 2px 16px;
        height: 150px;
    }
    </style>

    <body style="background-image: url(Images/userback.png);background-size:cover; background-color:#ffe6e6">
    <div class="view"> 
    <label style="color: #ffb3ff;font-size:14px;font-weight: bold;text-align: center;text-transform: uppercase;">List of All Products </label> <br>
    <table >
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
    <?php 
         foreach ($cart as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . ' </td>';
                            echo '<td>'. $row['price'] . ' </td>';
                       
                            echo '</tr>';
                           
   }
   echo '<tr><td style="color:#ff99ff;font-weight: bold;">TOTAL</td><td style="border-top: 1px solid 	 #ffb3ff;">'.$total. '.00 ALL </td></tr>';  
        
    ?>
        </tbody>
        </table>
    <form method="post" style="margin-top:50px;">
    
    <input type="text"  name="adress" placeholder="Adress" required />
    <input  class="myButton" type="submit" id="sub" name="submit" placeholder="submit" required />
        <button  class="myButton"  onClick="document.location.href='MakeOrder.php'" style="">Back to Order</button>

    
    </form>
    </div>
    
        <!-- The Modal -->
    <div id="myModal1" class="modal1">

      <!-- Modal content -->
      <div class="modal-content1">
        <div class="modal-header1">
          <span class="close1">&#10006;</span>
          </div>
        
          
        <div class="modal-body1" style="">
        Your order is submitted! <br>
        You will be notified about delivery.
        <button class="myButton" onClick="document.location.href='User1page.php'" >ok</button>
        </div>
      </div>

   </div>
    
    </body>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


<script type="text/javascript" language="javascript">
    
    
         // Get the modal
           // Get the modal
    var mod = document.getElementById('myModal1');
    
    // Get the button that opens the modal
    var button = document.getElementById("mybtn");

    // Get the <span> element that closes the modal
    var span1 = document.getElementsByClassName("close1")[0];

  //  var sub=document.getElementById("sub");
    
    // When the user clicks the button, open the modal 
    button.onclick = function() {
        mod.style.visibility = "visible";
    }

    // When the user clicks on <span> (x), close the modal
    span1.onclick = function() {
        mod.style.visibility = "hidden";
    }
    
  //  sub.onclick =function(){
  //      button.style.visibility="visible";
  //  }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == mod) {
            mod.style.visibility = "hidden";
        }
    }
    
</script> 

</html>