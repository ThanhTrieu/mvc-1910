<?php
	namespace src\controller;
	
	use src\model\Brand;
	
	class LoginController
	{
		public function index()
		{
			//echo "This is admin login";
			$db = new Brand();
			$insert = $db->insertDataBrand('Test009','test-009', 'test.png', 'test des');
			if($insert){
				echo "thanh cong";
			} else {
				echo "That bai";
			}
		}
	}
