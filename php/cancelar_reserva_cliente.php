<?php
	// Se incluyen los parámetros de la conexión		
    include '../BD/conexionABD.inc';
	
    if($_POST['id']==null)
    {
    	header("Location: mis_reservaciones.php");
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
	$id_cliente = $_SESSION['user'];
	$id_reserva = $_POST['id'];
	
	$resultado = pg_query($conexion,"select id from restaurante.reservacion join restaurante.cliente_reserva on id_reserva=id
	where id_reserva='$id_reserva' AND id_cliente='$id_cliente'");

	if($filas = pg_num_rows($resultado)!=1)
	{
        header("Location: ../html/datos_incorrectos_reserva.html");
        exit();
    }
    $update = "update restaurante.reservacion set estado='2' where id='$id_reserva'";
    $resultado = pg_query($conexion,$update);
    if($resultado==false)
	{
		header("Location: ../html/datos_incorrectos_reserva.html");
		exit();
	}
	header("Location: mis_reservaciones.php");
	exit();
?>