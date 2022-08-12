<?php
// <!-- Création de la ressource curl -->
$url = "http://localhost:3009/avis";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
$responses = json_decode($data, true);
// var_dump($responses);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/880140e94c.js" crossorigin="anonymous"></script>
    <title>Widget-LearnyLib</title>

</head>

<body>
    <!-- Je boucle sur mes données -->
    <?php foreach (($responses) as $response) : ?>
        <article class="block mrb-b10">
            <div class="stars-outer">
                <div class="stars-inner"></div>
            </div>
            <p>Note <?php echo $response['rating']; ?></p>
            <h3><?php echo $response['pseudo']; ?></h3>
            <p> Commentaire <?php echo $response['comment']; ?></p>
            <p><?php echo $response['created_at']; ?></p>
        </article>
    <?php endforeach ?>
    <script src="index.js"></script>
</body>

</html>