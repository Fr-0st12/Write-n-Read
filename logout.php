<?php
// Démarre la session
session_start();

// Termine la session actuelle
session_unset();
session_destroy();

// Redirige l'utilisateur vers une autre page après la déconnexion
header("Location: index.php"); // Remplacez "index.php" par la page vers laquelle vous souhaitez rediriger l'utilisateur après la déconnexion
exit; // Arrête l'exécution du script après la redirection
?>
