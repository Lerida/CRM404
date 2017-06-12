<?php 

	class Hrs{
        private $hrs;
        private $userId;
        private $datee;
        private $date1;
	
		
		public function __construct($hrs,$userId,$datee,$date1){
           
		 $this->hrs=$hrs;
		 $this->userId=$userId;
		 $this->datee=$datee;
             $this->date1=$date1;
		
			
		}
        
         public function gethrs(){return $this->hrs;}
         public function getUserId(){return $this->userId;}
         public function getDate(){return $this->datee;}
         public function getDate1(){return $this->date1;}
		
        
        public function sethrs($hrs){ 
            $this->hrs=$hrs;
             
            }
         public function setUserId($userId){ 
            $this->userId=$userId;
             
            }
public function setDate($datee){ 
            $this->datee=$datee;
             
            }

		public function setDate1($date1){ 
            $this->date1=$date1;
             
            }
		
    }


?>