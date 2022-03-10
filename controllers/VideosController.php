<?php
require_once 'models/videos.php';
class VideosController extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function video()
    {
        if (isset($_GET['V'])) {
            $id = $_GET['V'];
            $Videos = new Videos();
            $todo = $Videos->All_RAND('videos', $id);
            $Videos->setID($id);
            if (isset($_SESSION['login']) && $_SESSION['login'] == "success") {
                $Videos->visitas();
            }

            $video = $Videos->getVideos();

            require_once "views/videos/videos.php";
        }
    }

    function save()
    {
        if (isset($_POST)) {
            $usuario = $_POST['id_user'];
            $title = isset($_POST['title']) ? $_POST['title'] : false;
            $desc = isset($_POST['desc']) ? $_POST['desc'] : false;
            $video = new Videos();

            $video->setIdUser($usuario);
            $video->setTitle($title);
            $video->setDesc($desc);
            if (isset($_FILES['foto']['name'])) {
                $name = $_FILES['foto']['name'];
                $type = $_FILES['foto']['type'];
                $name_tmp = $_FILES['foto']['tmp_name'];
                $mimetype = array("video/webm", "video/ogg", "video/mp4");

                if (isset($_FILES['mini']['name'])) {
                    $name_mini = $_FILES['mini']['name'];
                    $type_mini = $_FILES['mini']['type'];
                    $name_mini_tmp = $_FILES['mini']['tmp_name'];

                    $min_rand = rand(0, 9999999);
                    $destino_min = "http://localhost/youtube/uploads/fotos/" . $usuario . '/' . $min_rand . $name_mini;
                    $destino_m = "uploads/fotos/" . $usuario . '/' . $min_rand . $name_mini;
                    if (!is_dir('uploads/fotos/' . $usuario)) {
                        mkdir('uploads/fotos/' . $usuario, 0777, true);
                    }
                    move_uploaded_file($name_mini_tmp, $destino_m);
                    $video->setMini($destino_min);
                }

                $num_rand = rand(0, 9999999);
                $destino_up = "uploads/videos/" . $usuario . '/' . $num_rand . $name;
                $destino = "http://localhost/youtube/uploads/videos/" . $usuario . '/' . $num_rand . $name;
                $name_e = $num_rand . $name;

                if (in_array($type, $mimetype)) {
                    if (!is_dir('uploads/videos/' . $usuario)) {
                        mkdir('uploads/videos/' . $usuario, 0777, true);
                    }
                    move_uploaded_file($name_tmp, $destino_up);
                    $video->setName_Video($name_e);
                    $video->setRuta($destino);
                    $video->save();
                }
            }
        }
        header("Location:" . URL . "usuario/yo&id=" . $_SESSION['id']);
    }

    function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Videos = new Videos();
            $Videos->setID($id);
            $todo = $Videos->Delete($id);

            $video = $Videos->getVideos();
        }
        header("Location:" . URL . "usuario/yo&id=" . $_SESSION['id']);
    }

    function Update()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Videos = new Videos();
            $Videos->setID($id);

            $video = $Videos->getVideos();

            require_once "views/videos/update.php";
        }
    }

    function up_video()
    {
        if (isset($_GET['id'])) {
            if (isset($_POST)) {
                $id = $_GET['id'];

                $usuario = $_POST['id_user'];
                $title = isset($_POST['title']) ? $_POST['title'] : false;
                $desc = isset($_POST['desc']) ? $_POST['desc'] : false;
                $video = new Videos();

                $video->setID($id);
                $video->setIdUser($usuario);
                $video->setTitle($title);
                $video->setDesc($desc);
                if (isset($_FILES['foto'])) {
                    $name = $_FILES['foto']['name'];
                    $type = $_FILES['foto']['type'];
                    $name_tmp = $_FILES['foto']['tmp_name'];
                    $mimetype = array("video/webm", "video/ogg", "video/mp4");

                    $num_rand = rand(0, 9999999);
                    $destino_up = "uploads/videos/" . $usuario . '/' . $num_rand . $name;
                    $destino = "http://localhost/youtube/uploads/videos/" . $usuario . '/' . $num_rand . $name;
                    $name_e = $num_rand . $name;

                    if (in_array($type, $mimetype)) {
                        if (!is_dir('uploads/videos/' . $usuario)) {
                            mkdir('uploads/videos/' . $usuario, 0777, true);
                        }
                        move_uploaded_file($name_tmp, $destino_up);
                        $video->setName_Video($name_e);
                        $video->setRuta($destino);
                        $video->update_save();
                    } else {
                    }
                } else {
                }
                if (isset($_FILES['mini'])) {
                    $name_mini = $_FILES['mini']['name'];
                    $type_mini = $_FILES['mini']['type'];
                    $name_mini_tmp = $_FILES['mini']['tmp_name'];
                    $mimetype_mini = array("image/png", "image/jpg", "image/jpeg");


                    $min_rand = rand(0, 9999999);
                    $destino_m = "uploads/fotos/" . $usuario . '/' . $min_rand . $name_mini;
                    $destino_min = "http://localhost/youtube/uploads/fotos/" . $usuario . '/' . $min_rand . $name_mini;
                    $mini_e = $min_rand . $name_mini;

                    if (in_array($type_mini, $mimetype_mini)) {
                        if (!is_dir('uploads/fotos/' . $usuario)) {
                            mkdir('uploads/fotos/' . $usuario, 0777, true);
                        }
                        move_uploaded_file($name_mini_tmp, $destino_m);
                        $video->setMini($destino_min);
                    } else {
                    }
                }
                $video->update_save();
            }
        }
        header("Location:" . URL . "usuario/yo&id=" . $_SESSION['id']);
    }

    function like()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Videos = new Videos();
            $Videos->setID($id);
            if (isset($_SESSION['login']) && $_SESSION['login'] == "success") {
                if(isset($_COOKIE['like']) && $_COOKIE['like'] == "success" && $_COOKIE['like_id'] != $id){
                    $like = $Videos->like();
                    if($like){
                        // $_SESSION['like'] = "success";
                        setcookie ("like", "success",time()+ 1000);
                        setcookie ("like_id", $id,time()+ 1000);
                        // $_SESSION['like_id'] = $id;
                    }else{
                        // $_SESSION['like'] = "none";
                        setcookie ("like", "none",time()+ 3600);
                        
                    }
                }
            }else{
                header("Location:" . URL . "usuario/login");

            }
        }
        header("Location:" . URL . "videos/video&V=" . $_GET['id']);
    }
}
