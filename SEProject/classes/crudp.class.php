<?php

include ('classes/database.class.php');

class Crudp
{    private $name;
      private $insert = "INSERT INTO products(name,description,category,Price,photo) VALUES (:name,:description,:category,:Price,:photo)";
 
 
      private $add = "INSERT INTO cart(name,price,user) VALUES (:name,:price,:user)";
      private $addamt = "UPDATE products SET amount=:amount WHERE name=:name";
      private $emptycart = "DELETE FROM `cart` ";
      private $insertorder= "INSERT INTO orders(user,name,price,adress) VALUES (:user,:name,:price,:adress)";
	private $select_query_all 	= "SELECT * FROM products ";
	private $select_cart 	= "SELECT * FROM cart ";
	private $select_coments 	= "SELECT * FROM `coments` ";
 private $select_query_all1 	= "SELECT DISTINCT `category`FROM products ";
 private $select_query_all2 	= "SELECT DISTINCT `SupermarketId`FROM products ";
	private $select_query 		= "SELECT * FROM `users` WHERE username=:username";
	private $update_query 		= "UPDATE `users` SET `admin`=:admin,`name`= :name,`surname`=:surname,`username`=:username,`password`=:password,`email`=:email WHERE username=:username";
	private $delete_query 		= "DELETE FROM `users` WHERE username=:username";
	private $deleteorder 		= "DELETE FROM `orders` WHERE orderid=:id ";
	private $selectAll		= "SELECT * FROM `orders` ";
 	private $selectAllUsers		= "SELECT * FROM `users` WHERE admin='1' ";
	private $selectAllReq		= "SELECT * FROM `requests` ";
	private $userorder		= "SELECT * FROM `orders` WHERE user=:user";
	private $selectAll1		= "SELECT * FROM `orders` limit 1";
	private $login				= "SELECT * FROM `users` WHERE username=:username AND password=:password" ;
	private $check = "SELECT Name FROM products WHERE name=:name";
 private $deletebyname = "DELETE FROM products WHERE name=:name ";
 private $deleteP = "DELETE FROM products WHERE name=:name ";
	private $searchName="SELECT name,description,category,Price FROM products WHERE name=:name";
		private $updatename = "UPDATE users SET Name=:Name, Surname=:Surname, username= :username,Password=:Password, Email=:Email WHERE username=:username";	
		private $updatesurname = "UPDATE users SET Name=:Name, Surname=:Surname, username= :username,Password=:Password, Email=:Email WHERE username=:username";
 	private $select_product 		= "SELECT * FROM products WHERE category=:category";
 	private $select_productS 		= "SELECT * FROM products WHERE SupermarketId=:SupermarketId";
 	private $printorder		= "SELECT * FROM `orderitem` WHERE `orderId`= :id";
 	private $printwages		= "SELECT * FROM `hours` WHERE `UserId`= :UserId";
 private $isAdmin= "SELECT admin FROM `users` WHERE username=:username";
	private $db_object;
	private $db;
	
	public function __construct()
	{
		$this->db_object = new Database();
		$this->db = $this->db_object->get_db();
	}
    
    
 public function readCategory(){
			
			$stmt=$this->db->prepare($this->select_query_all1);
			
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            

//      foreach ($stmt->fetchAll() as $row) {
//         
//                            echo '<tr>';
//                    $cat=$row['category'];
//                     //$name=$row['name'];
//          
//                     echo '<td>';
//                           echo '<button><a href="ProductList.php?category='.$cat.'">' .$cat.'</a></button>';
//           //echo '<a  href="Activities1.php?des='.$row['Des'].'">click</a>';ours
//          
//                               //$title=$row['Title'];
//       
//                           
//                          echo '</td>';
//                                
//        
//                            echo '</tr>';
//   
//                  
//      }
     
            $return_arr = $stmt->fetchAll();
     
     return $return_arr;
          }
 
 public function readSupermarket(){
			
			$stmt=$this->db->prepare($this->select_query_all2);
			
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            

            $return_arr = $stmt->fetchAll();
     
     return $return_arr;
          }
 
 
 public function readBySupermarket($SupermarketId){
			
			$stmt=$this->db->prepare($this->select_productS);
			
		$stmt->bindValue(":SupermarketId",$SupermarketId,PDO::PARAM_STR);
		$stmt->execute();
            
        
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		
            
        $return = $stmt->fetchAll();
      
      return $return;
      
 
  }
 
 
 
  public function readByCategory($category){
			
			$stmt=$this->db->prepare($this->select_product );
			
		$stmt->bindValue(":category",$category,PDO::PARAM_STR);
		$stmt->execute();
            
        
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		
            
        $return = $stmt->fetchAll();
      
      return $return;
      
 
  }
 
 
	
	public function check($name){
		$stmt = $this->db->prepare($this->check);
		$stmt->bindValue(":name",$name,PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		$res= $stmt->fetchAll();
		return $res;
	}
	public function create($product){
		$return_array = array("success"=>true,"message"=>'');
		
		//$user->setPassword(md5($user->getPassword()));
		
		if ($return_array['success']){

				$stmt = $this->db->prepare($this->insert);
            	$stmt->bindValue(":name",$product->getName(),PDO::PARAM_STR);
            $stmt->bindValue(":description",$product->getDescription(),PDO::PARAM_STR);
            $stmt->bindValue(":category",$product->getCategory(),PDO::PARAM_STR);
            $stmt->bindValue(":Price",$product->getPrice(),PDO::PARAM_STR);
            $stmt->bindValue(":photo",$product->getPhoto(),PDO::PARAM_STR);
				$stmt->execute();
			
				return $return_array;
			}
			else {
			
				return $return_array;
			}
		
		}
 
 public function order($username,$name,$price,$adress){
		$return_array = array("success"=>true,"message"=>'');
		
		
		
		if ($return_array['success']){

				$stmt = $this->db->prepare($this->insertorder);
            	$stmt->bindValue(":user",$username,PDO::PARAM_STR);
            	$stmt->bindValue(":name",$name,PDO::PARAM_STR);
           
    
            $stmt->bindValue(":price",$price,PDO::PARAM_INT);
     	$stmt->bindValue(":adress",$adress,PDO::PARAM_STR);
  
				$stmt->execute();
				
				return $return_array;
			}
			else {
			
				return $return_array;
			}
		
		}
 
 
 
 public function cart($name,$price,$user){
		$return_array = array("success"=>true,"message"=>'');
		
		
		
		if ($return_array['success']){

				$stmt = $this->db->prepare($this->add);
            	$stmt->bindValue(":name",$name,PDO::PARAM_STR);
            	$stmt->bindValue(":user",$user,PDO::PARAM_STR);
    
            $stmt->bindValue(":price",$price,PDO::PARAM_INT);
    
  
				$stmt->execute();
				
				return $return_array;
			}
			else {
			
				return $return_array;
			}
		
		}
  public function amount($amount,$name){
		$return_array = array("success"=>true,"message"=>'');
		
		
		
		if ($return_array['success']){

				$stmt = $this->db->prepare($this->addamt);
            	$stmt->bindValue(":amount",$amount,PDO::PARAM_INT);
            	$stmt->bindValue(":name",$name,PDO::PARAM_STR);
            	
    	$stmt->execute();
				
				return $return_array;
			}
			else {
			
				return $return_array;
			}
		
		}
  public function emptyCart(){
			
			$stmt = $this->db->prepare($this->emptycart);
			
			
			
			$stmt->execute();
			
			
		}
 
 
 
  public function readCart(){
			
			$stmt=$this->db->prepare($this->select_cart);
			
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
         return $stmt->fetchAll();
      
      
 
 }
  public function printOrder($id){
     
 
			
			$stmt=$this->db->prepare($this->printorder);
				$stmt->bindValue(":id",$id,PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    
return $stmt->fetchAll() ;
}
 
      
    
  public function printWages($id){
     
 
			
			$stmt=$this->db->prepare($this->printwages);
				$stmt->bindValue(":UserId",$id,PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    
return $stmt->fetchAll() ;
}
 
 
 public function readOrders1(){
     
     $stmt1=$this->db->prepare($this->selectAll1);
     	$stmt1->execute();
     $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 
     
     return $stmt1->fetchAll();
     
 }
 
 
 
  public function readUsers(){
     
     $stmt1=$this->db->prepare($this->selectAllUsers);
     	$stmt1->execute();
     $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 
     
     return $stmt1->fetchAll();
     
 }
 
    public function readOrders(){
			
			$stmt=$this->db->prepare($this->selectAll);
			
			
			$stmt->execute();
		
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
			
       
            $returnArr =  $stmt->fetchAll(); 
            
            foreach($returnArr as $key=>$order){
                    $id = $order['orderid'];
                    $stmt1=$this->db->prepare("SELECT * FROM `orderitem` WHERE `orderId`= :orderId DESC LIMIT 1");
                    $stmt1->bindValue(":orderId", $id,PDO::PARAM_INT);

                    $stmt1->execute();
                    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 
                    $returnArr[$key]['items'] =  $stmt1->fetchAll();    
            }
       
         // $cnt1=0; strtotime
       return $returnArr;
    }
 
 
  public function readRequests(){
			
			$stmt=$this->db->prepare($this->selectAllReq);
			
			
			$stmt->execute();
		
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
			
       
            $returnArr =  $stmt->fetchAll(); 
            
          
       return $returnArr;
    }
 
     
 public function readuserOrders($username){
			
			$stmt=$this->db->prepare($this->userorder);
			
			$stmt->bindValue(":user", $username,PDO::PARAM_STR);
			$stmt->execute();
		
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
			
       
            $returnArr =  $stmt->fetchAll(); 
            
            foreach($returnArr as $key=>$order){
                    $id = $order['orderid'];
                    $stmt1=$this->db->prepare("SELECT * FROM `orderitem` WHERE `orderId`= :orderId");
                    $stmt1->bindValue(":orderId", $id,PDO::PARAM_INT);

                    $stmt1->execute();
                    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 
                    $returnArr[$key]['items'] =  $stmt1->fetchAll();    
            }
       
         // $cnt1=0; strtotime
       return $returnArr;
    }
     
 
 

      
       public function deleteOrder($id){
			$return_array = array("success"=>true,"message"=>'');
			$stmt = $this->db->prepare($this->deleteorder);
			$stmt->bindValue(":id",$id,PDO::PARAM_INT);
		
			
			$stmt->execute();
			//$return_array['message']="Successfully Deleted the Product with Name = ".$name."";
             echo $return_array['message'];
			return $return_array;
		}
 
 
 
       public function updateOrder($id){
			$return_array = array("success"=>true,"message"=>'');
			$stmt = $this->db->prepare("UPDATE `orders` SET status=:status WHERE orderid=:id");
			$stmt->bindValue(":id",$id,PDO::PARAM_INT);
            $status = "DELIVERED";
            $stmt->bindValue(":status", $status,PDO::PARAM_STR);
		
			
			$stmt->execute();
			//$return_array['message']="Successfully Deleted the Product with Name = ".$name."";
             echo $return_array['message'];
			return $return_array;
		}
 
  public function updateReq($id){
			$return_array = array("success"=>true,"message"=>'');
			$stmt = $this->db->prepare("UPDATE `requests` SET status=:status WHERE id=:id");
			$stmt->bindValue(":id",$id,PDO::PARAM_INT);
            $status = "DELIVERED";
            $stmt->bindValue(":status", $status,PDO::PARAM_STR);
		
			
			$stmt->execute();
			//$return_array['message']="Successfully Deleted the Product with Name = ".$name."";
             echo $return_array['message'];
			return $return_array;
		}
 
    
    public function readAll(){
			
			$stmt=$this->db->prepare($this->select_query_all);
			
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
  return $stmt->fetchAll();
 
 
 }
 
 
     public function readComments(){
			
			$stmt=$this->db->prepare($this->select_coments );
			
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
  return $stmt->fetchAll();
 
 
 }
 public function deletebyName($name){
			$return_array = array("success"=>true,"message"=>'');
			$stmt = $this->db->prepare($this->deletebyname);
			$stmt->bindValue(":name",$name,PDO::PARAM_STR);
			
			
			$stmt->execute();
		return $return_array;
		}
 
  public function DeleteP($name){
			$return_array = array("success"=>true,"message"=>'');
			$stmt = $this->db->prepare($this->deleteP);
			$stmt->bindValue(":name",$name,PDO::PARAM_STR);
			
			
			$stmt->execute();
		
   
			return $return_array;
		}
    

 public function searchName($name){
			$return_array = array("success"=>true,"message"=>'');
			$stmt = $this->db->prepare($this->searchName);
			$stmt->bindValue(":name",$name,PDO::PARAM_STR);
			
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