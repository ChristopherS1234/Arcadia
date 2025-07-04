<?php
session_start();

// Destruction de la session
session_unset();
session_destroy();

header("Location: admin_form.php");
exit;
?>
