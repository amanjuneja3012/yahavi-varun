<?php
/**
* 
*/
class DB
{
	private static $instance=null;
	private function __construct(){
		$instance=new PDO(DRIVER.':host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PASSWORD);
		$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		self::$instance=$instance; 
	}
	public static function getInstance(){
		if (!isset(self::$instance)) {
			new DB;
		}
		return self::$instance;
	}
}
?>