<?php
include 'conexion.php'; 

// Obtener el nombre de usuario y la contraseña del formulario de inicio de sesión
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta SQL para buscar el usuario en la base de datos
$sql = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if ($result === false) {
	// Si hay un error de consulta, se muestra un mensaje de error
	echo "Error de consulta: " . mysqli_error($conn);
} elseif (mysqli_num_rows($result) == 1) {
	// Si el usuario existe, se obtiene su nivel de acceso
	$row = mysqli_fetch_assoc($result);
	$access_level = $row['access_level'];

	// Se inicia la sesión y se establece el nivel de acceso del usuario
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['access_level'] = $access_level;

	// Se redirige al usuario a la página correspondiente según su nivel de acceso
	if ($access_level == 1) {
		header('Location: moderator.php');
		exit();
	} elseif ($access_level == 2) {
		header('Location: moderator.php');
		exit();
	} elseif ($access_level == 3) {
		header('Location: admin.php');
		exit();
	}
} else {
	// Si el usuario no existe, se muestra un mensaje de error
	echo "Nombre de usuario o contraseña incorrectos.";
}

// Cierre de la conexión a la base de datos
mysqli_close($conn);
?>