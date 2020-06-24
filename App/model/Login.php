<?php
namespace App\model;

if(!defined('ROOT_PATH')){
	die('can not access');
}

use App\config\Database as Model;
use \PDO;

class Login extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function checkUserLogin($user, $pass)
	{
		$data = [];
		// viet mysql theo pdo php
		$sql = "SELECT * FROM `admins` AS a WHERE a.`username` = :user AND a.`password` = :pass AND a.`status` = 1 LIMIT 1";
		// kiem tra tinh dung dan cua mysql theo chuan pdo php
		$stmt = $this->db->prepare($sql);
		if($stmt){
			// kiem tra tham so truyen vao mysql
			// :user va :pass
			$stmt->bindParam(':user', $user, PDO::PARAM_STR);
			$stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
			// thuc thi cau lenh mysql
			if($stmt->execute()){
				// thuc thi thanh cong
				// lay du lieu ve - kiem tra xem co du lieu tra ve ko ?
				if($stmt->rowCount() > 0){
					// chung to co du lieu tra ve
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
					// fetchAll : tra ve mang da chieu - nhieu dong du lieu
					// fetch : tra ve 1 dong du lieu - mang 1 chieu
					// PDO::FETCH_ASSOC: tra ve mang ma key cua mang la ten cot trong bang du lieu
				}
			}
			$stmt->closeCursor(); // dong thuc thi cac lenh ben tren de neu co lenh mysql can thuc thi ben duoi tiep
		}
		return $data;
	}
	
	public function updateLastLogin($id)
	{
		$date = date('Y-m-d H:i:s');
		$flag = false;
		$sql = "UPDATE `admins` SET `last_login` = :latsLoginDate WHERE `id` = :id";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':latsLoginDate', $date, PDO::PARAM_STR);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			if($stmt->execute()){
				$flag = true;
			}
			$stmt->closeCursor();
		}
		return $flag;
	}
}