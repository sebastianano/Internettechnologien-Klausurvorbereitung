<?php

function weatherData(array $parameters): array
{
    include_once('zusatzaufgabe_config.php');

    $apiKey = API_KEY;

    $cityName = 'Berlin';
    if (isset($parameters['cityName'])) {
        $cityName = htmlspecialchars($parameters['cityName']);
    }

    $stateCode = 'sh';
    $countryCode = 'de';
    $url = "https://api.openweathermap.org/geo/1.0/direct?q=$cityName,$stateCode,$countryCode&appid=$apiKey";
    $response = @file_get_contents($url);
    $arr = json_decode($response, true);
    if (empty($arr)) return ['error' => 1];

    $lat = $arr[0]['lat'];
    $lon = $arr[0]['lon'];
    $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&units=metric&lang=de&appid=$apiKey";
    $response = @file_get_contents($url);
    $arr = json_decode($response, true);
    if (empty($arr)) return ['error' => 1];

    return [
        'description' => $arr['weather'][0]['description'],
        'temperature' => $arr['main']['temp']
    ];
}

if (isset($_GET['method']) && isset($_GET['parameters'])) {
    $method = $_GET['method'];
    $parameters = json_decode($_GET['parameters'], true);
    if ($method === 'weatherData') {
        $result = weatherData($parameters);
        echo json_encode($result);
    }
}
