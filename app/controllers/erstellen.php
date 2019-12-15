<?php

class Erstellen extends Controller{
    function Index(){


        if(isset($_POST['submitFile']) && isset($_FILES['memoryFile']) && isset($_POST['memoryName'])){
            $uploadFile = $this->file_get_contents_utf8($_FILES['memoryFile']['tmp_name']);

            $this->model("MemorySet");

            $link = $this->MemorySet->uploadMemoryFile($uploadFile, $_POST['memoryName']);

            $_SESSION['custom_link'] = $link;


            header('Location: https://memoriz.it/erstellen/link');

            exit;
        }
        
        
        $this->web_interface();
    }

    private function file_get_contents_utf8($fn) {
        $content = file_get_contents($fn);
         return mb_convert_encoding($content, 'UTF-8',
             mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
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