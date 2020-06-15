<?php
session_start();

// khong duoc phep truy cap truc tiep vao file
if(!defined('ROOT_PATH')){
	die('Can not access');
}

// la noi tiep nhan cac request gui len
// index.php?c=home&m=index&name=test&age=100
// index.php/home/index

// c : ten controller
// m : ten phuong thuc thuoc controller do
// name + age : query string
$controller = ucfirst($_GET['c'] ?? 'home');
$method = $_GET['m'] ?? 'index';

$namespaceController = "App\controller\\".$controller."Controller";

$checkExist = str_replace('\\', '/', trim($namespaceController,'\\')) . ".php";

if(file_exists($checkExist)){
	$c = new $namespaceController;
	// tu dong goi vao cac phuong thuc
	$c->$method();
} else {
	header("Location: error.php");
}
