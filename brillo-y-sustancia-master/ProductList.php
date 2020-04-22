<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/ProductList.css">
  <meta charset="utf-8">
  <title>Listado de productos</title>
</head>

<body>

  <?php include 'header.php' ?>

  <div class="container"><br>

    <!--Glitter con gel-->
    <h3 class="container" id="titulo">Glitter con gel</h3>
    <section class="bys">
      <article class="productos">
        <div class="fotoproducto">
          <a href="Product.php"><img class="foto" id="glittergel" src="images/geleuforia.jpg" alt="euforia"></a>
        </div>
        <h2 class="articulo"> <a id="compra" href="Product.php">Glitter grande</a></h2>
        <p class="articulo"> <a id="compra" href="Product.php">EUFORIA</a></p>
        <p class="articulo">$60</p>
      </article>
      <article class="productos">
        <div class="fotoproducto">
          <img href="Product.php" class="foto" src="images/gel.jpg" alt="">
        </div>
        <h2 class="articulo" href="Product.php">Glitter grande</h2>
        <p class="articulo" href="Product.php">SPEED</p>
        <p class="articulo">$60</p>
      </article>
      <article class="productos">
        <div class="fotoproducto">
          <img href="Product.php" class="foto" id="ruedita" src="images/ruedapride.jpg" alt="">
        </div>
        <h2 class="articulo" href="Product.php">Ruedita de glitter</h2>
        <p class="articulo" href="Product.php">PRIDE</p>
        <p class="articulo">$210</p>
      </article>
      <article class="productos">
        <div class="fotoproducto">
          <img href="Product.php" class="foto" id="ruedita" src="images/ruedarosa.jpg" alt="">
        </div>
        <h2 class="articulo" href="Product.php">Ruedita</h2>
        <p class="articulo" href="Product.php">Tonos a elección</p>
        <p class="articulo">$260</p>
      </article>
    </section><br><br>

    <!--Glitter en polvo-->
    <h3 class="container" id="titulo">Glitter en polvo</h3>
    <section class="bys">
      <article class="productos">
        <div class="fotoproducto">
          <img href="Product.php" class="foto" id="glitterpolvo" src="images/uñas.jpg" alt="">
        </div>
        <h2 class="articulo" href="Product.php">Glitter en polvo grande</h2>
        <p class="articulo" href="Product.php">SPEED</p>
        <p class="articulo">$50</p>
      </article>
      <article class="productos">
        <div class="fotoproducto">
          <img href="Product.php" class="foto" id="glitterpolvo" src="images/uñasopio.jpg" alt="">
        </div>
        <h2 class="articulo" href="Product.php">Glitter en polvo grande</h2>
        <p class="articulo" href="Product.php">OPIO</p>
        <p class="articulo">$50</p>
        <div class="lista">
      </article>
    </section><br><br>

    <!--Mascaras-->
    <h3 class="container" id="titulo">Mascaras</h3>
    <section class="bys">
      <article class="productos">
        <div class="fotoproducto">
          <img href="Product.php" class="foto" id="mascara" src="images/gemablanca.jpg" alt="">
        </div>
        <h2 class="articulo" href="Product.php">Mascaras</h2>
        <p class="articulo">$200</p>
      </article>
      <article id="mascara2" class="productos">
        <div class="fotoproducto">
          <img href="Product.php" class="foto" src="images/gemasazul.jpg" alt="">
        </div>
        <h2 class="articulo" href="Product.php">Mascaras</h2>
        <p class="articulo">$200</p>
      </article>
    </section><br><br>

    <!--Lentes-->
    <h3 class="container" id="titulo">Lentes</h3>
    <section class="bys">
      <article class="productos">
        <div class="fotoproducto">
          <img href="Product.php" class="foto" id="lentes" src="images/lentesazul.jpg" alt="azul">
        </div>
        <h2 class="articulo" href="Product.php">Lentes azules</h2>
        <p class="articulo">$350</p>
      </article>
      <article class="productos">
        <div class="fotoproducto">
          <img href="Product.php" class="foto" id="lentes" src="images/lentesvioleta.jpg" alt="violeta">
        </div>
        <h2 class="articulo" href="Product.php">Lentes rosa/violeta</h2>
        <p class="articulo">$350</p>
      </article>
    </section>
  </div>
  <?php include 'footer.php' ?>
  </div>
  <?php include 'scripts_js.php' ?>

</body>

</html>