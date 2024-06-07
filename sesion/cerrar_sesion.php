<?php
session_start();
session_destroy();
header("location: ../login/vistas/ingreso.php");
?>