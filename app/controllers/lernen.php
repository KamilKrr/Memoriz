<?php

class Lernen extends Controller{
    function Index(){
        $baseInfo = array(
            'page' => 'spielen'
        );
        $this->view('template/header', $baseInfo);
        echo "Bitte eine Memoryset auswählen!";
        $this->view('template/footer');
    }

    function memory($memorySet){
        $this->model("MemorySet");

        if($memorySet == "toft"){
            header("Location: https://memoriz.it/toft");
        }

        $baseInfo = array(
            'page' => 'lernen'
        );
        $this->view('template/header', $baseInfo);

        $memoryInfo = array(
            'name' => 'Tag der offenen Tür',
            'getCards' => function() use ($memorySet){
                $cards = $this->MemorySet->get8RandomFromMemorySet($memorySet);
                shuffle($cards);
                foreach($cards as $card){
                    $memoryKarteInfo = array(
                        'content' => $card['content'],
                        'id' => $card['id']
                    );
                    $this->view('lernen/memory-karte', $memoryKarteInfo);
                }
            }
        );
        $this->view('lernen/index', $memoryInfo);
        $this->view('template/footer');
    }

    private function array_2d_to_1d ($input_array) {
        $output_array = array();
    
        for ($i = 0; $i < count($input_array); $i++) {
          for ($j = 0; $j < count($input_array[$i]); $j++) {
            $output_array[] = $input_array[$i][$j];
          }
        }
    
        return $output_array;
    }
}

?>