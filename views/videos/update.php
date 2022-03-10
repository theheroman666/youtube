<?php if (isset($video) && is_object($video)) { ?>
    <!doctype html>
    <html lang="es">

    <head>
        <title>Video</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="<?= URL ?>assets/style.css">


        <!-- Bootstrap CSS v5.0.2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>

    <body>
        <header class="pb-2">
            <?php require_once "views/includes/header.php"; ?>
        </header>

        </br>
        </br>
        <div class=" clearfix my-5">

            <!-- Videos -->
            <div class="col-7 m-auto py-5 text-center col-lg-6 col-md-7 col-sm-7 ">
                <h2 class="text-white">Editar video</h2>
                <form class="col-12" action="<?= URL ?>videos/up_video&id=<?= $video->id?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="<?= $video->titulo?>" placeholder="El mejor video del mundo">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">desc</label>
                        <input type="text" class="form-control" name="desc" value="<?= $video->descripcion?>" placeholder="El mejor video del mundo">
                        <input type="hidden" class="form-control" name="id_user" value="<?= $_SESSION['id'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="custom-file">
                            <input type="file" name="foto" class="custom-file-input col-11 bg-light" aria-describedby="fileHelpId"><br><br>
                            <video src="<?= $video->ruta?>" controls poster="<?= $video->mini?>" width="75%" height="70%"></video>
                            <br>
                            <label for="mini" class="form-label bg-info">Puedes ingresar una miniatura</label><br>
                            <input type="file" name="mini"  class="custom-file-input col-11 bg-light"><br>
                            <img src="<?= $video->mini?>" class="img img-fluid" width="75%" height="70%">
                        
                        </label>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Subir video</button>
                </form>
            </div>
            <!-- Videos fin -->
        </div>




        <!-- Bootstrap JavaScript Libraries -->
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>

    </html>