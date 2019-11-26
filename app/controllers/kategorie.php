<?php

class Kategorie extends Controller{
    function Index(){
        $this->model("MemorySet");

        $this->view('template/header');
        $this->view('kategorie/kategorie-header');


        $memories = $this->MemorySet->getAllMemorySets();

        foreach($memories as $memory){

            $memorySetData = array(
                'name' => $memory['name'],
                'kategorie' => $memory['kategorie_name'],
                'jahrgang' => $memory['jahrgang'],
                'beschreibung' => $memory['beschreibung'],
                'autor' => $memory['autor'],
                'tags' => $memory['tags'],
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