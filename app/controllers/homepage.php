<?php

class Homepage extends Controller{
    function Index(){
        $baseInfo = array(
            'page' => 'startseite'
        );
        $this->view('template/header', $baseInfo);
        $this->view('homepage/index');
        $this->view('template/footer');
    }
}

?>