<?php
session_start();
    include('classes/crudp.class.php');
	
    include ('classes/validation.class.php');
	$crudp= new Crudp();
 $username=$_SESSION['loginuser'];

              $result=$crudp->isAdmin($username);




         

    foreach ($result as $row){ 
            $time= $row['date']; 
         }

         $result1 = $crudp-> readRequests();
 
?>


<!DOCTYPE html>
<html lang="en">
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

   <script>

        function deleteItem(id){
            $.ajax({
                url: 'updateOrder.php',
                type: 'POST',
                data: {'id': id},

                success: function(){
                window.location = "CheckRequests.php";
                }

            });
        }
    
    
    
    </script>
    
    
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
        background-color:	 #cccccc; /* Fallback color */
        background-image: url(Images/vieword_back.jpg); 
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: white;
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
        height: auto;
    }
        
   .myButton {
	-moz-box-shadow: 0px 10px 14px -7px #276873;
	-webkit-box-shadow: 0px 10px 14px -7px #276873;
	box-shadow: 0px 10px 14px -7px #276873;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05,  #bfbfbf), color-stop(1,  #bfbfbf));
	background:-moz-linear-gradient(top,  #bfbfbf 5%,  #bfbfbf 100%);
	background:-webkit-linear-gradient(top,  #bfbfbf 5%,  #bfbfbf 100%);
	background:-o-linear-gradient(top,  #bfbfbf 5%,  #bfbfbf 100%);
	background:-ms-linear-gradient(top,  #bfbfbf 5%,  #bfbfbf 100%);
	background:linear-gradient(to bottom,  #bfbfbf 5%,  #bfbfbf 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=' #bfbfbf', endColorstr=' #bfbfbf',GradientType=0);
	background-color: #bfbfbf;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:12px;
	font-weight:bold;
	padding:10px 25px;
	text-decoration:none;
	text-shadow:0px 1px 0px #3d768a;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05,  #bfbfbf), color-stop(1,  #bfbfbf));
	background:-moz-linear-gradient(top,  #bfbfbf 5%,  #bfbfbf 100%);
	background:-webkit-linear-gradient(top,  #bfbfbf 5%,  #bfbfbf 100%);
	background:-o-linear-gradient(top,  #bfbfbf 5%,  #bfbfbf 100%);
	background:-ms-linear-gradient(top,  #bfbfbf 5%,  #bfbfbf 100%);
	background:linear-gradient(to bottom,  #bfbfbf 5%,  #bfbfbf 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=' #bfbfbf', endColorstr=' #bfbfbf',GradientType=0);
	background-color: #bfbfbf;
}
.myButton:active {
	position:relative;
	top:1px;
}


        
    table {
            border-collapse: collapse;
            width: 100%;
            margin: auto;
         }

        th, td {
            text-align: left;
            padding: 8px;
            font-family: 'Josefin Sans', sans-serif;
            color:  #4d004d;
        }

        tr:nth-child(even){background-color: #d8d8d8;}

        th {
            background-color:  	 #ff99ff;
            color: white;
            font-family:'Stalemate',cursive;
            font-size:30px;
        }
        span#treat{
          font-style: italic;
          }
        a{
            color: #5599aa;
        }
    </style>
 <body>
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" onclick="document.location.href='InvManager.php'">&#10006;</span>
            <div style="text-align:center;">

                <p style="font-family:'Amaranth', sans-serif; padding:5px; padding-bottom:none;color:#ffccff;"> List of All Orders.</p>
                <h4 style="font-family:'Stalemate',cursive; font-size:40px; margin-top:20px;margin-bottom: 11px; color:  #ff99ff">Admin</h4>
                <hr style="width:40%;float:left; margin-top:-52px;">
                <hr style="width:40%;float:right; margin-top:-52px;">

            </div>
        </div>
          
        <div class="modal-body">
        <form action="" method="POST" style="width:80%;margin: auto;text-align:center;">
            <div style="width:80%; margin:auto; text-align:center;font-family:'Amaranth', sans-serif;color:gray;">
		    <div>
            <div>
                <table >
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Manager-Name</th>
                      <th>Request</th>
                      <th>Adress</th>
                 
                      <th>Status </th>
                    </tr>
                  </thead>
                  <tbody>
                
                    <?php
                           foreach ($result1 as $row) {   
                                echo  '<tr>';
                                echo  '<td style="width:150px;">'. $row['Date'] . '</td>';
                                echo  '<td>'. $row['ManagerName'] . '</td>';
                                echo  '<td>'. $row['Request'] . ' </td>';
                                echo  '<td>'. $row['Adress'] . ' </td>';
                        
                               

                                            if(strcmp($row['Status'], "DELIVERED") == 0)
                                                echo  '<td>   DELIVERED</td>';
                                                else{
                                                echo  '<td><button class="myButton" onclick=\'deleteItem("'. $row['ID'] .'")\' name="delete" >Deliver</button>';
                                              
                                                echo   '</td></tr>';
                                               
                            } }

                        ?>
                  </tbody>
                </table>
            </div>
            </div> 
    
            
            </div>
            
            
        </form>
            
      <div style="height:100px;"></div>
    </div> 
  </div>
</div>
      
    
    </body>   
    
</html>