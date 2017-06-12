<?php 

	class Cart{
	   
		private $name;
		private $price;
        private $cnt;
       
		
		public function __construct($t,$d,$i){
           
			$this->name=$t;
			$this->price=$d;
            $this->cnt=$i;
			
		}
        
		public function getName(){return $this->name;}
		public function getPrice(){return $this->price;}
		public function getCnt(){return $this->cnt;}
        
		
	
		
		public function setName($t){ 
            $this->name=$t;
             
            }
		public function setPrice($d){
            	$this->price=$d;
                }
        public function setCnt($i){
            	$this->cnt=$i;
                }
        
		
    }


?>