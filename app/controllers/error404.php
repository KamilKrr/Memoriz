<?php

class Error404 extends Controller{
    function Index(){
        header('HTTP/1.1 404 Not Found');
        $this->view('template/header');
        $this->view('error/404');
        $this->view('template/footer');
    }
}

?>