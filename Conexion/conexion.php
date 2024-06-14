<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','appvicola');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try {
    $pdo = new PDO($servidor,USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
} catch (Exception $e) {
    echo "no conexion";
}

date_default_timezone_set("America/Bogota");
$fechaHora = date('Y-m-d h:i:s');