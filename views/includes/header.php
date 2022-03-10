<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand me-lg-5 m-auto me-md-2 me-sm-0 fs-1" href="<?=URL?>">
            YouTube
        </a>
        <ul class="navbar-nav ps-3 mx-auto col-md-7 col-12 mb-2 mb-lg-0">
            <form class="d-flex col-12">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </ul>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto text-center col-9 col-lg-11 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white fs-5" href="<?= URL?>">Inicio</a>
                </li>
                <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] == 'success') { ?>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-5" href="<?= URL?>usuario/yo&id=<?= $_SESSION['id']?>">Mi perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-5" href="<?= URL?>usuario/logout">Logout</a>
                    </li>
                <?php } else { ?>

                    <li class="nav-item">
                        <a class="nav-link text-white fs-5" href="<?= URL?>usuario/login">Login</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link text-white fs-5" href="<?= URL?>usuario/signup">Signup</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>