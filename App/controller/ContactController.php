<?php
namespace App\controller;

if(!defined('ROOT_PATH')){
    die('can not access');
}

use App\controller\BaseController;

class ContactController extends BaseController
{
	public function index()
	{
		$data = [];
		$data['work'] = 'nhat la da ong bo';
		
		//load header
		$header = [
			'title' => "This is contact page"
		];
		$this->loadHeader($header);
		
		// load content
		$this->loadView('contact/index_view',$data);
		
		// load footer
		$this->loadFooter();
	}
}