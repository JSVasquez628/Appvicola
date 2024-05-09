<?php 

$sql_usuarios = "SELECT usuario.id_usuario, usuario.n_documento, usuario.tipo_documento, usuario.nombres, usuario.apellidos, usuario.correo, usuario.direccion, usuario.telefono, rol.nombre_rol AS rol FROM usuario INNER JOIN roles AS rol ON usuario.id_rol = rol.id_rol;";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);