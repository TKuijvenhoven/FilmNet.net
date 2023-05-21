<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>

<body>

<div class="container">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
    global $name, $product, $reviews, $message;
    ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/member/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/member/categories">Categories</a></li>
            <li class="breadcrumb-item"><a href="/member/categories/<?= $product->category_id ?>"><?= $name ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $product->name ?></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="card" >
                <img class="img-fluid center-block" width="200px" src='/img/<?= $product->picture ?>'/>
                <div class="card-body">
                    <h5 class="card-title"><?= $product->name ?></h5>
                    <p class="card-text"><?= $product->description ?></p>
                    <a class="btn btn-primary" href="/member/review/<?=$product->id?>" role="button">Add review</a>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php foreach ($reviews as $review): ?>

                <div class="card">
                    <div class="card-header">
                        <?= $review->name?> (<?php $date=date_create($review->date);echo date_format($date,'d-m-Y')?>)
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p><?=$review->description?></p>
                            <footer class="blockquote-footer"><?= $review->stars?><cite title="Source Title"> Stars</cite></footer>
                        </blockquote>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    <?php
//    include_once('defaults/footer.php');
    ?>
</div>

</body>
</html>
