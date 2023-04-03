<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderator</title>
</head>
<body>
    <h1>Moderator</h1>
    <?php
  session_start(); // Iniciar la sesión
  $username = $_SESSION['username'];
  
  echo $username;
  
  // Verificar el nivel de acceso del usuario
  if ($_SESSION['access_level'] >= 2) {
    $button_disabled = ""; // El botón está habilitado
  } else {
    $button_disabled = "disabled"; // El botón está deshabilitado
  }
?>

<!-- Mostrar el botón con el atributo "disabled" establecido según el nivel de acceso -->
<button <?php echo $button_disabled; ?>>Botón</button>
</body>
</html>