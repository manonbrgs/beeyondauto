<?php

    if (isset($_POST['username'])){
        
        $username = strip_tags($_POST['username']);
        
        if (isset($_POST['motdepasse'])){
            
            $motdepasse = strip_tags($_POST['motdepasse']);
            
            // Requête pour savoir si l'utilisateur saisi existe dans la bdd
            $sql = 'SELECT * FROM utilisateurs WHERE username = :username';
            $verif_login = $o_bdd -> prepare($sql);
            $verif_login->execute(['username' => $username]);
            $data_login = $verif_login->fetch();
        } 
    } 
    
?>