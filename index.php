<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesión</title>
</head>
<body>
	<h2>Iniciar sesión</h2>
	<form action="login.php" method="post">
		<label for="username">Nombre de usuario:</label>
		<input type="text" name="username" required><br><br>
		<label for="password">Contraseña:</label>
		<input type="password" name="password" required><br><br>
		<input type="submit" value="Iniciar sesión">
	</form>
</body>
</html>