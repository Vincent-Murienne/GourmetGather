<?php 
include_once 'controllers/homeController.php';
require_once 'models/recetteModel.php';
require_once 'bdd/bddConnexion.php';
$recetteModel = new RecetteModel($db);
$recettes = $recetteModel->getAllRecettes();
$avisRecettes = $recetteModel->getAvisRecette();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
        <link rel="stylesheet" href="../../views/Home/home.css">
    </head>
    <body>
        <!--<input id="searchbar" onkeyup="search()" type="text" name="search" placeholder="Recherchez une recette">
        <div id="results"></div>!-->
        <section>
            <div class="swiper mySwiper container">
                <div class="swiper-wrapper content">
                    <?php foreach ($recettes as $recette): ?>
                        <div class="swiper-slide card">
                            <div class="card-content">
                                <div class="image">
                                    <img src="<?php echo $recette['photo']; ?>" alt="">
                                </div>
                                <div class="name-profession">
                                    <span class="name"><?php echo $recette['titre']; ?></span>
                                    <br>
                                    <span class="profession"><?php echo $recette['description']; ?></span>
                                </div>
                                <?php
                                    $moyenne_notes = 0;
                                    foreach ($avisRecettes as $avisRecette) {
                                        if ($avisRecette['idRecette'] == $recette['idRecette']) {
                                            $moyenne_notes = $avisRecette['moyenne_notes'];
                                            break;
                                        }
                                    }
                                ?>
                                <div class="rating">
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <?php if ($i < $moyenne_notes): ?>
                                            <i class="fas fa-star"></i>
                                        <?php else: ?>
                                            <i class="far fa-star"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                                <div class="button">
                                    <button class="aboutMe" data-id="<?php echo $recette['idRecette']; ?>">Voir détails</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </section>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="../../views/Home/home.js"></script>
    </body>
</html>
