<?php

include("objects.php");

$variable = new User("Jorge", "Carlos", "email@email.com", "contracontra", 0);
$arr[] = $variable;
var_dump($variable);
$variable1 = new User("Jorge", "Carlos", "email@email.com", "contracontra", 0);
$arr[] = $variable1;
var_dump($variable1);
$variable2 = new User("Jorge", "Carlos", "email@email.com", "contracontra", 0);
$arr[] = $variable2;
var_dump($variable2);
$variable3 = new User("Jorge", "Carlos", "email@email.com", "contracontra", 0);
$arr[] = $variable3;
var_dump($variable3);
$variable4 = new User("Jorge", "Carlos", "email@email.com", "contracontra", 0);
$arr[] = $variable4;
var_dump($variable4);
file_put_contents("prueba.json", json_encode($arr));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>
</head>

<body>

</body>

</html>