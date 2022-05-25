<?php
  session_start();

  error_reporting(0);
  $sesion=$_SESSION['user'];
  $rol=$_SESSION['rol'];
  if(!isset($sesion))
  {
    session_destroy();
    header("Location: ../html/login.html");
  }
  if($rol==1)
  {
    header("Location: admin.php");
  }
  else
    if($rol==2)
    {
      header("Location: gerente.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="keywords" content="Restaurante, reservacion, comida">
    <meta name="copyright" content="MACROSONY">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../fotos/Rest-Service.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/estilo_menu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Belleza&family=Montserrat:wght@100&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <title>Menú</title>
  </head>
  <body>
    <nav class="Menu">
      <ul>
        <li>
          <div class="Home" onclick="location.href='sesion.php'">
            <div class="Logo">
              <img src="../fotos/Rest-Service.png">
            </div>
            <h1 class="Nombre">Rest-Service</h1>
            <p class=Nombre2>®</p>
          </div>
        </li>
        <li>
          <div class="Ubica" onclick="location.href='https://www.google.com/maps/place/Ant%C3%A1rtida/@-75.05435,0,3z/data=!3m1!4b1!4m8!1m2!2m1!1sgoogle+maps!3m4!1s0xa4b9967b3390754b:0x6e52be1f740f2075!8m2!3d-75.250973!4d-0.071389'">
            <img class="Ubica1" src="../fotos/ubicacion.png">
            <p class='Ubica2'>Ubicación</p>
          </div>
        </li>
      </ul>
    </nav>

    <div class="Seccion">
      <h2 class="Frase">Menú de Consumibles</h2>
    </div>

    <div class="grid_block">
      <div class="grid_item">
        <img
          class="food_image"
          src="../fotos/food/limoncello.jpeg"
          alt="Food Image"
        />
        <div class="food_header">
          <p class="food_name">Limoncello</p>
          <p class="food_price">$620</p>
        </div>
        <p class="food_description">
          Infusión de cáscaras de limón amarillo en alcohol, azúcar y agua
        </p>
      </div>
      <div class="grid_item">
        <img
          class="food_image"
          src="../fotos/food/ravioles.jpeg"
          alt="Food Image"
        />
        <div class="food_header">
          <p class="food_name">Ravioles</p>
          <p class="food_price">$150</p>
        </div>
        <p class="food_description">
          Pasta rellena italiana realizada con diferentes ingredientes
          acompañada con salsa
        </p>
      </div>
      <div class="grid_item">
        <img
          class="food_image"
          src="../fotos/food/ossobuco.jpeg"
          alt="Food Image"
        />
        <div class="food_header">
          <p class="food_name">Ossobuco</p>
          <p class="food_price">$140</p>
        </div>
        <p class="food_description">
          Pata de ternera cortada en rodajas y arroz
        </p>
      </div>
      <div class="grid_item">
        <img
          class="food_image"
          src="../fotos/food/rissoto.jpeg"
          alt="Food Image"
        />
        <div class="food_header">
          <p class="food_name">Rissoto</p>
          <p class="food_price">$210</p>
        </div>
        <p class="food_description">Arroz cocinado con queso</p>
      </div>
      <div class="grid_item">
        <img
          class="food_image"
          src="../fotos/food/spaghetti.jpeg"
          alt="Food Image"
        />
        <div class="food_header">
          <p class="food_name">Espagueti a la Boloñesa</p>
          <p class="food_price">$110</p>
        </div>
        <p class="food_description">
          Combinación de un sofrito de verduras, carne picada de buena calidad y
          la salsa de tomate, además de hierbas y especias
        </p>
      </div>
      <div class="grid_item">
        <img
          class="food_image"
          src="../fotos/food/lasaña.jpeg"
          alt="Food Image"
        />
        <div class="food_header">
          <p class="food_name">Lasaña</p>
          <p class="food_price">$180</p>
        </div>
        <p class="food_description">
          Láminas de pasta, salsa bechamel, queso y carne
        </p>
      </div>
      <div class="grid_item">
        <img class="food_image" src="../fotos/food/pizza.jpeg" alt="Food Image" />
        <div class="food_header">
          <p class="food_name">Pizza Italiana</p>
          <p class="food_price">$150</p>
        </div>
        <p class="food_description">
          Delicioso queso Mozzarella, jamón y tomate al oreganato
        </p>
      </div>
      <div class="grid_item">
        <img
          class="food_image"
          src="../fotos/food/ensaladacap.jpeg"
          alt="Food Image"
        />
        <div class="food_header">
          <p class="food_name">Ensalada Capresse</p>
          <p class="food_price">$180</p>
        </div>
        <p class="food_description">
          Jitomate, queso mozzarella, albahaca y un chorrito de aceite de oliva
        </p>
      </div>
      <div class="grid_item">
        <img
          class="food_image"
          src="../fotos/food/grappa.jpeg"
          alt="Food Image"
        />
        <div class="food_header">
          <p class="food_name">Grappa</p>
          <p class="food_price">$400</p>
        </div>
        <p class="food_description">Aguardiente de orujo</p>
      </div>
      <div class="grid_item">
        <img
          class="food_image"
          src="../fotos/food/prosseco.jpeg"
          alt="Food Image"
        />
        <div class="food_header">
          <p class="food_name">Prosseco</p>
          <p class="food_price">200</p>
        </div>
        <p class="food_description">
          Es un vino blanco espumoso, elaborado con uvas glera
        </p>
      </div>
      <div class="grid_item">
        <img class="food_image" src="../fotos/food/mirto.jpeg" alt="Food Image" />
        <div class="food_header">
          <p class="food_name">Mirto</p>
          <p class="food_price">$280</p>
        </div>
        <p class="food_description">
          Surge de macerar alcohol con bayas de la planta mediterránea del mirto
        </p>
      </div>
      <div class="grid_item">
        <img
          class="food_image"
          src="../fotos/food/sambuca.jpeg"
          alt="Food Image"
        />
        <div class="food_header">
          <p class="food_name">Sambuca</p>
          <p class="food_price">$400</p>
        </div>
        <p class="food_description">
          Se prepara con aceites de la destilación de semillas de anís
          estrellado, que se disuelve en alcohol en estado puro
        </p>
      </div>
    </div>
  </body>
</html>
