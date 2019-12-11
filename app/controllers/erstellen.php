<?php

class Erstellen extends Controller{
    function Index(){


        if(isset($_POST['submitFile']) && isset($_FILES['memoryFile'])){
            $uploadFile = file_get_contents($_FILES['memoryFile']['tmp_name']);

            $this->model("MemorySet");

            $link = $this->MemorySet->uploadMemoryFile($uploadFile);

            $_SESSION['custom_link'] = $link;

            header('Location: http://test.local/erstellen/link');

            exit;
        }
        
        
        $this->web_interface();
    }

    function datei_upload(){
        $baseInfo = array(
            'page' => 'erstellen'
        );

        $this->view('template/header', $baseInfo);

        $this->view('erstellen/datei-upload');

        $this->view('template/footer');
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