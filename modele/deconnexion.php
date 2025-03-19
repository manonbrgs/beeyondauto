<?php 

session_start();
session_destroy();
header('location: /demos/beeyondauto/index.php');
?>