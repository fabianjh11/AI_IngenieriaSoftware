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
		<link rel="stylesheet" type="text/css" href="../css/estilo_administrador.css">
		<link rel="stylesheet" type="text/css" href="../css/normalize.css">
		<link href="https://fonts.googleapis.com/css2?family=Belleza&family=Montserrat:wght@100&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
		<title>
			Verificar Cuentas
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
			<h2 class="Frase">Verificar cuentas</h2>
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

			    session_start();

			    $consulta = "select correo, usuario.nombre, apellido, telefono, rol.nombre
			    from restaurante.usuario join restaurante.rol on id=rol
			    where estado='0'";

			    $resultado = pg_query($conexion,$consulta);

			    if(pg_num_rows($resultado)>=1)
			    {
					?>
					<div class="Registro Encabezado">
						<p>ID</p>
						<p>NOMBRE</p>
						<p>APELLIDO</p>
						<p>TELEFONO</p>
						<p>ROL</p>
					</div>
					<?php
					while($fila = pg_fetch_array($resultado))
					{
						$correo = $fila[0];
						$nombre = $fila[1];
						$apellido = $fila[2];
						$telefono = $fila[3];
						$rol = $fila[4];
						?>
						<div class="Registro">
							<p>
								<?php echo "$correo"; ?>
							</p>
							<p>
								<?php echo "$nombre"; ?>
							</p>
							<p>
								<?php echo "$apellido"; ?>
							</p>
							<p>
								<?php echo "$telefono"; ?>
							</p>
							<p>
								<?php echo "$rol"; ?>
							</p>
						</div>
						<?php
					}
			    }
			?>
		</div>

		<form class="formulario" method="post" action="verificar_cuenta.php">
			<div class="content">
				<input type="email" class="entradas" name="correo" required="" placeholder="Escriba el correo electrónico">
			</div>

			<div class="content">
				<input type="submit" value="Verificar" class="entradas">
			</div>
		</form>

		<div class="Contenedor">
			<button class="Boton" onclick="location.href='admin.php'">Regresar</button>
		</div>

		<footer>
			<p class="Pie">
				Todos los derechos reservados. Copyright (2022 - 2022) - Rest-Service
			</p>
		</footer>
	</body>
</html>