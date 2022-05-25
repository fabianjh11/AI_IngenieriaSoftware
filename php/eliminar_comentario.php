<?php
	// Se incluyen los parámetros de la conexión		
    include '../BD/conexionABD.inc';
	
    if($_POST['id']==null)
    {
    	header("Location: comentarios.php");
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
	
	$resultado = pg_query($conexion,"select id from restaurante.opinion
	where id='$id'");

	if($filas = pg_num_rows($resultado)!=1)
	{
        header("Location: ../html/datos_incorrectos_admin3.html");
        exit();
    }
    $delete = "delete from restaurante.opinion where id='$id'";
    $resultado = pg_query($conexion,$delete);

    if($resultado==false)
	{
        header("Location: ../html/datos_incorrectos_admin3.html");
        exit();
    }

	header("Location: comentarios.php");
	exit();
?>