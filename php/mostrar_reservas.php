<?php
	echo "Entro";
	include='../BD/conexionABD.inc';
	@$conexion = pg_connect("host=$servidor port=$puerto dbname=$bd_nombre user=$usuario password=$clave");

	if($conexion==false)
	{
        echo "No se pudo conectar";
        exit();
    }

    session_start();

    $user=$_SESSION['user'];
    $consulta = "select id, fecha, hora, cantidad, zona
    from restaurante.reservacion join restaurante.cliente_reserva on id_reserva=id
    where id_cliente='$user' and estado='1'";

    $resultado = pg_query($conexion,$consulta);

    if(pg_num_rows($resultado)>=1)
    {
    	echo "verdadero";
		?>
		<div>
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
			<div>
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