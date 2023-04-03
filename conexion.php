<?php
// Conexión a la base de datos
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'bd_login';

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
	die('Error de conexión: ' . mysqli_connect_error());
}
?>