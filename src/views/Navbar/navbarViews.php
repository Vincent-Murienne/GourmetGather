<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Navbar/navbar.css">
    <title>Responsive Navbar using HTML & CSS</title>
</head>
<body>
    <header>
        <div class="logo">EVLEARN</div>
        <input type="checkbox" id="nav_check" hidden>
        <nav id="nav">
            <ul>
                <li>
                    <a href="../Home/homeViews.php" class="active">Home</a>
                </li>
                <li>
                    <a href="#Recette">Recette</a>
                </li>
                <li>
                    <a href="#Avis">Avis</a>
                </li>
                <?php
                    if(isset($_SESSION['email']) && isset($_SESSION['motDePasse'])) {
                        echo '<li>
                            <a href="#">Déconnexion</a>
                        </li>';
                    } else {
                        echo '<li>
                            <a href="../Login-Register/login-registerViews.php">Connexion-Inscription</a>
                        </li>';
                    }
                ?>
            </ul>
        </nav>
        <label for="nav_check" class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </label>
    </header>

    <script src="../Navbar/navbar.js"></script>
</body>
</html>