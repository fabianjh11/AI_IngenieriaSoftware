<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content-IE="edge">
		<link rel="icon" href="../fotos/Rest-Service.ico">
		<link rel="stylesheet" type="text/css" href="../css/normalize.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family-EB+Garamond&display-swap" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css2?family=Belleza&family=Montserrat:wght@100&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../css/estilo_opinion.css">
		<title>Comentarios</title>
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
						<?php
							session_start();
							if(isset($_SESSION['user']))
							{
								?>
									<button class="Boton" onclick="location.href='cerrar_sesion.php'">Cerrar sesión</button>
								<?php
							}
							else
							{
								?>
									<button class="BotonR" onclick="location.href='../html/registro.html'">Registrarse</button>
									<button class="BotonI" onclick="location.href='../html/login.html'">Iniciar sesión</button>
								<?php
							}
						?>
					</div>
				</li>
			</ul>
		</nav>

		<div class="Seccion">
			<h2 class="Frase">¡La opinion de los comensales es importante!</h2>
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
			    if(isset($_SESSION['user']))
			    {
			    	$rol=$_SESSION['rol'];
			    }

			    $consulta = "select opinion.id, correo, nombre, apellido, fecha, comentario
			    from restaurante.opinion join restaurante.usuario on id_cliente=correo
			    order by fecha asc";

			    $resultado = pg_query($conexion,$consulta);

			    if(pg_num_rows($resultado)>=1)
			    {
					while($fila = pg_fetch_array($resultado))
					{
						$id_comentario = $fila[0];
						$id_cliente = $fila[1];
						$nombre = $fila[2];
						$apellido = $fila[3];
						$fecha = $fila[4];
						$comentario = $fila[5];
						?>
						<div class="Registro">
							<div class="Block">
							<?php
								if(isset($rol) && $rol==1)
								{
									?>
									<p>
										<?php echo "$id_comentario"; ?>
									</p>
									<p>
										<?php echo "$id_cliente"; ?>
									</p>
									<?php
								}
							?>
								<b class="Negrita">
									<?php echo "$nombre\t$apellido"; ?>
								</b>
								<b class="Light">
									<?php echo "$fecha"; ?>
								</b>
							</div>
							<div class="Block Coment">
								<p>
									<?php echo "$comentario"; ?>
								</p>
							</div>
						</div>
						<?php
					}
			    }
			?>
		</div>

		<?php
			if(isset($_SESSION['user']))
			{
				if($_SESSION['rol']==3)
				{
					?>
						<form class="formulario" method="post" action="comentar.php">
							<div class="content">
								<input type="text" class="entradas texto" name="comentario" required="" placeholder="Escriba su comentario">
							</div>

							<div class="content">
								<input type="submit" class="entradas" value="Comentar">
							</div>
						</form>
					<?php
				}
				else
					if($_SESSION['rol']==1)
					{
						?>
							<form class="formulario" method="post" action="eliminar_comentario.php">
								<div class="content">
									<input type="number" class="entradas" name="id" required="" placeholder="ID de comentario" min="1">
								</div>

								<div class="content">
									<input type="submit" class="entradas" value="Eliminar">
								</div>
							</form>
						<?php
					}
			}
		?>

		<footer>
			<p class="Pie">
				Todos los derechos reservados. Copyright (2022 - 2022) - Rest-Service
			</p>
		</footer>
	</body>
</html>