<?php

class GlobalClass {
    function addImage(){
        if (!empty($_POST)){
            $succes = true;
            if(!empty($_FILES)){
                if ($_FILES["image"]["size"] > 1000000) {
                    echo "<small>Votre fichier image est trop lourd</small>";
                    $succes = false;
                }
                $extension = pathinfo($_FILES['image']['name'])['extension'];
                if ($extension !='jpeg' && $extension!='png' && $extension !='jpg'){
                    echo "<small>erreur, le fichier n'est pas dans le bon format";
                    $succes = false;
                }
                
            }
            if ($succes){
                echo "<p>L'animal a bien été ajouté<p>";
                $fileName = strtolower( $_POST['nom'].'.'.$extension);
                $fileName = str_replace(' ','_',$fileName);
                move_uploaded_file($_FILES["image"]["tmp_name"], "image/".$fileName);

            }
           
        }
    }
}