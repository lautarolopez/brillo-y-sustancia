<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
session_start();
if (!isset($_SESSION["logueado"])) {
  $_SESSION["logueado"] = false;
}
?>

<head>
  <link rel="stylesheet" href="css/carrito.css">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900&display=swap" rel="stylesheet">
  <title>Carrito de compras</title>
</head>

<body>
  <?php include 'header.php' ?>
  <br>

  <!--Cerrar carrito de compras-->
  <a id="cerrar" href="ProductList.php"><b>x</b> Carrito de compras</a> <br><br>

  <!--Caracteristicas del producto y cantidad a comprar-->
  <section class="producto">
    <img class="foto" id="glittergel" src="../images/geleuforia.jpg" alt="euforia">
    <article class="descripcion">
      <p>GLITTER CON GEL - EUFORIA</p>
      <p>- 1 +</p>
      <p>$60</p>
    </article>
  </section>

  <!--Subtotal y total de compra-->
  <article class="linea"></article> <br><br>
  <section class="total">
    <article class="producto">
      <p class="precio">Subtotal (sin envio)</p>
      <p class="borde1">$60</p>
    </article>
    <article class="lipunt"></article>
    <article class="producto">
      <p id="ptotal" class="precio">TOTAL</p>
      <p id="ptotal" class="borde2">$60</p>
    </article>
  </section>
  <button id="btn" type="button" class="btn btn-dark">INICIAR COMPRA</button>
  <br>
  <!--Volver a la lista de productos-->
  <a id="volver" href="ProductList.php">Seguir comprando</a>
  <br><br>
  <?php include 'footer.php' ?>
  <?php include 'scripts_js.php' ?>
</body>

</html>