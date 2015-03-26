<?php

class Base {
	private $_db;
	
	public function __construct(){
		//Accès par PDO
		$source = "mysql:host=".DB_SERVER.";dbname=".DB_NAME;

		$this->_db = new PDO($source , DB_USER , DB_PWD);
		$this->_db->exec("SET CHARACTER SET utf8");
		$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	public function db(){
		return $this->_db;
	}
}