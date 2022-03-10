<?php
require_once 'models/ModelBase.php';

class Usuarios extends Model{
    
    public $id;
    public $name;
    public $last_name;
    public $email;
    public $password;
    
    function __construct()
    {
        parent::__construct();
    }

    function getID(){
        return $this->id;
    }

    function getName(){
        return $this->name;
    }

    function getLastName(){
        return $this->last_name;
    }

    function getEmail(){
        return $this->email;
    }

    function getPassword(){
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost'=> 10]);
    }

    function setID($id){
        $this->id = $id;
    }

    function setName($name){
        $this->name = $this->db->real_escape_string($name);
    }

    function setLastName($last_name){
        $this->last_name = $this->db->real_escape_string($last_name);
    }

    function setEmail($email){
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password){
        $this->password = $password;
    }

    function save(){
        $sql = "INSERT INTO usuarios(nombre,apellido,email,password) 
        VALUES('{$this->getName()}','{$this->getLastName()}','{$this->getEmail()}','{$this->getPassword()}')";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = true;
        }
        return $result;
    }

    function login(){
        $result = false;
        $email = $this->email;
        $password = $this->password;

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);

        if($login && $login->num_rows == 1){
            $user = $login->fetch_object();
            $verify = password_verify($password, $user->password);
            if($verify){
                $result = $user;
            }
        }
        return $result;
    }

    function getUser(){
        $usuario = $this->db->query("SELECT * FROM usuarios WHERE id = '{$this->id}'");
        return $usuario->fetch_object();
    }


}