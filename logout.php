<?php
session_start();
session_destroy(); // Destruye la sesión
header("Location: index"); // Redirige al usuario al login (index.php)
exit();
?>
