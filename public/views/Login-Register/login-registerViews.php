<?php
$error_message = '';

if (isset($_GET['error']) && $_GET['error'] === 'missing_fields') {
    $error_message = 'Veuillez remplir tous les champs du formulaire.';
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="../../views/Login-Register/login-register.css">
        <title>Connexion | Inscription</title>
    </head>
    <body>
        <div class="container" id="container">
            <div class="form-container sign-up">
                <?php if (!empty($error_message)) : ?>
                    <div class="error-message"><?php echo $error_message; ?></div>
                <?php endif; ?>
                <form action="../../controllers/registerController.php" method="post">
                    <h1>Inscription</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                    <span>ou via email</span>
                    <input type="text" name="nom" placeholder="Nom">
                    <input type="text" name="prenom" placeholder="Prénom">
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="motDePasse" placeholder="Mot de passe">
                    <button>Valider</button>
                </form>
            </div>
            <div class="form-container sign-in">
                <?php if (!empty($error_message)) : ?>
                    <div class="error-message"><?php echo $error_message; ?></div>
                <?php endif; ?>
                <form action="../../controllers/loginController.php" method="post">
                    <h1>Connexion</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                    <span>ou via email</span>
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="motDePasse" placeholder="Mot de passe">
                    <a href="../../views/forgot-password.php">Mot de passe oublié ?</a>
                    <button>Valider</button>
                </form>
            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Bienvenue à nouveau</h1>
                        <p>Connectez-vous pour bénéficier de toutes les fonctionnalités du site.</p>
                        <button class="hidden" id="login">Connexion</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Bienvenue</h1>
                        <p>Inscrivez-vous pour bénéficier de toutes les fonctionnalités du site.</p>
                        <button class="hidden" id="register">Inscription</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../views/Login-Register/login-register.js"></script>
    </body>
</html>