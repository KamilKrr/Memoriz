<?php

class Team extends Controller{
    function Index(){
        $this->view('template/header');
        $this->view('team/index');
        $this->view('template/footer');
    }
}

?>