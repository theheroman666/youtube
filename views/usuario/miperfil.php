
<?php 
if(!isset($_SESSION['login']) && $_SESSION['login'] != "success"){
    header("Location:".URL);
}

if (isset($myuser) && is_object($myuser) && isset($myvideo) && is_object($myvideo)) { ?>
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
            <?php require_once "views/includes/header.php"; ?>
        </header>

        </br>
        </br>
        <div class="m-auto text-center">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Launch static backdrop modal
            </button>
        </div>
        <div class="m-auto col-11 text-center my-5 bg-primary">
            <p class="fs-1"><?= $myuser->nombre ?></p>


            <!-- !!--- Modal ---!! -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Subir video</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="col-12" action="<?= URL ?>videos/save" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="El mejor video del mundo">
                                </div>
                                <div class="mb-3">
                                    <label for="desc" class="form-label">desc</label>
                                    <input type="text" class="form-control" name="desc" placeholder="El mejor video del mundo">
                                    <input type="hidden" class="form-control" name="id_user" value="<?= $_SESSION['id'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input" aria-describedby="fileHelpId"><br><br>
                                        <label for="mini" class="form-label bg-info">Puedes ngresar una miniatura</label><br>
                                        <input type="file" name="mini" class="custom-file-input" >
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success">Subir video</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-auto col-6 text-center">

            <table class="table table-dark table-striped">
                <thead>
                        <tr>
                            <th scope="col">Video</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $myvideo->fetch_object()) { ?>
                        <tr>
                            <td class="col-6">
                                <video width="25%" height="25%" src="<?= $row->ruta ?>" poster="<?= $row->mini?>"></video>
                            </td>
                            <td><?= $row->titulo ?></td>
                            <td><?= $row->descripcion ?></td>
                            <td class="col-3">
                            <p class="fs-4"> <a class="text-decoration-none text-danger fas fa-trash fs-4" href="<?= URL?>videos/delete&id=<?= $row->id;?>"></a> | <a class="text-decoration-none text-success fas fa-edit fs-4" href="<?= URL?>videos/Update&id=<?= $row->id?>"></a></p>
                        
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>


        <!-- Bootstrap JavaScript Libraries -->
    <?php } ?>
    <script src="https://kit.fontawesome.com/8119196cc6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>

    </html>