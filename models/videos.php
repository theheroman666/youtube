<?php
require_once "models/ModelBase.php";

class Videos extends Model{
    public $id;
    public $id_usuario;
    public $title;
    public $key;
    public $desc;
    public $video;
    public $ruta;
    public $mini;
    //Falta seter y geter
    public $vistas;
    //Falta seter y geter
    public $mylikes;
    //Falta seter y geter
    public $dislikes;
    //Falta seter y geter
    public $reportes;

    function getID(){
        return $this->id;
    }

    function getIdUser(){
        return $this->id_usuario;
    }

    function getKey(){
        return $this->key;
    }

    function getTitle(){
        return $this->title;
    }

    function getDesc(){
        return $this->desc;
    }
    //Falta seter
    function getName_Video(){
        return $this->video;
    }
    //Falta seter
    function getRuta(){
        return $this->ruta;
    }
    function getMini(){
        return $this->mini;
    }
//------/////-----------///--------///--------///---------------------------------


    function setID($id){
        $this->id = $this->db->real_escape_string($id);
    }

    function setIdUser($id_usuario){
        $this->id_usuario = $this->db->real_escape_string($id_usuario);

    }

    function setKey($key){
        $this->key = $this->db->real_escape_string($key);

    }

    function setTitle($title){
        $this->title = $this->db->real_escape_string($title);
    }

    function setDesc($desc){
        $this->desc = $this->db->real_escape_string($desc);
    }
    
    function setName_Video($video){
        $this->video = $this->db->real_escape_string($video);
    }
    
    function setRuta($ruta){
        $this->ruta = $this->db->real_escape_string($ruta);
    }
    function setMini($mini){
        $this->mini = $this->db->real_escape_string($mini);
    }
    function save(){
        $sql = "INSERT INTO videos(id_usuario,titulo,descripcion,nombre,ruta,mini)
        VALUES('{$this->getIdUser()}','{$this->getTitle()}','{$this->getDesc()}','{$this->getName_Video()}','{$this->getRuta()}','{$this->getMini()}')";
        $query = $this->db->query($sql);
        $resul = false;
        if($query){
            $resul = true;
        }
        return $resul;
    }
    
    function getVideos(){
        $video = $this->db->query("SELECT * FROM videos WHERE id = '{$this->id}' ");
        return $video->fetch_object();
    }
    
    function getMisVideos(){
        $video = $this->db->query("SELECT * FROM videos WHERE id_usuario = '{$this->getIdUser()}' ");
        return $video;
    }
    
    function visitas(){
        $sql = $this->db->query("UPDATE videos SET vistas = vistas + 1 WHERE id = '{$this->id}'");
        $resul = false;
        if($sql){
            $resul = true;
        }
        return $resul;
    }

    function Delete()
    {
        $video = $this->db->query("SELECT * FROM videos WHERE id = '{$this->id}' ");
        $row = $video->fetch_object();
        if($row){
            unlink($row->ruta);
            unlink($row->mini);
        }
        
        $query = $this->db->query("DELETE FROM videos WHERE id = '{$this->id}'");
        return $query;
    }

    function update_save(){
        $sql = "UPDATE videos SET id_usuario='{$this->getIdUser()}', titulo='{$this->getTitle()}', descripcion='{$this->getDesc()}'";
        if($this->getRuta() != null){
            $sql .= ", nombre='{$this->getName_Video()}'";
        }
        
        if($this->getRuta() != null){
            $sql .= ", ruta='{$this->getRuta()}'";
        }
        
        if($this->getMini() != null){
            $sql .= ", mini='{$this->getMini()}'";
        }

        $sql .= " WHERE id = {$this->getID()};";
        
        $query = $this->db->query($sql);
        $resul = false;
        if($query){
            $resul = true;
        }
        return $resul;
    }

    function like(){
        $sql = $this->db->query("UPDATE videos SET mylikes = mylikes + 1 WHERE id = '{$this->id}'");
        $resul = false;
        if($sql){
            $resul = true;
        }
        return $resul;
    }
    
    function dislike(){
        $sql = $this->db->query("UPDATE videos SET dislikes = dislikes + 1 WHERE id = '{$this->id}'");
        $resul = false;
        if($sql){
            $resul = true;
        }
        return $resul;
    }

}