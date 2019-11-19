<?php

class Toft extends Controller{
    function Index(){
        $this->view('template/header');
        $this->view('toft/index');
        $this->view('template/footer');
    }
}

?>