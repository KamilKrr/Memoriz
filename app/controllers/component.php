<?php

class Component extends Controller{
    function Index(){
        $this->view('template/header');
        $this->view('template/list-component');
        $this->view('template/footer');
    }
}

?>