<!doctype html>
<html lang="es">

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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- ************************************************************ -->
    <div class="m-auto col-11 text-center my-5 ">
        <!-- bg-success -->
        <div class="row col-12 bg-primary">
            <!-- bg-danger -->
            <?php
            while ($row = $todo->fetch_object()) { ?>
                <div class="col-sm-11 col-md-11 col-lg-3 my-3 h-75 p-1 m-auto">
                    <a href="<?= URL?>videos/video&V=<?= $row->id?>">
                    <!-- bg-dark -->
                    <div class="card-home card w-100 m-auto">
                        <video src="<?= $row->ruta ?>" poster="<?= $row->mini?>" class="img img-fluid" width="100%" height="150vh" controls></video>
                        <div class="card-body text-nowrap">
                            <p class="card-text text-dark ls fs-4"><?= $row->descripcion?></p>
                        </div>
                    </div>
                </a>
                </div>
            <?php }
            mysqli_free_result($todo);
            mysqli_close($this->db);
            ?>
        </div>
    </div>

    <h1>hola</h1>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>