<?php
	session_start();

	error_reporting(0);
	$sesion=$_SESSION['user'];
	$rol=$_SESSION['rol'];
	if(!isset($sesion))
	{
		session_destroy();
		header("Location: ../html/login.html");
	}
	if($rol==2)
	{
		header("Location: gerente.php");
	}
	else
		if($rol==3)
		{
			header("Location: sesion.php");
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="keywords" content="restaurante, reservacion, comida, reservación, restaurantes, reservas, reservaciones">
		<meta name="copyright" content="MACROSONY">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../fotos/Rest-Service.ico">
		<link rel="stylesheet" type="text/css" href="../css/estilo_users.css">
		<link rel="stylesheet" type="text/css" href="../css/normalize.css">
		<link href="https://fonts.googleapis.com/css2?family=Belleza&family=Montserrat:wght@100&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
		<title>
			Administrador
		</title>
	</head>
	<body>
		<nav class="Menu">
			<ul>
				<li>
					<div class="Home" onclick="location.href='admin.php'">
						<div class="Logo">
							<img src="../fotos/Rest-Service.png">
						</div>
						<h1 class="Nombre">Rest-Service</h1>
						<p class=Nombre2>®</p>
					</div>
				</li>
				<li>
					<div class="Botones">
						<button class="Boton" onclick="location.href='cerrar_sesion.php'">Cerrar sesión</button>
					</div>
				</li>
			</ul>
		</nav>
		
		<div class="Seccion">
			<h2 class="Frase">Bienvenido ADMINISTRADOR</h2>
		</div>

		<div class="Medio">
			<button class="Contenido" onclick="location.href='cancelar_cuenta.php'">Inhabilitar Cuentas</button>
			<button class="Contenido" onclick="location.href='verificar.php'">Verificar Cuentas</button>
			<button class="Contenido" onclick="location.href='comentarios.php'">Moderar Comentarios</button>
		</div>

		<footer>
			<p class="Pie">
				Todos los derechos reservados. Copyright (2022 - 2022) - Rest-Service
			</p>
		</footer>
	</body>
</html>