<?php

class ErrorController extends Model{
    function __construct()
    {
        parent::__construct();
    }
    function NotFound(){
        $this->view->render('error/error');

    }
}

