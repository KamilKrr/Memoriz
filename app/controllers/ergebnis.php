<?php

class Ergebnis extends Controller{
    function Index(){
        $baseInfo = array(
            'page' => 'lernen'
        );
        $this->view('template/header', $baseInfo);

        $activeMemorySet = $_SESSION['memorySet_active'];

        


        $this->view('ergebniss/index');
        $this->view('template/footer');
    }
}

?>