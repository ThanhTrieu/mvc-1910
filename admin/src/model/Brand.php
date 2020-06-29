<?php
	namespace src\model;
	
	use src\config\Database as Model;
	use \PDO;
	
	class Brand extends Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function insertDataBrand($name, $slug, $logo, $des)
		{
			$status = 1;
			$created_at = date('Y-m-d H:i:s');
			$updated_at = null;
			
			$flag = false;
			$sql = "INSERT INTO `brands`(`name`, `slug`, `logo`, `description`, `status`, `created_at`, `updated_at`) VALUES (:nameBrand, :slug, :logo, :description, :status, :created_at, :updated_at)";
			$stmt = $this->db->prepare($sql);
			if($stmt){
				$stmt->bindParam(':nameBrand', $name, PDO::PARAM_STR);
				$stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
				$stmt->bindParam(':logo', $logo, PDO::PARAM_STR);
				$stmt->bindParam(':description', $des, PDO::PARAM_STR);
				$stmt->bindParam(':status', $status, PDO::PARAM_INT);
				$stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
				$stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
				if($stmt->execute()) {
					$flag = true;
					$stmt->closeCursor();
				}
			}
			return $flag;
		}
	}