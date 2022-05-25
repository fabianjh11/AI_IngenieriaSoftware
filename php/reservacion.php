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
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Reservación</title>
		<link rel="stylesheet" type="text/css" href="../css/estilo_reservacion.css">
		<link rel="stylesheet" type="text/css" href="../css/normalize.css">
		<link rel="icon" href="../fotos/Rest-Service.ico">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
	</head>
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
					<div class="Botones">
						<button class="Boton" onclick="location.href='cerrar_sesion.php'">Cerrar sesión</button>
					</div>
				</li>
			</ul>
		</nav>
		<div class="Titulo">
			<h2 class="Titulo1">Reserva con Rest-Service</h2>
		</div>
		<div class="Medio">
			<form class="Cuestionario" method="post" action="reservar.php">
				<div class="Cuestionario1">
					<div class="CuestionarioA 1A">
						<p>Fecha</p>
					</div>
					<div class="CuestionarioA 1B">
						<input type="date" name="fecha" required="" max="2024-12-31">
					</div>
				</div>
				<div class="Cuestionario2">
					<div class="CuestionarioA 2A">
						<p>Hora</p>
					</div>
					<div class="CuestionarioA 2B">
						<select type="" name="hora" required="">
							<option value="">Elige tu hora</option>
							<option>09:00</option>
							<option>10:00</option>
							<option>11:00</option>
							<option>12:00</option>
							<option>13:00</option>
							<option>14:00</option>
							<option>15:00</option>
							<option>16:00</option>
							<option>17:00</option>
							<option>18:00</option>
							<option>19:00</option>
						</select>
					</div>
				</div>
				<div class="Cuestionario3">
					<div class="CuestionarioA 3A">
						<p>Zona</p>
					</div>
					<div class="CuestionarioA 3B">
						<select type="" name="zona" required="">
							<option value="">Elige una opción</option>
						    <option>1</option>
							<option>2</option>
						    <option>3</option>
						    <option>4</option>
						    <option>5</option>
						</select> 
					    
					</div>
				</div>
				<div class="Cuestionario4">
					<div class="CuestionarioA 4A">
						<p>Cantidad de personas</p>
					</div>
					<div class="CuestionarioA 4B">
						<input type="number" name="cantidad" required="" min="1" max="15">
					</div>
				</div>
				<div class="Cuestionario5">
					<div class="CuestionarioA">
						<input type="submit" value="Reservar">
					</div>				
				</div>
			</form>
			<section class="Mapa">
				<div class="Mapa1">
					<p onclick="location.href='mis_reservaciones.php'">Tus reservaciones</p>
				</div>
				<div class="Mapa2">
					<img src="../fotos/mapa.PNG">
				</div>
			</section>
		</div>
		<footer>
			<p>Todos los derechos reservados. Copyright(2022 - 2022) - Rest-Service</p>
		</footer>
	</body>
</html>