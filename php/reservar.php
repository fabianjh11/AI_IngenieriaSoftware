<?php
	include '../BD/conexionABD.inc';

	if($_POST['fecha']==null || $_POST['hora']==null || $_POST['zona']==null || $_POST['cantidad']==null)
	{
		header("Location: reservacion.php");
    	exit();
	}
	$fecha = $_POST['fecha'];
	$hora = $_POST['hora'];
	$zona = $_POST['zona'];
	$cantidad = $_POST['cantidad'];

	session_start();

	$id=$_SESSION['user'];
	// Se intenta establecer conexión al servidor
	@$conexion=pg_connect("host=$servidor port=$puerto dbname=$bd_nombre user=$usuario password=$clave");

	// Si no se logra la conexión, terminar
	if($conexion==false)
	{
        echo "No se pudo conectar";
        exit();
    }

    date_default_timezone_set('UTC');
    date_default_timezone_set("America/Mexico_city");

    //Validar antes del día actual
    $hoy = date('Y-m-d');
    if($fecha<$hoy)
	{
		header("Location: ../html/datos_incorrectos_reserva.html");
		exit();
	}
	if($fecha==$hoy)
	{
		$hora_actual = date('H:00');
		if($hora_actual>=$hora)
		{
			header("Location: ../html/datos_incorrectos_reserva.html");
			exit();
		}
	}

	$validar = pg_query($conexion, "select * from restaurante.reservacion where fecha='$fecha' and hora='$hora' and zona='$zona' and estado='1'");

	if(pg_num_rows($validar)==1)
	{
		header("Location: ../html/reservacion_existente.html");
		exit();
	}

    $insercion = pg_query($conexion, "insert into restaurante.reservacion(zona, fecha, hora, cantidad, estado)
    values('$zona','$fecha','$hora','$cantidad','1')");
	// Si hay un error es porque no se concretó la consulta			
    if($insercion==false)
    {
        header("Location: reservacion.php");
        exit();
    }
    $consulta = pg_query($conexion, "select id from restaurante.reservacion where fecha='$fecha' and hora='$hora' and zona='$zona' and cantidad='$cantidad'");
    if($fila = pg_fetch_array($consulta))
    {
    	$id_reserva=$fila[0];
    }

    $insercion = pg_query($conexion, "insert into restaurante.cliente_reserva(id_cliente, id_reserva) values('$id','$id_reserva')");
    if($insercion==false)
    {
        header("Location: reservacion.php");
        exit();
    }
    $_SESSION['fecha']=$fecha;
    $_SESSION['hora']=$hora;
    $_SESSION['zona']=$zona;
    $_SESSION['cantidad']=$cantidad;
    header("Location: codigo_qr.php");
    exit();
?>