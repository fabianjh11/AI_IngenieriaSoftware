<?php
	include '../BD/conexionABD.inc';

	if($_POST['comentario']==null)
	{
		header("Location: comentarios.php");
    	exit();
	}
	$comentario = $_POST['comentario'];

	session_start();

	$sesion=$_SESSION['user'];
	// Se intenta establecer conexión al servidor
	@$conexion=pg_connect("host=$servidor port=$puerto dbname=$bd_nombre user=$usuario password=$clave");

	// Si no se logra la conexión, terminar
	if($conexion==false)
	{
        echo "No se pudo conectar";
        exit();
    }
    $consulta = "insert into restaurante.opinion(id_cliente, comentario)
    values('$sesion', '$comentario')";
    $insercion=pg_query($conexion, $consulta);

    header("Location: comentarios.php");
    exit();
?>