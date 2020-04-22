<!DOCTYPE html>
<html lang="es">

<?php

session_start();
if (!isset($_SESSION["logueado"])) {
    $_SESSION["logueado"] = false;
}

function crearUsuario()
{
    $archivo = json_decode(file_get_contents("json/users.json"), true);
    $j = count($archivo) + 1;
    $usuario = [
        "name" => $_POST["name"],
        "lastname" => $_POST["lastname"],
        "email" => $_POST["email"],
        "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
        "id" => $j
    ];
    $archivo[] = $usuario;
    file_put_contents("json/users.json", json_encode($archivo));
}

function existeElUser()
{
    $archivo = json_decode(file_get_contents("json/users.json"), true);
    $bool = false;
    foreach ($archivo as $user) {
        if ($user["email"] == $_POST["email"]) {
            $bool = true;
        }
    }
    return  $bool;
}

if ($_SESSION["logueado"]) {
    header("Location: profile.php");
}

$name = "";
$lastname = "";
$email = "";
$invalidName = "";
$invalidLastname = "";
$invalidEmail = "";
$invalidPass = "";
if ($_POST) {
    $loCreamos = true;
    if (empty($_POST["name"])) {
        $loCreamos = false;
        $invalidName = '<div class="red">Ingrese un nombre por favor.</div>';
    } else {
        $name = $_POST["name"];
    }

    if (empty($_POST["lastname"])) {
        $loCreamos = false;
        $invalidLastname = '<div class="red">Ingrese un apellido por favor.</div>';
    } else {
        $lastname = $_POST["lastname"];
    }

    if (empty($_POST["email"])) {
        $loCreamos = false;
        $invalidEmail = '<div class="red">Ingrese un email por favor.</div>';
    } else {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $loCreamos = false;
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $loCreamos = false;
                $invalidEmail = '<div class="red">El email ingresado no es válido.</div>';
            } else {
                $email = $_POST["email"];
            }
        } else {
            $email = $_POST["email"];
        }
    }

    if (empty($_POST["password"])) {
        $loCreamos = false;
        $invalidPass = '<div class="red">Ingrese una contraseña.</div>';
    }



    if (existeElUser()) {
        $loCreamos = false;
    }
    if ($loCreamos) {
        crearUsuario();
        header("Location: login.php");
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrate</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'header.php' ?>

    <div class="form-container">
        <div class="login">
            <div class="login-form">
                <h1 class="title">Registro</h1>
                <form action="register.php" method="POST">
                    <div class="input-form">
                        <label class="text-little" for="name">Nombre</label>
                        <input type="text" name="name" id="name" value="<?= $name ?>">
                        <?= $invalidName ?>
                    </div>
                    <div class="input-form">
                        <label class="text-little" for="lastname">Apellido</label>
                        <input type="text" name="lastname" id="lastname" value="<?= $lastname ?>">
                        <?= $invalidLastname ?>
                    </div>
                    <div class="input-form">
                        <label class="text-little" for="email">Email</label>
                        <input type="text" name="email" id="email" value="<?= $email ?>">
                        <?= $invalidEmail ?>
                    </div>
                    <div class="input-form">
                        <label class="text-little" for="password">Contraseña</label>
                        <input type="password" name="password" id="password">
                        <?= $invalidPass ?>
                    </div>
                    <button type="submit" class="btn">Registrarte</button>
                    <p class="text-little help-account">Ya tenes una cuenta? <a href="login.php" class="text-little">Iniciar sesion</a></p>
                </form>
            </div>
        </div>
    </div>


    <?php include 'footer.php' ?>
    <?php include 'scripts_js.php' ?>
</body>

</html>