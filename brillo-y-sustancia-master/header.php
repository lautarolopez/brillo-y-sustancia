<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["logueado"])) {
    $_SESSION["logueado"] = false;
}
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="home.php">Brillo y Sustancia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php#faq">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php#contact">Contactanos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorías
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="productList.php#portada-glitter">Glitter</a>
                        <a class="dropdown-item" href="productList.php#portada-mascaras">Máscaras</a>
                        <a class="dropdown-item" href="productList.php#portada-lentes">Lentes</a>
                    </div>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <?php if (!$_SESSION["logueado"]) : ?>
                    <a class="btn my-2 my-sm-0 mx-1" href="login.php">Ingresá</a>
                    <a class="btn my-2 my-sm-0 mx-1" href="register.php">Registrate</a>
                <?php else : ?>
                    <a class="link-icons" href="carrito.php"><i class="fas fa-shopping-cart mx-2"></i></a>
                    <a class="link-icons" href="profile.php"><i class="far fa-user mx-2"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>