<?php

class Toft extends Controller{
    function Index(){
        $baseInfo = array(
            'page' => 'lernen'
        );
        $this->view('template/header', $baseInfo);
        $this->view('toft/index');
        $this->view('template/footer');
    }
}

?>