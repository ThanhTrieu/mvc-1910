<?php
namespace App\model;

if(!defined('ROOT_PATH')){
	die('can not access');
}

class Login
{
	public function checkUserLogin($user, $pass)
	{
		if($user === 'admin' && $pass === '123'){
			return true;
		}
		return false;
	}
}