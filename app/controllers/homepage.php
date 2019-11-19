<?php

class Homepage extends Controller{
    function Index(){
        $this->view('template/header');
        $this->view('homepage/index');
        $this->view('template/footer');
    }
}

?>