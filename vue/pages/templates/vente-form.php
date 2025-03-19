<?php 
include('../../../modele/inc.connexion.php');
include ('vente.php');

// Sanitize input parameters
$marque = filter_var(strtoupper($_POST['marque']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$model = filter_var(strtoupper($_POST['model']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$date = filter_var($_POST['annedesortie'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$anneedesortie = date("Y" , strtotime($date));
$type = filter_var(strtoupper($_POST['type']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$moteur = filter_var(strtoupper($_POST['moteur']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nombredeportes = filter_var($_POST['nombredeportes'], FILTER_VALIDATE_INT);
$nombredeplaces = filter_var($_POST['nombredeplaces'], FILTER_VALIDATE_INT);
$prix_vente = filter_var($_POST['prix_vente'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$puissance_ch = filter_var($_POST['puissance_ch'], FILTER_VALIDATE_INT);
$etat = 'OCCASION';

// Prepare SQL query with parameterized placeholders
$sql = "INSERT INTO vehicules (marque, modelFamily, anneedesortie, type, moteur, nombredeportes, nombredeplaces, prix_vente, etat, puissance_ch ) VALUES (:marque, :modelFamily, :anneedesortie, :type, :moteur, :nombredeportes, :nombredeplaces, :prix_vente, :etat, :puissance_ch)";
$stmt = $o_bdd->prepare($sql);



// Bind sanitized input parameters to the prepared statement
$stmt->bindParam(':marque', $marque);
$stmt->bindParam(':modelFamily', $model);
$stmt->bindParam(':anneedesortie', $anneedesortie);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':moteur', $moteur);
$stmt->bindParam(':nombredeportes', $nombredeportes);
$stmt->bindParam(':nombredeplaces', $nombredeplaces);
$stmt->bindParam(':prix_vente', $prix_vente);
$stmt->bindParam(':etat', $etat);
$stmt->bindParam(':puissance_ch', $puissance_ch);

// Execute the prepared statement
$stmt->execute();

// Check for errors
if ($stmt->errorCode() !== '00000') {
    $errorInfo = $stmt->errorInfo();
    error_log("Error: " . $errorInfo[2]);
    die("An error occurred while inserting data. Please try again later.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Process form submission here
   // Check for errors
   $has_error = true; // Change this based on your error-checking logic
   
   if (!$has_error) {
      // Error, return error message
      echo '<script>document.querySelector(".feedback-msg.error").style.display = "block";</script>';
   } else {
        // No error, return success message
      echo '<script>document.querySelector(".feedback-msg.validate").style.display = "block";</script>';

      
   }
}



?>