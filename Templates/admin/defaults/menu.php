<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="home">
            <img src="../img/fmicon.png" alt="Logo" width="50">
            FilmNet
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="/admin/products">Manage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/profile">Profile</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/logout"><?= $_SESSION['user']->role?> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
