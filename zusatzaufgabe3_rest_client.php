<!doctype html>
<html lang="de">
<head>
    <title>Zusatzaufgabe 3</title>
    <meta charset="utf-8">
</head>
<body>
<?php
$cityName = 'Oldenburg';

$url = 'http://localhost/zusatzaufgabe2_rest_server.php?method=weatherData&parameters=';
$url .= urlencode(json_encode(['cityName' => $cityName]));
$response = file_get_contents($url);
$arr = json_decode($response, true);

?>
<h1>Wetter in <?= $cityName ?></h1>

<?php
if (!isset($arr['error'])) {
    $description = $arr['description'];
    $temperature = $arr['temperature'];
    ?>

    <p><?= $description ?></p>
    <p><?= $temperature ?> &deg;C</p>

    <?php
    print('<pre>');
    print_r($arr);
    print('</pre>');
} else {
    print('Ein unerwarteter Fehler ist aufgetreten.');
}
?>
</body>
</html>
