<!-- Je récupère le nom de la formation depuis l'url -->
<!-- php 
$url = "https://testurl.com/test/1234?formation=facette&name=sarah";
$components = parse_url($url);
parse_str($components['query'], $results);
echo($results['formation']); 

ou bien 
echo $_GET['formation']
-->

<!-- Je récupère les avis de ma formation depuis mon api -->
<?php
$url = "http://localhost:3009/avis";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
$responses = json_decode($data, true);


//----- Je ne récupère que les notes au dessus de 4 -----//
$goodValues = array_filter($responses, function ($e) {
    return $e['rating'] >= "4";
    //Use this to be sure
    //return strtolower($e['type']) == "good";
});

//----- Parmis ces notes au dessus de 4 je ne veux que les 10 dernières -----//
$new_array = array_slice($goodValues, 0, 10);

// print_r( $new_array);
// echo json_encode($goodValues);
// var_dump($goodValues)
?>