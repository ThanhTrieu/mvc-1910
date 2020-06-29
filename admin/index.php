<?php
	require_once '../vendor/autoload.php';
	
	if(file_exists('routes/web.php')){
		define('ADMIN_PATH', 'admin/index.php');
		require "routes/web.php";
	} else {
		die('website dang nang cap, vui long quay lai sau');
	}