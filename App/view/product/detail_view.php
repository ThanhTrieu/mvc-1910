<?php if(!defined('ROOT_PATH')) die('can not access'); ?>
<main>
	<div class="container">
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
			<div class="col-12 col-sm-12 col-lg-6 col-xl-6 col-md-6 ">
				<h1><?= $info['name_product']; ?></h1>
                <?php if(!empty($versions)): ?>
                    <div class="row border p-1">
                    <?php foreach ($versions as $key => $item): ?>
                        <div class="col-12 col-sm-12 col-lg-6 col-xl-6 col-md-6">
                            <p>
                                <span>Version: <?= $item['name_version']; ?></span><br>
                                <span>Price: <?= number_format($item['price_version']); ?></span><br>
                                <input type="radio" name="price_version"/>
                            </p>
                            
                        </div>
                    <?php endforeach; ?>
                    </div>
                <?php endif; ?>
				
				<?php if(!empty($colors)): ?>
                    <div class="row border p-1 my-2">
						<?php foreach ($colors as $key => $item): ?>
                            <div class="col-12 col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                <p>
                                    <span>Color: <?= $item['name_color']; ?></span><br>
                                    <span>Price: <?= number_format($item['price_color']); ?></span><br>
                                    <input type="radio" name="price_color"/>
                                </p>

                            </div>
						<?php endforeach; ?>
                    </div>
				<?php endif; ?>
                
                <?php if(empty($versions) && empty($colors)): ?>
                    <p>Price : <?= number_format($info['price_product']); ?></p>
                <?php endif; ?>
			</div>
		</div>
        <hr>
		<div class="row">
            <div class="col-12 col-sm-12 col-lg-8 col-xl-8 col-md-8">
                <div class="content">
                    <?= $post['content']; ?>
                </div>
                <div class="author">
                    <p>Theo: <?= $post['fullname']; ?></p>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-4 col-xl-4 col-md-4">
            
            </div>
        </div>
	</div>
</main>
