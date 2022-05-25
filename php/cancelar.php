<?php
	include '../BD/conexionABD.inc';
	
	@$conexion=pg_connect("host=$servidor port=$puerto dbname=$bd_nombre user=$usuario password=$clave");

	// Si no se logra la conexión, terminar
	if($conexion==false)
	{
        echo "No se pudo conectar";
        exit();
    }

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

	$correo=$_POST['correo'];

	$consulta = "select * from restaurante.usuario where correo='$correo' and estado='1'";
	$update = "update restaurante.usuario set estado='0' where correo='$correo'";

	$resultado = pg_query($conexion,$consulta);
	if($filas = pg_num_rows($resultado)==0)
	{
		header("Location: ../html/datos_incorrectos_admin2.html");
		exit();
	}
	$resultado = pg_query($conexion,$update);
	if($resultado==false)
	{
		header("Location: ../html/datos_incorrectos_admin2.html");
		exit();
	}

	header("Location: cancelar_cuenta.php");
	exit();
?>