<?php

class Projekt extends Controller{
    function Index(){
        $this->view('template/header');
        $this->view('projekt/index');
        $this->view('template/footer');
    }
}

?>