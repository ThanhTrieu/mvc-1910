<?php

namespace App\controller;

if(!defined('ROOT_PATH')){
	die('Can not access');
}

use App\controller\BaseController;
use App\model\Product;

class ProductController extends BaseController
{
	private $productModel;
	public function __construct()
	{
		$this->productModel = new Product();
	}
	
	public function index()
	{
		$idProduct = $_GET['id'] ?? '';
		$idProduct = is_numeric($idProduct) ? $idProduct : 0;
		
		
		$infoProduct = $this->productModel->getInfoDataProductById($idProduct);
		// co ton tai san pham trong database
		if($infoProduct){
			$data = [];
			$data['info'] = $infoProduct;
			// xu ly hien anh san pham
			$imageProduct = $this->productModel->getImageProductById($idProduct);
			$data['images'] = $imageProduct;
			// hien thi phien ban
			
			
			// load header
			$header = [
				'title' => 'This is home Detail product'
			];
			$this->loadHeader($header);
			
			$this->loadView('product/detail_view', $data);
			
			// load footer
			$this->loadFooter();
		} else {
			// load header
			$header = [
				'title' => 'This is Not found page'
			];
			$this->loadHeader($header);
			$this->loadView('partials/not_found_view');
			// load footer
			$this->loadFooter();
		}
	}
}