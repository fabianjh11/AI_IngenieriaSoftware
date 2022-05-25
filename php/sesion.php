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
	if($rol==1)
	{
		header("Location: admin.php");
	}
	else
		if($rol==2)
		{
			header("Location: gerente.php");
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
		<link rel="stylesheet" type="text/css" href="../css/estilo_sesion.css">
		<link rel="stylesheet" type="text/css" href="../css/normalize.css">
		<link href="https://fonts.googleapis.com/css2?family=Belleza&family=Montserrat:wght@100&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
		<title>
			Rest-Service
		</title>
	</head>

	<!--------------------------------------------------------------------------------------------------------------------------------------------------->
	<body>
		<nav class="Menu">
			<ul>
				<li>
					<div class="Home" onclick="location.href='sesion.php'">
						<div class="Logo">
							<img src="../fotos/Rest-Service.png">
						</div>
						<h1 class="Nombre">Rest-Service</h1>
						<p class=Nombre2>®</p>
					</div>
				</li>
				<li>
					<div class="Ubica" onclick="location.href='https://www.google.com/maps/place/Ant%C3%A1rtida/@-75.05435,0,3z/data=!3m1!4b1!4m8!1m2!2m1!1sgoogle+maps!3m4!1s0xa4b9967b3390754b:0x6e52be1f740f2075!8m2!3d-75.250973!4d-0.071389'">
						<img class="Ubica1" src="../fotos/ubicacion.png">
						<p class='Ubica2'>Ubicación</p>
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
			<h2 class="Frase">¡Haz tu reservación ahora!</h2>
			<button class="BotonReserva" onclick="location.href='reservacion.php'">Reservar</button>
		</div>

		<div class="FlexContainer">
			<div class="Bloques Bloque1">
				<img class="Items Item1" src="../fotos/platillo.png">
				<button class="Items Item2" onclick="location.href='menu.php'">
					Ver Menú
				</button>
				<img class="Items Item3" src="../fotos/burguir.jpg">
			</div>
			<div class="Bloques Bloque2">
				<div class="Objetos Objeto1">
					<p>
						En Rest-Service buscamos ofrecerte un servicio de calidad y las mejores experiencias a un precio justo.<br>
						Somos una empresa líder en el área culinaria, con años de trabajo que nos respaldan.
					</p>
				</div>
				<img class="Objetos Objeto2" src="../fotos/picsa.jpg">
			</div>
			<div class="Bloques Bloque3">
				<img class="Elementos Elemento1" src="../fotos/Restaurante.jpg">
				<img class="Elementos Elemento2" src="../fotos/Restaurante2.jpg">	
			</div>
		</div>

		<div class="Abajo">
			<b class="Comentarios">Explora las opiniones y comentarios: </b>
			<button class="ComentariosB" onclick="location.href='comentarios.php'">Valoraciones</button>
		</div>

		<footer>
			<p class="Pie">
				Todos los derechos reservados. Copyright (2022 - 2022) - Rest-Service
			</p>
		</footer>
	</body>
</html>