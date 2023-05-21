<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/member/home">
            <img src="../img/fmicon.png" alt="Logo" width="50">
            FilmNet
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="/member/categories">Films</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/member/profile">Profile</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/logout"><?= $_SESSION['user']->first_name .' '.$_SESSION['user']->last_name  ?> uitloggen (<?= $_SESSION['user']->role?>)</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
