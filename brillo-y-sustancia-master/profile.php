<!DOCTYPE html>
<html lang="es">

<?php
session_start();
if (!isset($_SESSION["logueado"])) {
    $_SESSION["logueado"] = false;
}
if (!$_SESSION["logueado"]) {
    header("Location: home.php");
}

if ($_POST) {
    if ($_POST["close"]) {
        setCookie("name", null, -1);
        setCookie("lastname", null, -1);
        setCookie("email", null, -1);
        setCookie("id", null, -1);
        $_SESSION["logueado"] = false;
        header("Location: home.php");
    }
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
    <div class="hero-profile">
        <div class="img-profile">
            <img src="images/perfil.png" alt="imagen de perfil">
        </div>
        <?php
        $nombre = "";
        if (isset($_SESSION["name"])) {
            $nombre = $_SESSION["name"] . " " . $_SESSION["lastname"];
        }
        ?>
        <h2><?= $nombre ?></h2>
    </div>
    <div class="row container">
        <div class="col-4 mt-5 mb-5">
            <div class="list-group" id="list-tab" role="tablist">
                <form action="profile.php" method="POST">
                    <button class="list-group-item list-group-item-action list-group-item-light" id="list-home-list" data-toggle="list" href="#" role="tab" aria-controls="home">Perfil</button>
                    <button class="list-group-item list-group-item-action list-group-item-light" id="list-profile-list" data-toggle="list" href="#" role="tab" aria-controls="profile">Mis compras</button>
                    <button class="list-group-item list-group-item-action list-group-item-light" id="list-messages-list" data-toggle="list" href="#" role="tab" aria-controls="messages">Direcciones</button>
                    <button class="list-group-item list-group-item-action list-group-item-light" id="list-settings-list" data-toggle="list" href="#" role="tab" aria-controls="settings">Editar perfil</button>
                    <button class="list-group-item list-group-item-action list-group-item-light" id="list-settings-list" data-toggle="list" href="#" role="tab" aria-controls="settings">Métodos de pago</button>
                    <button class="list-group-item list-group-item-action list-group-item-light" id="list-settings-list" type="submit" name="close" value="close" href="#" role="tab" aria-controls="settings">Cerrar sesión</button>
                </form>
            </div>
        </div>
        <div class="col-8 mt-5 mb-5 information">
            <a class="text-white">Acá va la informacion de cada item</a>
        </div>
    </div>


    <?php include 'footer.php' ?>
    <?php include 'scripts_js.php' ?>
</body>

</html>