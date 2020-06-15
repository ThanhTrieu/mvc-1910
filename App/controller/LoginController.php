<?php

namespace App\controller;

if(!defined('ROOT_PATH')){
	die('Can not access');
}

use App\controller\BaseController;
use App\model\Login;

class LoginController extends BaseController
{
	private $loginModel;
	public function __construct()
	{
		$this->loginModel = new Login();
	}
	
	public function index()
	{
		$this->loadView('login/index_view');
	}
	
	public function handleLogin()
	{
		if(isset($_POST['btnLogin'])){
			$username = $_POST['username'] ?? '';
			$username = strip_tags($username);
			
			$password = $_POST['password'] ?? '';
			$password = strip_tags($password);
			$checkLogin = $this->loginModel->checkUserLogin($username, $password);
			if($checkLogin){
				// cho vao home
				$_SESSION['user'] = $username;
				header("Location: ?c=home");
			} else {
				// quay lai giao dien form login
				header("Location: ?c=login&state=fail");
			}
		}
	}
	
	public function logout()
	{
		if(isset($_POST['btnLogout'])){
			if(isset($_SESSION['user'])){
				unset($_SESSION['user']);
			}
			header("Location: ?c=home");
		}
	}
}
