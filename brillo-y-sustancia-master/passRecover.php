<!DOCTYPE html>
<html lang="es">

<?php
session_start();
if (!isset($_SESSION["logueado"])) {
    $_SESSION["logueado"] = false;
}
function existeElUser()
{
    $archivo = json_decode(file_get_contents("json/users.json"), true);
    $bool = false;
    foreach ($archivo as $user) {
        if (($user["email"] == $_POST["email"])) {
            $bool = true;
        }
    }
    return $bool;
}
function reestablecerContraseña()
{
    $archivo = json_decode(file_get_contents("json/users.json"), true);
    foreach ($archivo as $user) {
        if (($user["email"] == $_POST["email"])) {
            $nuevoTodo = [
                "name" => $user["name"],
                "lastname" => $user["lastname"],
                "email" => $user["email"],
                "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
                "id" => $user["id"]
            ];
        }
    }
    $archivo[$nuevoTodo["id"] - 1] = $nuevoTodo;
    file_put_contents("json/users.json", json_encode($archivo));
}

if ($_SESSION["logueado"] == "true") {
    header("Location: profile.php");
}

$email = "";
$invalidEmail = "";
$invalidPass = "";
if ($_POST) {
    if (empty($_POST["email"])) {
        $invalidEmail = '<div class="red">Ingrese un email por favor.</div>';
    } else {
        $email = $_POST["email"];
    }
    if (empty($_POST["password"])) {
        $invalidPass = '<div class="red">Ingrese una contraseña.</div>';
    }
    if (existeElUser()) {
        reestablecerContraseña();
        header("Location: login.php");
    } else {
        $invalidEmail = '<div class="red">No existe un usuario con ese email.</div>';
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperación de contraseña</title>
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
                <h1 class="title">Recuperación de contraseña</h1>
                <form action="passRecover.php" method="POST">
                    <div class="input-form">
                        <label class="text-little" for="email">Email</label>
                        <input type="text" name="email" id="email" value="<?= $email ?>">
                        <?= $invalidEmail ?>
                    </div>
                    <div class="input-form">
                        <label class="text-little" for="pass">Nueva contraseña</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <?= $invalidPass ?>
                    <button type="submit" class="btn">Enviar</button>
                    <p class="text-little help-account">No tiene una cuenta? <a href="register.php" class="text-little">Registrase</a></p>
                </form>
            </div>
        </div>
    </div>



    <?php include 'footer.php' ?>
    <?php include 'scripts_js.php' ?>
</body>

</html>