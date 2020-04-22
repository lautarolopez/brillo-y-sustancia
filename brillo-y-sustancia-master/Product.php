<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
session_start();
if (!isset($_SESSION["logueado"])) {
  $_SESSION["logueado"] = false;
}
?>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/product.css">
  <link rel="stylesheet" href="css/style.css">
  <meta charset="utf-8">
  <title>Producto</title>
</head>

<body>
  <?php include 'header.php' ?>
  <br><br><br>
  <!--Producto-->
  <h2>GLITTER GRANDE - <br> EUFORIA </h2>
  <img class="foto" id="glittergel" src="../images/geleuforia.jpg" alt="euforia">
  <p class="precio">$60</p>
  <article class="linea"></article>
  <button id="btn" type="button" class="btn btn-dark"><a href="Carrito.php">AGREGAR AL CARRITO + </a></button>

  <!--Detalle-->
  <h3>EUFORIA</h3>
  <h3 class="nombreproducto">HANDMADE GLITTER </h3> <br>
  <p class="descripcion">La fórmula de gel hipoalergénico genera una textura
    húmeda ultra liviana que permite una aplicación que desliza sin esfuerzo debido a su liviandad
    y cuando seca alcanza el máximo nivel de brillo quedando perfectamente agarrado a la piel. Seca en cuestión de segundos
    logrando que el producto no caiga o se corra. Se puede usar en capas sucesivas para obtener un acabado más intenso,
    se pueden combinar colores y texturas entre si para obtener distintos tonos. Para retirarlo solo se necesita agua y una leve
    friccion sobre la zona pintada. </p> <br>
  <article class="linea"></article>
  <?php include 'footer.php' ?>
  <?php include 'scripts_js.php' ?>
</body>

</html>