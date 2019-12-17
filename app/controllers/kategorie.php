<?php

class Kategorie extends Controller{
    function Index(){
        $this->model("MemorySet");

        $baseInfo = array(
            'page' => 'lernen'
        );
        $this->view('template/header', $baseInfo);

        
        $memories = $this->MemorySet->getAllMemorySets();

        $allKategories = array();
        $allJahrgaenge = array();

        foreach($memories as $memory){
            array_push($allKategories, $memory['kategorie_name']);
            array_push($allJahrgaenge, $memory['jahrgang']);
        }

        $allKategories = array_unique($allKategories);
        $allJahrgaenge = array_unique($allJahrgaenge);

        sort($allKategories);
        sort($allJahrgaenge);

        
        $kategorienFilterBar = array(
            'getKategorien' => function() use ($allKategories){
                foreach($allKategories as $kategory){
                    $kategorieInfo = array(
                        'content' => $kategory
                    );
                    $this->view('kategorie/select-option-component', $kategorieInfo);
                }
            },
            'getJahrgaenge' => function() use ($allJahrgaenge){
                foreach($allJahrgaenge as $jahrgang){
                    $jahrgangInfo = array(
                        'content' => $jahrgang
                    );
                    $this->view('kategorie/select-option-component', $jahrgangInfo);
                }
            }
        );
        

        $this->view('kategorie/kategorie-header', $kategorienFilterBar);



        foreach($memories as $memory){

            $memorySetData = array(
                'name' => $memory['name'],
                'kategorie' => $memory['kategorie_name'],
                'jahrgang' => $memory['jahrgang'],
                'beschreibung' => nl2br($this->MemorySet->escapeHTML($memory['beschreibung'])),
                'autor' => $memory['autor'],
                'tags' => $memory['tags'],
                'link' => $memory['link'],
                'getTags' => function() use ($memory){
                    foreach($memory['tags'] as $tag){
                        $tagText = array(
                            'tag' => $tag
                        );
                        $this->view('kategorie/tag', $tagText);
                    }
                }
            );
    
            $this->view('kategorie/list-component', $memorySetData);
        }
        
        $this->view('kategorie/kategorie-footer');
        $this->view('template/footer');
    }
}

?>