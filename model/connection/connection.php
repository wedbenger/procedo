<?php

class Connection {
	
	public static $instance;
	
	private function __construct(){
		
	}
	
	//get the instance of the DB
	public static function getInstance() { 
		if (!isset(self::$instance)) { 
			self::$instance = new PDO('mysql:host=localhost;dbname=wedbe523_procedo', 'wedbe523_procedo', 'u3fAh}T)%la2', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING); 
		} 
		
		return self::$instance; 
	}
	
	
	//papare the sql
	public static function prepare($sql){
		$p_sql = Connection::getInstance()->prepare($sql);
		return $p_sql;
	}
	
	//function for select
	public static function select($p_sql){
		$p_sql->execute();
		return $p_sql->fetchAll(PDO::FETCH_ASSOC);
	}	
	
	//function for insert or update
	public static function update($p_sql){
		$p_sql->execute();
	}
	
}

?>