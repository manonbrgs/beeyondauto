<?php 

// Requête pour l'ajout d'utilisateur dans la BDD

function addNewUser(){
    include '../../modele/inc.connexion.php';
    $new_user = $o_bdd->prepare('INSERT INTO utilisateurs (username, nom, prenom, mail, motdepasse) VALUES (:username, :nom, :prenom, :mail, :motdepasse)');
    $hashed_motdepasse = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
    $new_user->execute(array(
        'username' => strip_tags($_POST['username']),
        'nom' => strip_tags($_POST['nom']),
        'prenom' => strip_tags($_POST['prenom']),
        'mail' => strip_tags($_POST['mail']),
        'motdepasse' => strip_tags($hashed_motdepasse)
    ));

    $new_user->closeCursor();
}
    

?>