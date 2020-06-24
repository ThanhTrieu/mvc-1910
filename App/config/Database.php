<?php
namespace App\config;

if(!defined('ROOT_PATH')){
	die('Can not access');
}

use \PDO;

class Database
{
	protected $db;
	
	public function __construct()
	{
		$this->db = $this->connection();
	}
	
	private function connection()
	{
		// ket noi toi database
		$dbh = new PDO('mysql:host=localhost;dbname=php1910;charset=utf8', 'root', '');
		// show error pdo php mysql
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		return $dbh;
	}
	
	private function disconnection()
	{
		// ngat ket noi toi database
		$this->db = null;
	}
	
	public function __destruct()
	{
		$this->disconnection();
	}
}