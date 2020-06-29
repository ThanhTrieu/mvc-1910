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
	
	// lay ra tat ca nhung anh cua 1 san pham
	public function getImageProductById($id)
	{
		$data = [];
		$sql = "SELECT * FROM `image_product` AS a WHERE a.`product_id` = :id";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
				$stmt->closeCursor();
			}
		}
		return $data;
	}
	
	// lay ra tat ca cac phien ban thuoc vao san pham nay
	public function getVersionProductById($id)
	{
		$data = [];
		$sql = "SELECT v.`name` AS v.`name_version`, v.`id` AS v.`id_version`
				FROM `product` AS p
				INNER JOIN `version_prouct` AS vp ON vp.`product_id` = p.`id`
				INNER JOIN `versions` AS v ON v.`id` = vp.`version_id`
				WHERE p.`id` = :id";
	}
	
}