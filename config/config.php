<?php

class DB{
    public static function Connection(){
        $db = new mysqli('localhost','root','','youtube');
        $db->query('SET NAMES "utf8mb4"');
        return $db;
    }
}