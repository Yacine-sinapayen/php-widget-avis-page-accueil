<?php
/* si la var courseId existe ou category existe alors faire l'appel à l'api 
correspondante sinon renvoyer null et faire l'appel à l'api globale */
global $api;

// Je vérifie que mes var existent
$courseId = isset($_GET['formation']) ? $_GET['formation'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';

/* !!! API DE PROD !!! */
$apiCourse = "https://formations.learnylib.com/api/v1/ws/courses/{$courseId}/reviews";
$apiCategory = "https://formations.learnylib.com/api/v2/ws/reviews?category={$category}";
$apiReviews = "https://formations.learnylib.com/api/v2/ws/reviews";

$apiKey = 'e6b0a3a1a8944ad3b68bd0eca9633c19bc0700c0a9a64be1aab7a83c388bf66d';

if($courseId){
    $api = $apiCourse;
}elseif ($category) {
    $api = $apiCategory;
}else {
    $api = $apiReviews;
};


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "X-Api-Key: $apiKey",
));
$data = curl_exec($ch);
curl_close($ch);
$responses = json_decode($data, true);

//----- Je ne récupère que les notes au dessus de 4 -----//
$goodValues = array_filter($responses, function ($e) {
    return $e['rating'] >= "4";
});

//----- Parmis ces notes au dessus de 4 je ne veux que les 20 dernières -----//
$new_array = array_slice($goodValues, 0, 20);
