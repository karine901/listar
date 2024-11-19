<?php
session_start();
session_destroy();
header('Location: listar-usuario.php');
exit;
?>