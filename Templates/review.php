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
                    <?php foreach ($details as $detail): ?>
                        <h2 class="text-center"><?= $detail->name ?></h2>
                        <div class="row">
                            <div class="col-6">
                                <div class="row" style="min-height: 25%"></div>
                                <?= $detail->info ?>
                            </div>
                            <div class='col-6' >
                                <img class='img-fluid rounded'  src='/img/<?= $detail->picture ?>'>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <hr>
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($reviews as $review): ?>

                            <div class="col" style="max-width: 50%">
                                <div class="card text-center">
                                    <?= $review->name ?><hr>
                                    <div class="card-body text-start">
                                        <?= $review->info ?>
                                    </div>

                                </div>

                            </div>
                    <?php endforeach; ?>
                </div>
<!--                <div class="row text-center">-->
<!--                    <form method="post">-->
<!--                        <input class="btn-warning" type="submit" name="add" value="Write a review">-->
<!--                    </form>-->
<!--                    --><?php
//                    include "add.php";
////                    if (isset($_POST['add'])){
////
////                    } else {
////                        include "none.php";
////                    };
//                    ?>
<!--                </div>-->

            </div>
            <hr>
            <?php include_once('defaults/footer.php'); ?>
        </div>
    </body>
</html>