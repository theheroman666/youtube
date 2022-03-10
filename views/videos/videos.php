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
        <div class=" clearfix">

            <div class="float-start ms-lg-5 col-12 col-lg-8 col-md-12 col-sm-12  my-1 ">
                <video class="ms-lg-5 pt-5 w-100 img-fluid" src="<?= $video->ruta ?> " poster="<?= $video->mini?>" controls></video>
                <h3 class="ms-5 text-white"><?= $video->titulo?> </h3>
                <div class="card-body ms-5 text-nowrap list-inline">
                    <?php 
                    if(isset($_COOKIE['like']) && $_COOKIE['like'] == 'success' && $_COOKIE['like_id'] != $video->id){ 
                        ?>
                        <p class="card-text text-white fs-4">Vistas:<?= $video->vistas ?> <a href="<?= URL?>videos/like&id=<?= $video->id?>" 
                            class="list-inline-item text-<?=$_COOKIE['like']?>">Like</a> <a href="" class="text list-inline-item text-white">Dislike</a> </p>
                        <?php }else{?>
                            <p class="card-text text-white fs-4">Vistas:<?= $video->vistas ?> <a href="<?= URL?>videos/like&id=<?= $video->id?>" 
                            class="list-inline-item text-white">Like</a> <a href="" class="text list-inline-item text-white">Dislike</a> </p>

                    <?php }?>
                </div>
            </div>

            <!-- Videos -->
            <div class="float-end me-lg-2 me-md-3 col-12 col-lg-3 col-md-12 col-sm-12 my-lg-1 my-md-5 pt-5 ">
                <?php
                while ($row = $todo->fetch_object()) { ?>
                    <div class="col-sm-12 col-md-12 col-lg-12 p-2 m-auto">
                        <a class="nav-link text-white" href="<?= URL ?>videos/video&V=<?= $row->id ?>">
                            <!-- bg-dark -->
                            <div class="card mb-1 m-auto bg-transparent" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4 col-lg-4 col-4 col-sm-4 pt-2">
                                        <video src="<?= $row->ruta ?>" poster="<?= $row->mini?>" class="img-fluid rounded-start" width="100%" height="100%" title="<?= $row->titulo?>"></video>
                                    </div>
                                    <div class="col-md-8 col-8">
                                        <div class="card-body text-nowrap">
                                            <p class="card-text ls fs-5"><?= $row->titulo ?> </p>
                                            <span class="card-text ls"><?= $row->vistas ?> </span>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </a>
                    </div>
                <?php }
                mysqli_free_result($todo);
                mysqli_close($this->db);
                ?>
            </div>
            <!-- Videos fin -->
        </div>




        <!-- Bootstrap JavaScript Libraries -->
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>

    </html>