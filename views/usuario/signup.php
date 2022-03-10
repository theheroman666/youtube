<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>

<body>
    <!doctype html>
    <html lang="es">

    <?php
    if (isset($_SESSION['login']) && $_SESSION['login'] == 'success') {
        header("Location:" . URL);
    }?>

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="<?= URL ?>assets/style.css">
        <!-- Bootstrap CSS v5.0.2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>

    <body>
        <header class="pb-5">
            <?php
            require_once 'views/includes/header.php' ?>
        </header>

        <!-- ************************************************************ -->
        <h1 class="text-center mt-5">Signup</h1>
        <?php
        if (isset($_SESSION['signup']) && $_SESSION['signup'] == 'success') { ?>
            <div class="alert text-center col-6 m-auto alert-success alert-dismissible fade show">
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
                <p>El Usuario Fue Registrado</p>

            </div>

        <?php
        } elseif (isset($_SESSION['signup']) && $_SESSION['signup'] == 'Fail') { ?>
            <div class="alert text-center col-6 m-auto alert-danger alert-dismissible fade show">
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
                <p>El Usuario No se Pudo Registrar</p>

            </div>
        <?php } elseif (isset($_SESSION['signup']) && $_SESSION['signup'] == 'ISExists') { ?>
            <div class="alert text-center col-6 m-auto alert-danger alert-dismissible fade show">
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
                <p>El Usuario Ya Existe</p>
            </div>
        <?php } ?>

        <?php Utils::deleteSession('signup'); ?>

        <div class="m-auto col-11 text-center my-5 ">
            <!-- bg-success -->
            <div class="row col-12 bg-primary">
                <!-- bg-danger -->
                <form class="col-6 m-auto" action="<?= URL ?>Usuario/save" method="post">

                    <div class="mb-3">
                        <label for="name" class="form-label fs-4"><b>Nombre</b></label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label fs-4"><b>Apellido</b></label>
                        <input type="text" class="form-control" name="last_name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fs-4"><b>Email</b></label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fs-4"><b>Password</b></label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="mb-3 pb-5 pt-2">
                        <button type="submit" class="btn btn-success col-4">signup</button>
                    </div>
                </form>
            </div>
        </div>
        <h1>hola</h1>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>

    </html>
</body>

</html>