<?php

include ('classes/database.class.php');

class Cruda
  
    
{ 
    private $cnt=0;
    
    
    
    private $title;
    private $insert = "INSERT INTO activities (Title,Des) VALUES (:Title,:Des)";
	private $select_query_all 	= "SELECT * FROM activities ";
    private $select	= "SELECT * FROM activities where Title=:Title ";
	private $select_query 		= "SELECT * FROM `users` WHERE username=:username";
	private $update_query 		= "UPDATE `users` SET `admin`=:admin,`name`= :name,`surname`=:surname,`username`=:username,`password`=:password,`email`=:email WHERE username=:username";
	private $delete_query 		= "DELETE FROM `users` WHERE username=:username";
	private $login				= "SELECT * FROM `users` WHERE username=:username AND password=:password" ;
	private $check = "SELECT Title FROM activites WHERE Title=:Title";
 private $deletebyTitle = "DELETE FROM activities WHERE Title=:Title ";
	 private $deleteA = "DELETE FROM activities WHERE Title=:Title ";
  private $isAdmin= "SELECT admin FROM `users` WHERE username=:username";
 
 private $searchTitle="SELECT Title,Des FROM activities WHERE Title=:Title";
 
 
		private $updatename = "UPDATE users SET Name=:Name, Surname=:Surname, username= :username,Password=:Password, Email=:Email WHERE username=:username";	
		private $updatesurname = "UPDATE users SET Name=:Name, Surname=:Surname, username= :username,Password=:Password, Email=:Email WHERE username=:username";	
	private $db_object;
	private $db;
	
	public function __construct()
	{
		$this->db_object = new Database();
		$this->db = $this->db_object->get_db();
	}
    
    
	
	public function check($title){
		$stmt = $this->db->prepare($this->check);
		$stmt->bindValue(":Title",$title,PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		$res= $stmt->fetchAll();
		return $res;
	}
	public function create($activities){
		
	

				$stmt = $this->db->prepare($this->insert);
            	$stmt->bindValue(":Title",$activities->getTitle(),PDO::PARAM_STR);
                  $stmt->bindValue(":Des",$activities->getDes(),PDO::PARAM_STR);
          
    
				
				$stmt->execute();
			
				return $return_array;
		
		}
    
     public function readAll(){
			
			$stmt=$this->db->prepare($this->select_query_all);
			
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     return $stmt->fetchAll();
     }
       
      public function show(){
         $stmt=$this->db->prepare($this->select);
			$stmt->bindValue(":Title",$title,PDO::PARAM_STR);
        
			$stmt->execute();
			$result = $stmt->execute();
                 
                            echo '<tr>';
                            echo '<td>'. $result['Title'] . '</td>';
                            echo '<td>'. $result['Des'] . '</td>';
                           
                      
                            echo '</tr>';
     
      
  
      }


  public function readAll1(){
			
			$stmt=$this->db->prepare($this->select_query_all);
			
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            foreach ($stmt->fetchAll() as $row) {
          
                            echo '<tr>';
                     $title=$row['Title'];
                    $des=$row['Des'];
          
                     echo '<td>';
                     echo ' <div> <div class="hovereffect usdivs">
                        <img class="img-responsive" src="Images/activ.jpg" alt="">
                        <div class="overlay">
                           <h2>'.$title.'</h2>';
                     echo ' <p> <a href="Activities1.php?title='.$title. '&amp des='.$des. '"> VIEW  ACTIVITY </a> </p>';
                     echo '   </div>
                    </div>
                </div>';
           //echo '<a  href="Activities1.php?des='.$row['Des'].'">click</a>';
                               //$title=$row['Title'];
       
                           
                          echo '</td>';
                          echo '</tr>';          
         	
          }    
   
  }
          
 public function deletebyTitle($title){
			$return_array = array("success"=>true,"message"=>'');
			$stmt = $this->db->prepare($this->deletebyTitle);
			$stmt->bindValue(":Title",$title,PDO::PARAM_STR);
			$stmt->execute();
		
			return $return_array;
		}
 
  public function deleteA($name){
		
			$stmt = $this->db->prepare($this->deleteA);
			$stmt->bindValue(":Title",$name,PDO::PARAM_STR);
			$stmt->execute();
	
			return $return_array;
		}
 
 
 public function searchTitle($title){
			$return_array = array("success"=>true,"message"=>'');
			$stmt = $this->db->prepare($this->searchTitle);
			$stmt->bindValue(":Title",$title,PDO::PARAM_STR);
			
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
   return $stmt->fetchAll();

			
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

 

}
?>