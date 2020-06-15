<?php if (!defined('ROOT_PATH')) die('Can not acess'); ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
                <form class="border p-3 mt-2" action="?c=login&m=handleLogin" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnLogin">Login</button>
                    <a href="index.php">Quay ve trang chu</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
