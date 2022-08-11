<!-- Création de la ressource curl -->
<?php 

$url = "http://localhost:3009/avis";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$listAvis = curl_exec($ch);
curl_close($ch);
$responses = json_decode($listAvis, true);
var_dump($responses);
?>

<!-- Je boucle sur mes données -->
<?php foreach (($responses) as $response) : ?>
    <article>
        <h3><?php echo $response['pseudo']; ?></h3>
        <p>Note <?php echo $response['rating']; ?></p>
        <p> Commentaire <?php echo $response['comment']; ?></p>
        <p><?php echo $response['created_at']; ?></p>
    </article>
<?php endforeach ?>