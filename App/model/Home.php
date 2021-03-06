<?php

namespace App\model;

/*
 * noi de xu ly du lieu
 */

if(!defined('ROOT_PATH')){
	die('Can not access');
}

use App\config\Database as Model;
use \PDO;

class Home extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	// ten file va ten class giong nhau
	public function getAllData()
	{
		$data = [];
		$sql = "SELECT * FROM `products`";
		
		$stmt = $this->db->prepare($sql);
		if($stmt){
			// vi ko co tham so truyen vao cau lenh mysql nen ko can bindParam
			// thuc thi cau lenh luon
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $data;
	}
}