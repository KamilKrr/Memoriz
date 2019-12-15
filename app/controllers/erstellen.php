<?php

class Erstellen extends Controller{
    function Index(){


        if(isset($_POST['submitFile']) && isset($_FILES['memoryFile']) && isset($_POST['memoryName'])){
            $uploadFile = file_get_contents($_FILES['memoryFile']['tmp_name']);

            $this->model("MemorySet");

            $link = $this->MemorySet->uploadMemoryFile($uploadFile, $_POST['memoryName']);

            $_SESSION['custom_link'] = $link;


            header('Location: https://memoriz.it/erstellen/link');

            exit;
        }
        
        
        $this->web_interface();
    }

    function datei_upload($subsite = ""){
        $baseInfo = array(
            'page' => 'erstellen'
        );

        if($subsite == "anleitung"){
            $this->view('template/header', $baseInfo);

            $this->view('erstellen/anleitung');
    
            $this->view('template/footer');

        }else{
            $this->view('template/header', $baseInfo);

            $this->view('erstellen/datei-upload');
    
            $this->view('template/footer');
        }
        

        
    }

    function web_interface(){
        $baseInfo = array(
            'page' => 'erstellen'
        );

        $this->view('template/header', $baseInfo);

        $this->view('erstellen/web-interface');

        $this->view('template/footer');
    }

    function link(){

        if(!isset($_SESSION['custom_link'])){
            $this->web_interface();
        }

        $baseInfo = array(
            'page' => 'erstellen'
        );

        $linkData = array(
            'link' => $_SESSION['custom_link']
        );

        $this->view('template/header', $baseInfo);

        $this->view('erstellen/custom-link', $linkData);
        
        $this->view('template/footer');
    }
}

?>