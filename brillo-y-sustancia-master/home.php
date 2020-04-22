<!DOCTYPE html>
<html lang="en">

<?php
function iniciarUserSession()
{
    $_SESSION["name"] = $_COOKIE["name"];
    $_SESSION["lastname"] = $_COOKIE["lastname"];
    $_SESSION["email"] = $_COOKIE["email"];
    $_SESSION["id"] = $_COOKIE["id"];
    $_SESSION["logueado"] = true;
}

if (isset($_COOKIE["nombre"])) {
    iniciarUserSession();
}

session_start();
if (!isset($_SESSION["logueado"])) {
    $_SESSION["logueado"] = false;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Brillo y Sustancia</title>
</head>

<body>
    <?php include 'header.php' ?>

    <!-- JUMBOTRON REDES SOCIALES -->
    <div class="container-fliud">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <article class="social-media">
                    <a href="#"><i class=" fab fa-facebook-f"></i></a>
                    <a href="#"><i class=" fab fa-twitter"></i></a>
                    <a href="#"><i class=" fab fa-instagram"></i></a>
                </article>
            </div>
        </div>
        <!--FIN JUMBOTRON REDES SOCIALES -->

        <!-- PREGUNTAS FRECUENTES -->

        <section class="faq" id="faq">
            <article class="row align-items-center text-center
                justify-content-left
                top-buffer mb-5">
                <h2 class="col-12">Preguntas frecuentes</h2>
            </article>
            <article class="row align-items-center text-center
                justify-content-left
                top-buffer mx-5">
                <div class="col-sm-12 col-md-6">
                    <h3>¿Lorem, ipsum dolor sit amet consectetur adipisicing elit?</h3>
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias unde nulla similique pariatur, eum, veritatis quo quos ad quidem doloremque dignissimos et voluptates at aliquam consectetur veniam optio! Est, accusantium?</p>
                </div>
                <div class="col-sm-12 col-md-6">
                    <h3>¿Lorem, ipsum dolor sit amet consectetur adipisicing elit?</h3>
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias unde nulla similique pariatur, eum, veritatis quo quos ad quidem doloremque dignissimos et voluptates at aliquam consectetur veniam optio! Est, accusantium?</p>
                </div>
            </article>
        </section>

        <!-- FIN PREGUNTAS FRECUENTES -->

        <?php include 'contact.php' ?>
        <?php include 'footer.php' ?>
    </div>
    <?php include 'scripts_js.php' ?>
</body>

</html>