<?php

include ('classes/database.class.php');
include ('classes/crud.interface.php');

class Crud 
{    private $username;
    private $insert = "INSERT INTO users (Admin,Name,Surname,Username,password,Email) VALUES ('2',:Name,:Surname,:username,:password,:Email)";
    private $insertR = "INSERT INTO requests (Date,Request,ManagerName,Adress) VALUES (:Date,:Request,:ManagerName,:Adress)";
	private $select_query_all 	=  'SELECT * FROM users ';
	private $select_query 		= "SELECT * FROM `users` WHERE username=:username";
	private $user		= "SELECT * FROM `users` WHERE username=:username";
	private $update_query 		= "UPDATE `users` SET `admin`=:admin,`name`= :name,`surname`=:surname,`username`=:username,`password`=:password,`email`=:email WHERE username=:username";
	private $delete_query 		= "DELETE FROM `users` WHERE username=:username";
	private $login	= "SELECT * FROM `users` WHERE username=:username AND password=:password" ;
	private $check = "SELECT Username FROM users WHERE Username=:username";
    private $deletebyname = "DELETE FROM users WHERE Name=:Name ";
    private $deletebyusername = "DELETE FROM users WHERE username=:username ";
	private $searchName="SELECT Name,Surname,Username,password,Email  FROM users WHERE Name=:Name";
    private $updatename = "UPDATE users SET Name=:Name, username= :username WHERE username=:username";	
    private $updatesurname = "UPDATE users SET  Surname=:Surname  WHERE username=:username";
    private $updatepassword = "UPDATE users SET Password=:Password WHERE username=:username";
    private $updateemail = "UPDATE users SET Email=:Email WHERE username=:username";
	private $isAdmin= "SELECT admin FROM `users` WHERE username=:username";
 private $updateall = "UPDATE users SET Name=:Name, Surname=:Surname, username= :username,Password=:Password, Email=:Email WHERE username=:username";

 private $db_object;
	private $db;
	
	public function __construct()
	{
		$this->db_object = new Database();
		$this->db = $this->db_object->get_db();
	}
    
    
	
	
	public function create($user){
		$return_array = array("success"=>true,"message"=>'');
		
		$user->setPassword(md5($user->getPassword()));
		
		if ($return_array['success']){

				$stmt = $this->db->prepare($this->insert);
            	$stmt->bindValue(":Name",$user->getName(),PDO::PARAM_STR);
            $stmt->bindValue(":Surname",$user->getSurname(),PDO::PARAM_STR);
            $stmt->bindValue(":username",$user->getUserName(),PDO::PARAM_STR);
            $stmt->bindValue(":password",$user->getPassword(),PDO::PARAM_INT);
            $stmt->bindValue(":Email",$user->getEmail(),PDO::PARAM_STR);
				$stmt->execute();
			
				return $return_array;
			}
			else {
			
				return $return_array;
			}
		
		}
 
 public function createReq($date,$coment,$adress,$name){
		$return_array = array("success"=>true,"message"=>'');
		
		
		


				$stmt = $this->db->prepare($this->insertR);
            	$stmt->bindValue(":Date",$date,PDO::PARAM_STR);
            $stmt->bindValue(":Request",$coment,PDO::PARAM_STR);
            $stmt->bindValue(":ManagerName",$name,PDO::PARAM_STR);
            $stmt->bindValue(":Adress",$adress,PDO::PARAM_STR);
           
				$stmt->execute();
			
				return $return_array;
	
		
		}
 
    public function check($username){
		$stmt = $this->db->prepare($this->check);
		$stmt->bindValue(":username",$username,PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		$res= $stmt->fetchAll();
		return $res;
	}
    
    public function updateName($name,$username){
			$return_array = array("success"=>true,"message"=>'');

			$stmt = $this->db->prepare($this->updatename);
		$stmt->bindValue(":Name",$name,PDO::PARAM_STR);
			
        $stmt->bindValue(":username",$username,PDO::PARAM_STR);
		
			
			$stmt->execute();

			$return_array['message']="Customer with Username = ".$username."  is updated. <br> Your new name is : " .$name;"";
     
			return $return_array['message'];
		}
 
 
 
    public function updateSrName($surname,$username){
			$return_array = array("success"=>true,"message"=>'');
            $stmt = $this->db->prepare($this->updatesurname);
		
			$stmt->bindValue(":Surname",$surname,PDO::PARAM_STR);
            $stmt->bindValue(":username",$username,PDO::PARAM_STR);
		
			$stmt->execute();
    
			$return_array['message']="Customer with Username = ".$username." is updated.<br> Your new Surname is : " .$surname;"";
        return $return_array['message'];
		}
 
        public function updatePass($password,$username){
			$return_array = array("success"=>true,"message"=>'');
            $pass=md5($password);
		
			$stmt = $this->db->prepare($this->updatepassword);
			
			
            $stmt->bindValue(":username",$username,PDO::PARAM_STR);
			$stmt->bindValue(":Password", $pass,PDO::PARAM_STR);
		
			
			$stmt->execute();
   
			$return_array['message']="Customer with Username = ".$username." is updated. <br> Your new Password is : " .$password;"";
       
			return $return_array['message'];
		}
 
        public function updateEmail($email,$username){
			$return_array = array("success"=>true,"message"=>'');

		
			$stmt = $this->db->prepare($this->updateemail);
		  $stmt->bindValue(":username",$username,PDO::PARAM_STR);
			
			$stmt->bindValue(":Email",$email,PDO::PARAM_STR);
			
			
			$stmt->execute();
       
       
			$return_array['message']="Customer with Username= ".$username." is updated.<br> Your new E-Mail is : " .$email;"";
        
			return $return_array['message'];
		}
 
 
  public function updateAll($user,$name){
			$return_array = array("success"=>true,"message"=>'');
$user->setPassword(md5($user->getPassword()));
			$stmt = $this->db->prepare($this->updateall);
			
		
			$stmt->bindValue(":Name",$user->getName(),PDO::PARAM_STR);
			$stmt->bindValue(":Surname",$user->getSurname(),PDO::PARAM_STR);
        $stmt->bindValue(":username",$user->getUserName(),PDO::PARAM_INT);
			$stmt->bindValue(":Password",$user->getPassword(),PDO::PARAM_STR);
			$stmt->bindValue(":Email",$user->getEmail(),PDO::PARAM_STR);
			
		
			$stmt->execute();
        $name1=$user->getName();
			$return_array['message']="Customer with Username = ".$name." is updated.";
        
			return $return_array['message'];
		}
 

 public function isAdmin($username){
		
			$stmt = $this->db->prepare($this->isAdmin);
			$stmt->bindValue(":username",$username,PDO::PARAM_STR);
			
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($stmt->fetchAll()==0){
            return true;
            
        }
            
    else 
		 return false;
		}
 
 
  public function isAdmin1($username){
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
 
 
 public function deletebyName($name){
			$return_array = array("success"=>true,"message"=>'');
			$stmt = $this->db->prepare($this->deletebyname);
			$stmt->bindValue(":Name",$name,PDO::PARAM_STR);
			
			
			$stmt->execute();
		
       
			return $return_array;
		}
 
  public function DeleteUser($username){
			$return_array = array("success"=>true,"message"=>'');
			$stmt = $this->db->prepare($this->deletebyusername);
			$stmt->bindValue(":username",$username,PDO::PARAM_STR);
			
			
			$stmt->execute();
			
			return $return_array;
		}
 
 public function readAll(){
			
			$stmt=$this->db->prepare($this->select_query_all);
		
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 return $stmt->fetchAll() ;
 
     
		}
 
 
 public function searchName($name){
			
			$stmt = $this->db->prepare($this->searchName);
			$stmt->bindValue(":Name",$name,PDO::PARAM_STR);
			
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
  
 
 return $stmt->fetchAll();
 
 }
 
  public function readUser($user){
			
			$stmt = $this->db->prepare($this->user);
			$stmt->bindValue(":username",$user,PDO::PARAM_STR);
			
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
  
 
 return $stmt->fetchAll();
 
 }
	
	
	public function update($user, $username)
	{
		$get_user = $this->read($username);
		
		$update_user = new User("", "", "", "","","");
		
		$validation = new Validation();
		
		$return_array = array(
			"success" => true,
			"message" => ""
		);
	
		//validate
		if(!isEmpty($user->getUserName()) or $user->getUserName() !== "")
		{
			if($validation->username($user->getUserName()))
			{
				$update_user->setUserName($user->getUserName);
			}
			else
			{
				$return_array['success'] = false;
				$return_array['message'] = $validation->get_username_criteria();
			}
		}
		else
		{
			$update_user->setUserName($getUser[0]['username']);
		}
		
		if(!isEmpty($user->getPassword()) or $user->getPassword() !== "")
		{
			if($validation->password($user->getPassword()))
			{
				$update_user->setPassword( md5($user->getPassword) );
			}
			else
			{
				$return_array['success'] = false;
				$return_array['message'] = $validation->get_password_criteria();
			}
		}
		else
		{
			$update_user->setPassword($getUser[0]['password']);
		}
		
		$update_user->setLevel($user->getLevel());
		
		//update
		if($return_array['success'])
		{
			$stmt = $this->db->prepare($this->update_query);
			$stmt->bindValue(":username", $update_user->getUsername(), PDO::PARAM_STR);
			$stmt->bindValue(":password", $update_user->getPassword(), PDO::PARAM_STR);
			$stmt->bindValue(":level", $update_user->getLevel(), PDO::PARAM_INT);
			$stmt->bindValue(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
			
			return $return_array;
		}
		else
		{
			return $return_array;
		}
	}
	
	public function delete($id)
	{
		$stmt = $this->db->prepare($this->delete_query);
		$stmt->bindValue(":id", $id, PDO::PARAM_INT);
		$stmt->execute();
		return true;
	}
	public function login($user)
	{
		$stmt = $this->db->prepare($this->login);
		   $stmt->bindValue(":username",$user->getUserName(),PDO::PARAM_STR);
            $stmt->bindValue(":password",$user->getPassword(),PDO::PARAM_STR);
		$stmt->execute();
		return true;
	}

 
 public function read($id=-1)
	{
		if($id == -1)
		{
			$stmt = $this->db->prepare($this->select_query_all);
			$stmt->execute();
			
			$read_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $read_users;
		}
		else
		{
			$stmt = $this->db->prepare($this->select_query);//check 
			$stmt->bindValue(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
			
			$read_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $read_users;
		}
	}
	
}
