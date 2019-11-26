<?php
class Testpage extends Controller{
    function Index(){
        
        $this->model("MemorySet");

        $this->view('template/header');

        
        print_r( $this->MemorySet->get8RandomFromMemorySet("1"));
        $memories = $this->MemorySet->getAllMemorySets();

        foreach($memories as $memory){
            //echo $memory['name'];

        }

        $this->view('template/footer');
    }
}


?>