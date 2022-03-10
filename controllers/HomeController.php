<?php
require_once 'models/videos.php';

class HomeController extends Model{
    function __construct()
    {
        parent::__construct();
    }

    
    function Home(){

        $user = new Videos;
        $todo = $user->All_RAND_HOME('videos');
        
        require "views/home/home.php";
        
    }
}