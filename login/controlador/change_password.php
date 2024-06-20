<?php 
require_once('../conexion.php');
$id = $_POST['id'];
$pass = md5($_POST['new_password']);

$query = "UPDATE usuario set contraseña= '$pass' WHERE id_usuario= $id";
$conn->query($query);

header("Location: ../ingreso.php?message=success_password");

?>