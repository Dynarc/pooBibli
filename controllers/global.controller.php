<?php

class GlobalController {

    function addImage(){
        if(!empty($_FILES)){
            if ($_FILES["image"]["size"] > 1000000) {
                throw new Exception('Fichier trop lourd'); 
            }
            else{
                $extension = pathinfo($_FILES['image']['name'])['extension'];

                if ($extension !='jpeg' && $extension!='png' && $extension !='jpg'){
                    throw new Exception('Fichier invalide');
                } elseif($_FILES['image']['error']){
                    throw new Exception("Erreur à l'envoi du fichier");
                } else {
                    move_uploaded_file($_FILES["image"]["tmp_name"], "image/".$_FILES['image']['name']);
                    return true;
                }
            }
        }
    }

}