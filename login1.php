<?php
include 'conexion.php'; 

// Obtención de los datos del formulario
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Consulta SQL para buscar el usuario en la base de datos
$sql = "SELECT * FROM tbl_users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) == 1) {
    // Si el usuario existe, se obtiene su contraseña encriptada y su nivel de acceso
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];
    $access_level = $row['access_level'];

    // Se verifica la contraseña encriptada con la función password_verify()
    if (password_verify($password, $hashed_password)) {
        // Si la contraseña es correcta, se inicia la sesión del usuario y se establece su nivel de acceso
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['access_level'] = $access_level;
        header('Location: home.php');
        exit();
    } else {
        // Si la contraseña es incorrecta, se muestra un mensaje de error
        echo "Nombre de usuario o contraseña incorrectos.";
    }
} else {
    // Si el usuario no existe, se muestra un mensaje de error
    echo "Nombre de usuario o contraseña incorrectos.";
}
// Cierre de la conexión a la base de datos
mysqli_close($conn);
?>