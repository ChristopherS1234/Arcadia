<?php   
session_start();

// Destruction de la session
session_unset();
session_destroy();

header("Location: vet_form.php");  
exit;
?>