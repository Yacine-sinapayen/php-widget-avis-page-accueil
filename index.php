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
    <link rel="stylesheet" href="style.css">

    <!-- Stars font -->
    <script src="https://kit.fontawesome.com/880140e94c.js" crossorigin="anonymous"></script>

    <!-- Slider library -->
    <script src="./splide-4.0.7/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="./splide-4.0.7/dist/css/splide.min.css">


    <title>Widget-LearnyLib</title>
</head>

<body>

    <section class="splide mrg-auto">
        <div class="splide__track">
            <ul class="splide__list">
                <!-- Je boucle sur mes données -->
                <?php foreach (($new_array) as $response) : ?>
                    <article 
                    class="block splide__slide  mrb-b10 reviews" 
                    id="<?= $response['id'] ?>" 
                    data-rating="<?php echo $response['rating']; ?>" 
                    style='
                        font-family: "Lato", sans-serif;
                        font-size:16px;
                        height:auto;
	                    padding:10px;
                        border: 1px solid rgba(213, 203, 203, 0.5);
	                    border-radius:8px;'>

                        <!-- Étoiles -->
                        <div class="stars-outer">
                            <div 
                                class="stars-inner" id='rating-<?php echo $response['id'] ?>'>
                            </div>
                        </div>

                        <h3 style='font-size:16px;'>
                            <?php echo $response['pseudo']; ?>
                        </h3>
                        <!-- je modifie le format sql de ma date pour l'afficher au format "humain" -->
                        <p style='color:rgba(213, 203, 203, 0.7);font-size:0.8rem;' ;>
                            <?php $original_date = $response['created_at'];

                            $timestamp = strtotime($original_date);

                            $new_date = date("d/m/Y", $timestamp);

                            echo "Le " . $new_date;
                            ?>
                        </p>
                        <p>
                            <?php echo $response['comment']; ?>
                        </p>
                    </article>
                <?php endforeach ?>
            </ul>
        </div>
    </section>
    <script src="index.js"></script>
</body>

</html>