<?php  
	include '../BD/conexionABD.inc';
	
    if($_POST['id']==null || $_POST['estado']==null)
    {
    	header("Location: gerente.php");
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
	$id = $_POST['id'];
	$estado = $_POST['estado'];

	$resultado = pg_query($conexion,"select id from restaurante.reservacion
	where id='$id' AND estado='1'");

	if($filas = pg_num_rows($resultado)!=1)
	{
		header("Location: ../html/datos_incorrectos_gerenteR.html");
        exit();
	}
	switch ($estado)
	{
		case 'Cancelar':
			$update = "update restaurante.reservacion set estado='2' where id='$id'";
			$resultado = pg_query($conexion,$update);
			break;
		case 'Finalizar':
			$update = "update restaurante.reservacion set estado='0' where id='$id'";
			$resultado = pg_query($conexion,$update);
			break;
		default:
			header("Location: gerente.php");
    		exit();
			break;
	}
    if($resultado==false)
	{
		header("Location: ../html/datos_incorrectos_gerenteR.html");
		exit();
	}
	header("Location: gestion_reserva.php");
	exit();
?>