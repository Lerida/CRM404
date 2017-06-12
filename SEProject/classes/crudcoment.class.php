<?php

include ('classes/database.class.php');
include ('classes/user.class.php');

class Crudcoment
     
   
{ 
    private $insert = "INSERT INTO coments (date,coment,rate) VALUES (:date,:coment,:rate)";
	private $select_query_all 	= "SELECT * FROM coments ";
 private $searchUsername="SELECT Name,Surname,Username,password,Email  FROM users WHERE username=:username";
     private $isAdmin= "SELECT admin FROM `users` WHERE username=:username";
	private $db_object;
	private $db;
	
	public function __construct()
	{
		$this->db_object = new Database();
		$this->db = $this->db_object->get_db();
	}
    
    

	public function create($coments){
		$return_array = array("success"=>true,"message"=>'');
		
		
		
		if ($return_array['success']){

				$stmt = $this->db->prepare($this->insert);
            	$stmt->bindValue(":date",$coments->getTimee(),PDO::PARAM_STR);
                  $stmt->bindValue(":coment",$coments->getComent(),PDO::PARAM_STR);
                  $stmt->bindValue(":rate",$coments->getRate(),PDO::PARAM_STR);
    
            
				
				$stmt->execute();
				$return_array['message']="Thank you for your feedback!";
				return $return_array;
			}
			else {
			
				return $return_array;
			}
		
		}
    
      public function isAdmin($username){
    $admin=0;
			$return_array = array("success"=>true,"message"=>'');
			$stmt = $this->db->prepare($this->isAdmin);
			$stmt->bindValue(":username",$username,PDO::PARAM_STR);
			
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($stmt->fetchAll() as $row) {
                          
                            $admin= $row['admin'];
                              
                             
		}
          return  $admin;
	}

    
     public function readAll(){
			
			$stmt=$this->db->prepare($this->select_query_all);
			
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
      foreach ($stmt->fetchAll() as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['date'] . '</td>';
                            echo '<td>'. $row['coment'] . '</td>';
                            echo '<td>'. $row['rate'] . '</td>';
                  
                            echo '</tr>';
     
		
     
		}
     }
      public function showUsername($username){
			$return_array = array("success"=>true,"message"=>'');
			$stmt = $this->db->prepare($this->searchUsername);
			$stmt->bindValue(":username",$username,PDO::PARAM_STR);
			
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     

 return $stmt->fetchAll();
 
 }
	
       
    
}
?>