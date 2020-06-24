<?php

namespace App\model;

if(!defined('ROOT_PATH')){
	die('can not access');
}

use App\config\Database as Model;
use \PDO;

class Product extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getInfoDataProductById($id)
	{
		$data = [];
		$sql = "SELECT p.*, b.`name` AS `name_brand` FROM `products` AS p
				INNER JOIN `brands` AS b ON b.`id` = p.`brand_id`
				WHERE p.`id` = :id";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $data;
	}
	
}