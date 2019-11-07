<?php

    require_once "connect.php";


    if(isset($_POST['substribe']) && isset($_POST['email'])){

        if(!checkEmail($_POST['email'])){
            echo "Not an Email";
            exit();
        }

        $stmt = $conn->prepare("INSERT INTO Subscriber (pk_id, email, subscribeTime) VALUES (NULL, :email, NULL)");
        $stmt->execute(array(
            "email" => $_POST['email']
        ));

        echo "succesfully registered ".$_POST['email'];

        exit();
    }


    function checkEmail($email) {
        $find1 = strpos($email, '@');
        $find2 = strpos($email, '.');
        return ($find1 !== false && $find2 !== false && $find2 > $find1);
     }
?>