<?php if(!defined('ROOT_PATH')) die('can not access'); ?>
<main>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-sm-12 col-lg-6 col-xl-6 col-md-6">
				<div class="row">
					<div class="col">
						<img  src="<?php echo PATH_IMAGE . $info['image_product']; ?>" class="img-fluid img-thumbnail w-75"/>
					</div>
				</div>
				<div class="row">
                <?php foreach ($images as $key => $item): ?>
					<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
						<img src="<?php echo PATH_IMAGE . $item['image']; ?>" class="img-fluid img-thumbnail">
					</div>
                <?php endforeach; ?>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-lg-6 col-xl-6 col-md-6">
				<h1><?= $info['name_product']; ?></h1>
    
			</div>
		</div>
		
	</div>
</main>
