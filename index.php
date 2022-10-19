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
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="./splide-4.0.7/dist/css/splide-core.min.css">
    <link rel="stylesheet" href="./css/style.css">


    <title>HomePage reviews</title>
</head>

<body>
    <!-- Ma section n'apparaît que si mon tableau contient des elem -->
    <?php if (count($new_array) > 0 ) : ?>
        <section class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach (($new_array) as $response) : ?>
                        <article class="block splide__slide reviews" id="<?= $response['id'] ?>" data-rating="<?= $response['rating']; ?>">
                            <div class="stars-outer mrgb">
                                <div class="stars-inner" id='rating-<?= $response['id'] ?>'></div>
                            </div>

                            <div class="card-header mrgb">
                                <!-- Nom de l'apprenant -->
                                <h3 style='font-size:16px;'>
                                    <?= $response['name']; ?>
                                </h3>

                                <!-- Date -->
                                <p class="color-light-green">
                                    <!-- je modifie le format sql de ma date pour l'afficher au format "moldu" -->
                                    <?php $original_date = $response['created_at'];
                                    $timestamp = strtotime($original_date);
                                    $new_date = date("d/m/Y", $timestamp);
                                    echo "Le " . $new_date;
                                    ?>
                                </p>
                            </div>
                            <!-- Nom de la formation -->
                            <p class="formation-title mrgb">
                            <?php 
                                if(isset($response['course_title'])){
                                    echo "Formation : " . $response['course_title'];
                                }
                            ?>
                            </p>
                           

                            <!-- Commentaire -->
                            <p class="comment"><?= $response['comment']; var_dump( strlen(($response['comment']))); ?></p>

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

        /*-------  Slider -------*/
        // Je récupère la taille de mon tableau d'avis
        const arrayJs = "<?= count($new_array) ?>"

        // Si ma class splide existe ça veut dire que j'ai récupérer des avis donc j'affiche mon slider
        if (document.querySelector('.splide')) {
            console.log(arrayJs)
            // si mon tableau ne contient que 1 ou 2 avis j'en affiche un par page Sinon c'est 3.
            if (arrayJs < 3) {
                new Splide('.splide', {
                    // type: 'loop',
                    // autoplay: 'true',
                    width: '20rem',
                    perPage: 1,
                    gap: '1rem',
                }).mount();
            } else {
                /*------- Fonction qui gère le slider -------*/
                new Splide('.splide', {
                    // type: 'loop',
                    // autoplay: 'true',
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
        }
    </script>
</body>

</html>