<!-- Je récupère le nom de la formation depuis l'url -->

<!-- Je récupère les 10 derniers avis de cette formation ayant une note 
au dessus de 4 (possible de se connecter directement à Mysql et d'effectuer une requête sql ou trop dangereux ?) -->
<!-- Pour le moment je récupère des avis depuis une fausse bdd -->
<?php include_once('./api.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Stars font -->
    <script src="https://kit.fontawesome.com/880140e94c.js" crossorigin="anonymous"></script>

    <!-- Slider library -->
    <script src="./splide-4.0.7/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="./splide-4.0.7/dist/css/splide.min.css">

    <!-- Css -->
    <link rel="stylesheet" href="style.css">

    <title>Widget-LearnyLib</title>
</head>

<body>
    <div class="container">
        <section class="splide" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <!-- Je boucle sur mes données -->
                    <?php foreach (($responses) as $response) : ?>
                        <article class="splide__slide block mrb-b10 reviews" id="<?= $response['id'] ?>" data-rating="<?php echo $response['rating']; ?>">
                            <div class=" stars-outer">
                                <div class="stars-inner" id='rating-<?php echo $response['id'] ?>'></div>
                            </div>
                            <h3><?php echo $response['pseudo']; ?></h3>
                            <p> Commentaire <?php echo $response['comment']; ?></p>
                            <p><?php echo $response['created_at']; ?></p>
                        </article>
                    <?php endforeach ?>
                </ul>
            </div>
        </section>
    </div>
    <script src="index.js"></script>
</body>

</html>