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

    <!-- Css -->
    <link rel="stylesheet" href="./style.css">

    <!-- Stars font -->
    <script src="https://kit.fontawesome.com/880140e94c.js" crossorigin="anonymous"></script>

    <!-- Slider library -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="./splide-4.0.7/dist/css/splide.min.css">

    <title>Widget-LearnyLib</title>
</head>

<body>
    <!-- Ma section n'apparaît que si mon tableau contient des elem -->
    <?php if (count($new_array) > 0) : ?>
        <section class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <!-- Je boucle sur mes données -->
                    <?php foreach (($new_array) as $response) : ?>
                        <article 
                        style="  
                        font-family: 'Lato', sans-serif;
                        font-weight: 500;
                        font-size: 16px;
                        color: #333;
                        line-height: 1.2em;"
                        class="block splide__slide reviews" id="<?= $response['id'] ?>" data-rating="<?= $response['rating']; ?>">

                            <!-- Étoiles -->
                            <div class="stars-outer">
                                <div class="stars-inner" id='rating-<?= $response['id'] ?>'>
                                </div>
                            </div>

                            <h3 style='font-size:16px;'>
                                <?= $response['name']; ?>
                            </h3>
                            <!-- je modifie le format sql de ma date pour l'afficher au format "humain" -->
                            <p class="date">
                                <?php $original_date = $response['created_at'];

                                $timestamp = strtotime($original_date);

                                $new_date = date("d/m/Y", $timestamp);

                                echo "Le " . $new_date;
                                ?>
                            </p>
                            <p>
                                <?= $response['comment']; ?>
                            </p>
                        </article>
                    <?php endforeach ?>
                </ul>
            </div>
        </section>
    <?php endif; ?>
    <script>
        /*-------  Stars system -------*/
        function starsSystem() {
            // reviews me renvoie un tableau d'avis
            const reviews = document.getElementsByClassName("reviews");

            // Je boucle sur mon tableau d'avis
            for (const element of reviews) {
                // Je récupère la note de mes avis
                /* element.dataset.rating <=> data-rating=" <= $response['rating']; ?>" qui me permetd erécupérer la note de chaque éléments */
                rating = element.dataset.rating;

                // Je récupère l'id de mes avis afin de faire une corrspondance avec leur notes plus bas
                id = element.id;

                // Je convertie mes reviews en pourcentage
                const starPercentage = Math.round((rating / 5) * 100);

                // je target mes étoiles
                var stars = document.getElementById(`rating-${id}`);

                // j'intencie la width de mes étoiles
                stars.style.width = starPercentage + "%";
            }
        }
        starsSystem()

        if (document.querySelector('.splide')) {
            /*------- Fonction qui gère le slider -------*/
            new Splide('.splide', {
                type: 'loop',
                autoplay: 'true',
                width: '80%',
                perPage: 3,
                gap: '1rem',
                breakpoints: {
                    870: {
                        perPage: 2,
                    },
                    640: {
                        perPage: 1,
                    },
                },
            }).mount();
        }
    </script>
</body>

</html>