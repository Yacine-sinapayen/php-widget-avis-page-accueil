<?php 
// Je récupère le nom de la formation depuis l'url courant de la page

$nameCourse = isset($_GET['formation']) ? $_GET['formation'] : '' ;

// Je récupère les avis de ma formation depuis mon api

// ----- Test affichage formation avec un seul avis -----//
//$api = "https://formations.learnylib.com/api/v1/ws/courses/recrutement/reviews";


// ----- Test affichage formation avec un deux avis -----//
// $api = "https://formations.learnylib.com/api/v1/ws/courses/anesthesie-dentaire/reviews";

//----- Test affichage formation avec plusieurs avis -----//
// $api = "https://formations.learnylib.com/api/v1/ws/courses/facettes/reviews";

//----- BONNE VERSION DE L'URL EN PROD -----//
$api = "https://formations.learnylib.com/api/v1/ws/courses/{$nameCourse}/reviews";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
$responses = json_decode($data, true);


//----- Je ne récupère que les notes au dessus de 4 -----//
$goodValues = array_filter($responses, function ($e) {
    return $e['rating'] >= "4";
});

//----- Parmis ces notes au dessus de 4 je ne veux que les 10 dernières -----//
$new_array = array_slice($goodValues, 0, 10);
