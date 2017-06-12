<?php 

	class Activities{
	   
		private $title;
		private $des;
    
		
		public function __construct($t,$d){
           
			$this->title=$t;
			$this->des=$d;
      
			
		}
        
		public function getTitle(){return $this->title;}
		public function getDes(){return $this->des;}
	
        
		
	
		
		public function setTitle($t){ 
            $this->title=$t;
             
            }
		public function setDes($d){
            	$this->des=$d;
                }
     
        
		
    }


?>