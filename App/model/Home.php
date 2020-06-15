<?php

namespace App\model;

/*
 * noi de xu ly du lieu
 */

if(!defined('ROOT_PATH')){
	die('Can not access');
}

class Home
{
	// ten file va ten class giong nhau
	public function getAllData()
	{
		return [
			[
				'id' => 1,
				'name' => 'samsung s10',
				'price' => 19000000,
				'img' => 'src="https://cdn.tgdd.vn/Products/Images/42/213591/oppo-reno3-trang-600x600-400x400.jpg"'
			],
			[
				'id' => 2,
				'name' => 'iphone X',
				'price' => 29000000,
				'img' => 'https://cdn.tgdd.vn/Products/Images/42/200533/iphone-11-pro-max-green-400x400.jpg'
			],
			[
				'id' => 3,
				'name' => 'Bphone 2',
				'price' => 15000000,
				'img' => 'https://cdn.tgdd.vn/Products/Images/42/220903/samsung-galaxy-a51-8gb-blue-600x600-400x400.jpg'
			]
		];
	}
}