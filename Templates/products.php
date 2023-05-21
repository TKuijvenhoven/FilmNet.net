<!DOCTYPE html>
<html>
    <?php include_once('defaults/head.php'); ?>
    <body class="bg-warning bg-gradient">
        <div class="container">
            <?php
                include_once('defaults/menu.php');
                GLOBAL $name,$products;
            ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $name ?></li>
                </ol>
            </nav>
            <div class="container-fluid bg-white" >
                <div class="row" >
                    <?php foreach ($products as $product): ?>
                        <div class='col' style="margin-top: 25px">
                            <a href="/product/<?=$product->id?>">
                                <img class='img-fluid rounded' style='max-width: 250px; min-width: 150px; margin-bottom: 25px' src='/img/<?= $product->picture ?>'>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <hr>
            <?php include_once('defaults/footer.php'); ?>
        </div>

    </body>
</html>