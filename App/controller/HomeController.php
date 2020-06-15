<?php

namespace App\controller;

if(!defined('ROOT_PATH')){
	die('Can not access');
}

use App\controller\BaseController;
use App\model\Home; // nap model Home

class HomeController extends BaseController
{
	private $db;
	public function __construct()
	{
		$this->db = new Home();
	}
	
	public function index()
	{
		// lay du lieu tu home model
		$data = [];
		
		$products = $this->db->getAllData();
		$data['lstProducts'] = $products;
		$data['name'] = 'Van Teo';
		$data['age'] = 20;
		
		// load header
		$header = [
			'title' => 'This is home page'
		];
		$this->loadHeader($header);
		
		// load content
		// dua ca mang data ra ngoai view
		$this->loadView('home/index_view', $data);
		
		// load footer
		$this->loadFooter();
	}
}