<?php if(!defined('ROOT_PATH')) die('Can not access'); ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title; ?></title>
	<link type="text/css" rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="#">Navbar</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			</li>
            
            <?php if(empty($username)): ?>
                <li class="nav-item">
                    <a class="nav-link" href="?c=login">Login</a>
                </li>
            <?php endif; ?>
            
			<li class="nav-item">
                <a class="nav-link" href="?c=contact">Contact</a>
            </li>
            
            <?php if(!empty($username)): ?>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Hi : <?= $username; ?></a>
                </li>
                <li class="nav-item">
                    <form action="?c=login&m=logout" method="post">
                        <button type="submit" name="btnLogout" class="btn btn-info">Logout</button>
                    </form>
                </li>
            <?php endif; ?>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
</nav>
