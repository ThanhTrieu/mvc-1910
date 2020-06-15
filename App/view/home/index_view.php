<?php if(!defined('ROOT_PATH')) die('can not access'); ?>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>My name : <?= $name; ?></h1>
                <h2>My age : <?= $age; ?></h2>
            </div>
        </div>
        <div style="min-height: 600px;" class="row">
        <?php foreach ($lstProducts as $key => $item): ?>
            <div class="col col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="card">
                    <img src="<?= $item['img']; ?>" alt="<?= $item['name']; ?>" class="img-fluid">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['name']; ?></h5>
                        <p class="card-text"><?= number_format($item['price']); ?></p>
                        <button class="btn btn-primary">Add cart</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</main>

