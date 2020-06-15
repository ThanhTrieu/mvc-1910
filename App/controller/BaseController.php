<?php

namespace App\controller;

if(!defined('ROOT_PATH')){
	die('Can not access');
}

class BaseController
{
	protected function loadHeader($header = [])
	{
		$title = $header['title'] ?? '';
		$username = $this->getSessionUsername();
		
		require 'App/view/partials/header_view.php';
	}
	
	protected function loadFooter()
	{
		require 'App/view/partials/footer_view.php';
	}
	
	protected function loadView($pathView, $data = [])
	{
		extract($data); // chuyen key cua mang thanh 1 bien de hien thi ngoai view
		/*
		 *  ['name' => 'abc']
		 *  $name = 'abc'
		 */
		require "App/view/{$pathView}.php";
	}
	
	protected function getSessionUsername()
	{
		$user = $_SESSION['user'] ?? '';
		return $user;
	}
}

