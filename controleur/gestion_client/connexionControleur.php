<?php

$retour_msg = array();

if ($_POST && count($_POST)) { // Vérification si le formulaire a bien été transmis
    
    $username = strip_tags($_POST['username']);
    $motdepasse = strip_tags($_POST['password']);

    if (
        // Vérifier si la variable $username existe
        (isset($username))&&
        // Vérifier que la variable est de type alphanumérique
        (ctype_alnum($username))&&
        // Vérifier qu'un pseudo a été saisi
        (!empty($username))
    ){

        if (
            // Vérifier si la variable $motdepasse existe
            (isset($motdepasse))&&
            // Vérifier que la variable est de type chaîne de caractères
            (is_string($motdepasse))&&
            // Vérifier qu'un mot de passe a été saisi
            (!empty($motdepasse))
        ){

            $retour_msg['msg'] = "";

            $_SESSION['utilisateurs'] = array();

            global $o_bdd;

            // Requête pour vérifier si le pseudo existe bien dans la base de données
            $sql = 'SELECT * FROM utilisateurs WHERE username = :username';

            include '../../modele/inc.connexion.php'; // Connexion à la base de données

            $verif_login = $o_bdd -> prepare($sql);
            $verif_login->execute(['username' => strip_tags($_POST['username'])]);
            $data_login = $verif_login->fetch();

            if ($data_login){
                $_SESSION['utilisateurs'] = $data_login;
            }

            if (
                // Vérifier le format
                (preg_match("/^[a-zA-Z0-9]+$/", $username))&& 
                ((strlen($username) <= 25)&&(strlen($username) >= 3))&&
                // Vérification si le pseudo existe déjà dans la BDD
                ($data_login)
            ){

                $retour_msg['msg'] = "";

                if (
                    // Vérifier le format
                    (strlen($motdepasse) >= 8)&&
                    (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_])(?=.*\\d).+$/", $motdepasse))&&
        
                    // Vérification si le mot de passe et le pseudo correspondent bien 
                    (password_verify($motdepasse, $data_login['motdepasse']))
                ){

                    $retour_msg['msg'] = "";
                    $retour_msg['correct'] = 1;

                } else {

                    $retour_msg['msg']= 'Identifiants invalides'; // Message d'erreur 

                }

            } else {

                $retour_msg['msg']= 'Identifiants invalides'; // Message d'erreur 

            }

        } else {
    
            $retour_msg['msg']= 'Veuillez remplir tous les champs'; // Message d'erreur 
        }

    } else {

        $retour_msg['msg']= 'Veuillez remplir tous les champs'; // Message d'erreur 

    }
}


echo json_encode($retour_msg);

?>