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
		$sql = "SELECT v.`name` AS `name_version`, v.`id` AS `id_version`, p.`price_product`, v.`price_version`
				FROM `products` AS p
				INNER JOIN `version_product` AS vp ON vp.`product_id` = p.`id`
				INNER JOIN `versions` AS v ON v.`id` = vp.`version_id`
				WHERE p.`id` = :id";
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
	
	// lay ra mau sac thuoc vao san pham
	public function getColorProductById($id)
	{
		$data = [];
		$sql = "SELECT c.`name_color`, c.`price_color`, c.`id` AS `id_color`, p.`price_product`
				FROM `products` AS p
				INNER JOIN `color_product` AS cp ON cp.`product_id` = p.`id`
				INNER JOIN `colors` AS c ON c.`id` = cp.`color_id`
				WHERE p.`id` = :id";
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
	
	// lay thong tin bai viet cho san pham
	public function getDataPostProductById($id)
	{
		$data = [];
		$sql = "SELECT pc.`content`, a.`fullname`, p.`id` AS `product_id`, pc.`id` AS `post_id`, a.`id` AS `admin_id`
				FROM `products` AS p
				INNER JOIN `post_product` AS pc ON p.`id` = pc.`product_id`
				INNER JOIN admins AS a ON pc.`admin_id` = a.`id`
				WHERE p.`id` = :id";
		
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
				}
				$stmt->closeCursor();
			}
		}
		return $data;
	}
	
	// lay thong so ky thuat theo san pham
	public function layThongTinKyThuat($id)
	{
		$data = [];
		$sql = "SELECT pc.`detail`, a.`fullname`, p.`id` AS `product_id`, pc.`id` AS `post_id`, a.`id` AS `admin_id`
				FROM `products` AS p
				INNER JOIN `property_product` AS pc ON p.`id` = pc.`product_id`
				INNER JOIN admins AS a ON pc.`admin_id` = a.`id`
				WHERE p.`id` = :id";
		
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
				}
				$stmt->closeCursor();
			}
		}
		return $data;
	}
}