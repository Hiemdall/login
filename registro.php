<?php
include 'conexion.php'; 
// Obtener la contraseña del formulario de registro
$username = $_POST['username'];
$password = $_POST['password'];

// Encriptar la contraseña con el algoritmo bcrypt
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Guardar el nombre de usuario y la contraseña en la base de datos
$sql = "INSERT INTO tbl_users (username, password) VALUES ('$username', '$hashed_password')";
$result = mysqli_query($conn, $sql);
?>