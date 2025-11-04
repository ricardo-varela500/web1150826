<?php

$host = '127.0.0.1';
$user = 'root';  // Cambia esto si tu usuario de MySQL es diferente
$password = 'ricardo0809';  // Deja vacío si no tienes contraseña configurada
$dbname = 'crud_app';

/*
//hosting
    $host = 'sql113.infinityfree.com';
    $user = 'if0_40185846';  
    $password = 'nEICu24MeqneFB';
    $dbname = 'if0_40185846_ico';
*/

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die('Error en la conexión: ' . $conn->connect_error);
}
?>