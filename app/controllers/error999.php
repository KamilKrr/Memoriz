<?php

//invalid memorySet
class Error999 extends Controller{
    function Index(){
        $this->view('template/header');
        $this->view('error/999');
        $this->view('template/footer');
    }
}

?>