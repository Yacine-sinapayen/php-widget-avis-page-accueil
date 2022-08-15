<!-- Je récupère les données de mon api -->
<?php
$url = "http://localhost:3009/avis";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
$responses = json_decode($data, true);
// var_dump($responses);
?>

