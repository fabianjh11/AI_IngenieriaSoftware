<?php
	// Se incluyen los parámetros de la conexión		
    include '../BD/conexionABD.inc';
	
    if($_POST['correo']==null || $_POST['password']==null || $_POST['rol']==null)
    {
    	header("Location: ../html/login.html");
    	exit();
    }

	session_start();
	// Se intenta establecer conexión al servidor
	@$conexion=pg_connect("host=$servidor port=$puerto dbname=$bd_nombre user=$usuario password=$clave");

	// Si no se logra la conexión, terminar
	if($conexion==false){
        echo "No se pudo conectar";
        exit;
    }
	
	$correo = $_POST['correo'];
	$password = $_POST['password'];
	$rol = $_POST['rol'];
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

	$resultado = pg_query($conexion,"select * from restaurante.usuario where correo='$correo' and password='$password' and rol=$rol and estado=1");

	if($filas = pg_num_rows($resultado)!=1)
	{
        session_destroy();
        header("Location: ../html/datos_incorrectos_cliente.html");
        exit();
    }
    else
    {
    	$_SESSION['user']=$correo;
		$_SESSION['rol']=$rol;
    	switch($rol)
    	{
    		case 1:
		    	header("Location: admin.php");
    			break;
    		case 2:
		    	header("Location: gerente.php");
    			break;
    		case 3:
		    	header("Location: sesion.php");
    			break;
    		default:
    			break;
    	}
    }
?>