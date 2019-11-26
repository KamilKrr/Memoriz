<?php

class Toft extends Controller{
    function Index(){
        $baseInfo = array(
            'page' => 'spielen'
        );
        $this->view('template/header', $baseInfo);
        $this->view('toft/index');
        $this->view('template/footer');
    }
}

?>