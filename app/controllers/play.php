<?php

class Play extends Controller{
    function Index(){
        $baseInfo = array(
            'page' => 'spielen'
        );
        $this->view('template/header', $baseInfo);
        echo "please select a memory";
        $this->view('template/footer');
    }

    function memory($memorySet){
        if($memorySet == "toft"){
            header("Location: https://memoriz.it/toft");
        }
    }
}

?>