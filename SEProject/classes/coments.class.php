<?php 

	class Coments{
	   
		private $timee;
		private $coment;
        private $rate;
       
		
		public function __construct($d,$c,$r){
           
			$this->timee=$d;
			$this->coment=$c;
            $this->rate=$r;
			
		}
        
		public function getTimee(){return $this->timee;}
		public function getComent(){return $this->coment;}
		public function getRate(){return $this->rate;}
        
		
	
		
		public function setTimee($d){ 
            $this->timee=$d;
             
            }
		public function setComent($c){
            	$this->coment=$c;
                }
        public function setRate($r){
            	$this->rate=$r;
                }
        
		
    }


?>