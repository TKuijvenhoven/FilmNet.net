<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Filmnet - Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </head>
    <body class="bg-warning">
        <br><br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-12 col-xl-10">
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-flex">
                                    <div class="flex-grow-1 bg-login-image" style="background-image: url(https://cdn.discordapp.com/attachments/1061595349506064424/1063057158297616494/Thomask_login_icon_for_a_website_608bc825-745e-4c89-9714-e557cc7d9b7c-removebg-preview-transformed.jpeg);"></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-4">Register</h4>
                                        </div>
                                        <form class="row g-3" method="post">
                                            <div class="col-md-6">
                                                <label for="inputEmail" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" id="inputEmail">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputPassword" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="inputPassword">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputFirstName" class="form-label">First name</label>
                                                <input type="text" name="firstName" class="form-control" id="inputFirstName" value="<?php if (isset($_POST['firstName'])) {echo $_POST['firstName'];} else {echo "";} ?>"  placeholder="Jan">
                                            </div>
                                            <div class="col-6">
                                                <label for="inputLastName" class="form-label">Last name</label>
                                                <input type="text" name="lastName" class="form-control" id="inputLastName" value="<?php if (isset($_POST['lastName'])) {echo $_POST['lastName'];} else {echo "";} ?>"  placeholder="Klaassen">
                                                </div>
                                            <div class="col-12">
                                                <button type="submit" name="register" class="btn btn-primary">Register</button>
                                            </div>
                                        </form>
                                        <br><br><br><br>
                                        <div class="text-center"><a class="small" href="login">Login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>