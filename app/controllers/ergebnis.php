<?php

class Ergebnis extends Controller{
    function Index(){
        $baseInfo = array(
            'page' => 'lernen'
        );
        $this->view('template/header', $baseInfo);

        $memorySetActiveMarkup = $_SESSION['memorySetActiveMarkup'];

        foreach($memorySetActiveMarkup as $memoryPairActiveMarkup){
            $memoryPairResult = array(
                'card1' => $memoryPairActiveMarkup[0],
                'card2' => $memoryPairActiveMarkup[1],
                'description' => $memoryPairActiveMarkup[2] ?? "Keine Beschreibung vorhanden"
            );
    
    
            $this->view('ergebnis/memory-result-component', $memoryPairResult);
        }

        
        $this->view('template/footer');
    }
}

?>