<?php
	include '../BD/conexionABD.inc';

	if($_POST['rol']==null || $_POST['correo']==null || $_POST['nombre']==null || $_POST['apellido']==null || $_POST['password']==null || $_POST['telefono']==null)
	{
		header("Location: ../html/registro.html");
    	exit();
	}
	$rol = $_POST['rol'];
	$correo = $_POST['correo'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$tel = $_POST['telefono'];

	if($password!=$password2)
	{
		header("Location: ../html/datos_incorrectos_registro.html");
    	exit();
	}

	echo "$rol";

	switch ($rol)
	{
		case 'Cliente':
			$rol = 3;
			break;
		case 'Restaurante':
			$rol = 2;
			break;
		case 'Administrador':
			$rol = 1;
			break;
		default:
			break;
	}

	session_start();
	// Se intenta establecer conexión al servidor
	@$conexion=pg_connect("host=$servidor port=$puerto dbname=$bd_nombre user=$usuario password=$clave");

	// Si no se logra la conexión, terminar
	if($conexion==false)
	{
        echo "No se pudo conectar";
        exit();
    }

    switch($rol)
    {
    	case 1:
    		$insercion=pg_query($conexion, "insert into restaurante.usuario(correo, password, nombre, apellido, telefono, estado, rol)
    		values('$correo','$password','$nombre','$apellido','$tel','0','$rol')");
    		break;
    	case 2:
    		$insercion=pg_query($conexion, "insert into restaurante.usuario(correo, password, nombre, apellido, telefono, estado, rol)
    		values('$correo','$password','$nombre','$apellido','$tel','0','$rol')");
    		break;
    	case 3:
    		$insercion=pg_query($conexion, "insert into restaurante.usuario(correo, password, nombre, apellido, telefono, rol)
    		values('$correo','$password','$nombre','$apellido','$tel','$rol')");
    		break;
    	default:
    		break;
    }

	// Si hay un error es porque no se concretó la consulta			
    if($insercion==false)
    {
        header("Location: ../html/correo_existente.html");
        exit();
    }
    header("Location: ../html/registro_exito.html");
    exit();
?>