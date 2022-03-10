<?php

class Model{
    public $db;

    function __construct()
    {
        $this->db = DB::Connection();
        $this->view = new View();

    }

    function All($table)
    {
        $query = $this->db->query("SELECT * FROM $table");
        return $query;
    }
    
    function All_RAND_HOME($table)
    {
        $query = $this->db->query("SELECT * FROM $table ORDER BY RAND() ");
        return $query;
    }
    
    function All_RAND($table,$id)
    {
        $query = $this->db->query("SELECT * FROM $table WHERE id != $id ORDER BY RAND() ");
        return $query;
    }
}