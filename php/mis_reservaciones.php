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
		<link rel="stylesheet" type="text/css" href="../css/estilo_reservaciones.css">
		<link rel="stylesheet" type="text/css" href="../css/normalize.css">
		<link href="https://fonts.googleapis.com/css2?family=Belleza&family=Montserrat:wght@100&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
		<title>
			Mis Reservaciones
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
					<div class="Botones">
						<button class="Boton" onclick="location.href='cerrar_sesion.php'">Cerrar sesión</button>
					</div>
				</li>
			</ul>
		</nav>

		<div class="Seccion">
			<h2 class="Frase">¡Consulta tus reservaciones!</h2>
		</div>

		<div class="Contenedor">
			<?php
				include '../BD/conexionABD.inc';
				@$conexion = pg_connect("host=$servidor port=$puerto dbname=$bd_nombre user=$usuario password=$clave");

				if($conexion==false)
				{
			        echo "No se pudo conectar";
			        exit();
			    }

			    $consulta = "select reservacion.id, fecha, hora, cantidad, nombre
			    from restaurante.reservacion join restaurante.cliente_reserva on id_reserva=reservacion.id
			    join restaurante.zona on zona.id=zona
			    where id_cliente='$sesion' and estado='1'
			    order by fecha asc";

			    $resultado = pg_query($conexion,$consulta);

			    if(pg_num_rows($resultado)>=1)
			    {
					?>
					<div class="Registro Encabezado">
						<p>ID</p>
						<p>FECHA</p>
						<p>HORA</p>
						<p>CANTIDAD</p>
						<p>ZONA</p>
					</div>
					<?php
					while($fila = pg_fetch_array($resultado))
					{
						$id = $fila[0];
						$fecha = $fila[1];
						$hora = $fila[2];
						$cantidad = $fila[3];
						$zona = $fila[4];
						?>
						<div class="Registro">
							<p>
								<?php echo "$id"; ?>
							</p>
							<p>
								<?php echo "$fecha"; ?>
							</p>
							<p>
								<?php echo "$hora"; ?>
							</p>
							<p>
								<?php echo "$cantidad"; ?>
							</p>
							<p>
								<?php echo "$zona"; ?>
							</p>
						</div>
						<?php
					}
			    }
			?>
		</div>

		<div class="posicion">
			<form class=formulario method="post" action="cancelar_reserva_cliente.php">	
				<div class="posicion">
					<div>
						<input type="number" class="entradas" required="" name="id" placeholder="ID reserva" min="1">
					</div>

					<div>
						<input type="submit" value="Cancelar" class="entradas">
					</div>
				</div>
			</form>
		</div>

		<div class="Contenedor">
			<button class="Boton" onclick="location.href='reservacion.php'">Regresar</button>
		</div>

		<footer>
			<p class="Pie">
				Todos los derechos reservados. Copyright (2022 - 2022) - Rest-Service
			</p>
		</footer>
	</body>
</html>