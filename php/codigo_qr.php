<?php
	include '../BD/conexionABD.inc';
	require '../CodigoQR/phpqrcode/qrlib.php';
	session_start();

	if($_SESSION['fecha']==null || $_SESSION['hora']==null || $_SESSION['zona']==null || $_SESSION['cantidad']==null)
	{
		header("Location: reservacion.php");
    	exit();
	}
	$fecha = $_SESSION['fecha'];
	$hora = $_SESSION['hora'];
	$zona = $_SESSION['zona'];
	$cantidad = $_SESSION['cantidad'];

	// Se intenta establecer conexión al servidor
	@$conexion=pg_connect("host=$servidor port=$puerto dbname=$bd_nombre user=$usuario password=$clave");

	// Si no se logra la conexión, terminar
	if($conexion==false)
	{
        echo "No se pudo conectar";
        exit();
    }

    $consulta = "select id from restaurante.reservacion where fecha='$fecha' and hora='$hora' and cantidad='$cantidad' and zona='$zona' and estado='1'";

    $resultado = pg_query($conexion,$consulta);

    if($fila = pg_fetch_array($resultado))
    {
    	$id=$fila[0];
    	$dir = 'Codigos/';
    	if(!file_exists($dir))
    	{
    		mkdir($dir);
    	}

    	$filename = $dir.$id.'.png';
    	$tamanio = 15;
    	$level = 'Q';
    	$frameSize = 3;
    	$contenido = 'Id reserva: '.$id.' | fecha: '.$fecha.' | hora: '.$hora.' | zona: '.$zona.' | cantidad: '.$cantidad;
    	QRcode::png($contenido,$filename,$level,$tamanio,$frameSize);
    	echo '<img src="'.$filename.'"/>';
    }
    echo "Tome captura de esta imagen";
    $_SESSION['fecha'] = "";
	$_SESSION['hora'] = "";
	$_SESSION['zona'] = "";
	$_SESSION['cantidad'] = "";
    ?>
    <a href="../html/reservacion_exito.html">CONTINUAR</a>
    <?php
    exit();
?>