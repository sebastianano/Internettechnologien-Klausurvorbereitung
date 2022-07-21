<!doctype html>
<html lang="de">
<head>
    <title>Zusatzaufgabe 5</title>
    <meta charset="utf-8">
</head>
<body>
<?php
$cityName = 'Oldenburg';
?>
<h1>Wetter in <?= $cityName ?></h1>

<?php
try {
    /** @noinspection PhpMultipleClassDeclarationsInspection */
    $client = new SoapClient(
        null,
        [
            'location' => 'http://localhost/zusatzaufgabe4_soap_server.php',
            'uri' => 'test'
        ]
    );

    // $response = $client->__soapCall("weatherData", array('cityName' => $cityName));
    /** @noinspection PhpUndefinedMethodInspection */
    $response = $client->weatherData($cityName);

    $description = $response['description'];
    $temperature = $response['temperature'];
    ?>

    <p><?= $description ?></p>
    <p><?= $temperature ?> &deg;C</p>

    <?php
    print('<pre>');
    print_r($response);
    print('</pre>');

} catch (SoapFault $exception) {
    print('Error Code: ' . $exception->faultcode);
    print('<br>');
    print('Error Description: ' . $exception->faultstring);
}
?>
</body>
</html>
