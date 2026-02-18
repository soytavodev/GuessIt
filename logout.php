<?php
// logout.php - Destruir la sesión

session_start(); // Rescatamos la sesión actual
session_unset(); // Borramos las variables ($_SESSION['user_id'], etc)
session_destroy(); // Destruimos la sesión en el servidor

// Redirigimos al usuario a la portada
header("Location: index.php");
exit;
?>
