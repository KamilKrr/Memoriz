<?php

class Impressum extends Controller{
    function Index(){
        $baseInfo = array(
            'page' => ''
        );
        $this->view('template/header', $baseInfo);
        $this->view('impressum/index');
        $this->view('template/footer');
    }
}

?>