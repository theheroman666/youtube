<?php

require_once 'models/usuario.php';
require_once 'models/videos.php';
class UsuarioController extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function signup()
    {
        $this->view->render('usuario/signup');
    }

    function login()
    {
        $this->view->render('usuario/login');
    }

    function save()
    {

        $_SESSION['signup'] = 'ISExists';
        header('Location:' . URL . 'usuario/signup');

        if (isset($_POST)) {

            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($name && $last_name && $email && $password) {


                $save = new Usuarios();
                $save->setName($name);
                $save->setLastName($last_name);
                $save->setEmail($email);
                $save->setPassword($password);

                $registro = $save->save();
                if ($registro) {
                    $_SESSION['signup'] = 'success';
                } else {
                    $_SESSION['signup'] = 'Fail';
                }
            } else {
                $_SESSION['signup'] = 'Fail';
            }
        } else {
            $_SESSION['signup'] = 'Fail';
        }
    }

    function setlogin(){

        header('Location:' . URL . 'usuario/login');

        if (isset($_POST)) {

            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($email && $password) {


                $login = new Usuarios();
                $login->setEmail($email);
                $login->setPassword($password);

                $user = $login->login();
                if ($user && is_object($user)) {
                    $_SESSION['login'] = 'success';
                    $_SESSION['id'] = $user->id;
                    $_SESSION['name'] = $user->nombre;
                } else {
                    $_SESSION['login'] = 'Fail';
                }
            } else {
                $_SESSION['login'] = 'Fail';
            }
        } else {
            $_SESSION['login'] = 'Fail';
        }
    }

    function yo(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $id = $_SESSION['id'];
            $mis_videos = new Videos();
            $mis_videos->setIdUser($id);
            $myvideo = $mis_videos->getMisVideos();
            
            
            $usuario = new Usuarios();
            $usuario->setID($id);
            $myuser = $usuario->getUser();
            
            require_once "views/usuario/miperfil.php";
            
        }else{
        header("Location:".URL."usuario/yo&id=".$_SESSION['id']);

        }
    } 

    function logout(){
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['name'])){
            unset($_SESSION['name']);
        }
        if(isset($_SESSION['like'])){
            unset($_SESSION['like']);
        }
        if(isset($_SESSION['like_id'])){
            unset($_SESSION['like_id']);
        }
        if(isset($_SESSION['id'])){
            unset($_SESSION['name']);
        }
        header("Location:".URL);
    }
}
