<?php 
session_start();
include('../inc.connexion.php');
include('../../vue/pages/templates/mon-compte.php');


if (isset($_POST['btn'])){   
   
   if (isset($_SESSION['utilisateurs'])) {

      // Retrieve the user's information from the session variable
      $user = $_SESSION['utilisateurs'];
  
      // Check if the form has been submitted
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
          // Retrieve the form data and update the user's information in the session variable
          $user['prenom'] = $_POST['prenom'];
          $user['nom'] = $_POST['nom'];
          $user['username'] = $_POST['username'];
          $user['mail'] = $_POST['mail'];
          $user['motdepasse'] = $_POST['motdepasse'];
          
  
          // Update the user's session variable
          $_SESSION['utilisateurs'] = $user;
  
         
      }
  
   


   }

}



   

?>