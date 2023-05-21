<!DOCTYPE html>
<html>
    <?php
    include_once('defaults/head.php');
    include_once ('defaults/menu.php');
    include_once ('defaults/banner.php');
     if(!empty($message)):?>
        <div class="alert alert-success" role="alert">
            <?=$message?>
        </div>
    <?php endif;?>
    <body class="bg-white">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="img/side101.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">WELCOME TO FILMNET.NET</h5>
                        <p class="card-text">As a movie review website, we strive to provide our readers with honest and thoughtful
                            critiques of the latest films. Our team of experienced reviewers watches each movie with a critical eye,
                            taking into account factors such as the acting, directing, special effects, and overall story.
                            We also consider the film's cultural impact and how it compares to other movies in the same genre.
                        <p class="card-text"><small class="text-muted">Go Explore</small></p>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once ('defaults/footer.php'); ?>
    </body>
</html>
