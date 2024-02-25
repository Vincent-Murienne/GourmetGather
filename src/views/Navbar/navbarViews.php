<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/views/Navbar/navbar.css">
    <title>Responsive Navbar using HTML & CSS</title>
</head>
<body>
    <header>
        <div class="logo">Gourmet Gather</div>
        <input type="checkbox" id="nav_check" hidden>
        <nav id="nav">
            <ul>
                <li>
                    <a href="src/views/Home/homeViews.php" class="active">Accueil</a>
                </li>
                <?php
                if (isset($_SESSION['email']) && isset($_SESSION['motDePasse'])) {
                    echo '<li><a href="src/views/Login-Register/login-registerViews.php?logout=true">Déconnexion</a></li>';
                    if (isset($_GET['logout'])) {
                        session_unset();
                        session_destroy();
                        header('Location: src/views/Login-Register/login-registerViews.php');
                        exit();
                    }
                } else {
                    echo '<li><a href="src/views/Login-Register/login-registerViews.php">Connexion-Inscription</a></li>';
                    if (isset($_GET['login'])) {
                        session_start();
                        header('Location: src/views/Login-Register/login-registerViews.php');
                        exit();
                    }
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

    <script src="src/views/Navbar/navbar.js"></script>
</body>
</html>