<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["nombre"])) {
    header("Location: ingreso.html");
    exit();
}
?>