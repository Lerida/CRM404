<?php

class Database
{
private $DB_HOST ='localhost';
private $DB_NAME='crm404';
private $DB_USER='root';
private $DB_PASS='';
private $db;

	public function __construct()
	{
		$this->db = new PDO('mysql:host='. $this->DB_HOST .';dbname='. $this->DB_NAME.';charset=utf8', $this->DB_USER, $this->DB_PASS);
		
	}
	public function get_db(){
	
		return $this->db;

	}

}
?>