<?php
$id_usuario_get = $_GET['id'];

$sql_usuarios = "SELECT usuario.id_usuario, usuario.n_documento, usuario.tipo_documento, usuario.nombres, usuario.apellidos,
usuario.correo, usuario.direccion, usuario.telefono, rol.nombre_rol AS rol 
FROM `usuario` INNER JOIN roles AS rol ON usuario.id_rol = rol.id_rol WHERE id_usuario ='$id_usuario_get'";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario_dato) {
    $documento = $usuario_dato['n_documento'];
    $tipo_documento = $usuario_dato['tipo_documento'];
    $nombres = $usuario_dato['nombres'];
    $apellido = $usuario_dato['apellidos'];
    $correo = $usuario_dato['correo'];
    $direccion = $usuario_dato['direccion'];
    $telefono = $usuario_dato['telefono'];
    $rol = $usuario_dato['rol'];
}