<?php

$correct = 0;
$prenom_msg ='';
$nom_msg ='';
$mail_msg ='';
$username_msg ='';
$username_exist ='';
$motdepasse_msg ='';
$confmdp_msg ='';
$info_ok ='';
$username_response = '';

if ($_POST && count($_POST)) { // Vérification si le formulaire a bien été transmis

$prenom = strip_tags($_POST['prenom']);
$nom = strip_tags($_POST['nom']);
$mail = strip_tags($_POST['mail']);
$username = strip_tags($_POST['username']);
$motdepasse = strip_tags($_POST['motdepasse']);
$confmdp = strip_tags($_POST['conf-mdp']);

require_once '../../modele/inc.connexion.php';

// Requête pour vérifier si le pseudo existe déjà dans la BDD
$verif_username_exist = $o_bdd->prepare("SELECT username FROM utilisateurs WHERE username=?");
$verif_username_exist->execute([$username]); 
$username_response = $verif_username_exist->fetch();

    if (
        // Vérifier si la variable $prenom existe
        (isset($prenom))&&
        // Vérifier que la variable est de type string
        (is_string($prenom))&&
        // Vérifier qu'un prenom a été saisi
        (!empty($prenom))&&
        // Vérifier le format
        (preg_match('/^[\p{L}\'\-\sáéíóúÁÉÍÓÚàèìòùÀÈÌÒÙäëïöüÄËÏÖÜ]+$/u', $prenom))&& 
        ((strlen($prenom) <= 30)&&(strlen($prenom) >= 2))
    ){

        $prenom_msg = '';

        if (
            // Vérifier si la variable $nom existe
            (isset($nom))&&
            // Vérifier que la variable est de type string
            (is_string($nom))&&
            // Vérifier qu'un nom a été saisi
            (!empty($nom))&&
            // Vérifier le format
            (preg_match('/^[\p{L}\'\-\sáéíóúÁÉÍÓÚàèìòùÀÈÌÒÙäëïöüÄËÏÖÜ]+$/u', $nom))&& 
            ((strlen($nom) <= 30)&&(strlen($nom) >= 2))
        ){

            $nom_msg = '';

            if (
                // Vérifier si la variable $mail existe
                (isset($mail))&&
                // Vérifier que la variable est de type chaîne de caractères
                (is_string($mail))&&
                // Vérifier qu'un mail a été saisi
                (!empty($mail))&&
                // Vérifier le format
                (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $mail))
            ){

                $mail_msg = '';

                if (
                    // Vérifier si la variable $username existe
                    (isset($username))&&
                    // Vérifier que la variable est de type alphanumérique
                    (ctype_alnum($username))&&
                    // Vérifier qu'un pseudo a été saisi
                    (!empty($username))&&
                    // Vérifier le format
                    (preg_match("/^[a-zA-Z0-9]+$/", $username))&& 
                    ((strlen($username) <= 25)&&(strlen($username) >= 3))
                ){

                    $username_msg = "";

                    if (!$username_response){

                        $username_exist = "";

                        if (
                            // Vérifier si la variable $motdepasse existe
                            (isset($motdepasse))&&
                            // Vérifier que la variable est de type chaîne de caractères
                            (is_string($motdepasse))&&
                            // Vérifier qu'un mot de passe a été saisi
                            (!empty($motdepasse))&&
                            // Vérifier le format
                            (strlen($motdepasse) >= 8)&&
                            (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_])(?=.*\\d).+$/", $motdepasse))
                        ){

                            $motdepasse_msg = "";
    
                            if (
                                // Vérifier si la variable $confmdp existe
                                (isset($confmdp))&&
                                // Vérifier que la variable est de type chaîne de caractères
                                (is_string($confmdp))&&
                                // Vérifier qu'un mot de passe de confirmation a été saisi
                                (!empty($confmdp))&&
                                // Vérifier le format
                                (strlen($confmdp) >= 8)&&
                                (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_])(?=.*\\d).+$/", $confmdp))&&
                                // Vérifier que les mots de passes saisis sont identique
                                ($motdepasse == $confmdp)
                            ){

                                $confmdp_msg = '';
                                $correct = 1;
                                $info_ok = 'Votre inscription a bien été prise en compte !'; // Confirmation
                                require_once '../../modele/gestion_client/inscription.php';
                                addNewUser();

                            } else {

                                $confmdp_msg = 'Le mot de passe saisi est incorrect';
                            
                            }
                
                        } else {

                            $motdepasse_msg = 'Saisissez un mot de passe de minimum 8 caractères contenant au moins : un chiffre, une lettre minuscule, une lettre majuscule et un caractère spécial';
                        
                        }

                    } else {

                        $username_exist = 'Pseudo déjà existant';

                    }

                } else {

                    $username_msg = 'Saisissez un pseudo contenant entre 3 et 30 caractères (lettres et chiffres autorisés uniquement)';
                
                }

            } else {
                
                $mail_msg = 'Saisissez une adresse mail valide';
            
            }

        } else {

            $nom_msg = 'Saisissez un nom contenant entre 2 et 30 lettres';
        
        }

    } else {

        $prenom_msg = 'Saisissez un prénom contenant entre 2 et 30 lettres';
    
    }
}

$reponse = [
    "correct" => $correct, 
    "prenom_msg" => $prenom_msg, 
    "nom_msg" => $nom_msg,
    "mail_msg" => $mail_msg,
    "username_msg" => $username_msg,
    "username_exist" => $username_exist,
    "username_response" => $username_response,
    "motdepasse_msg" => $motdepasse_msg,
    "confmdp_msg" => $confmdp_msg,
    "info_ok" => $info_ok];

echo json_encode($reponse);

?>