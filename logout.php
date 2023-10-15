<?php
session_start();
session_destroy();
header("Location: login.php"); // Redirecionar para a página de login após sair
exit();
?>
