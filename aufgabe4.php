<?php
session_start();

$count = 0;

if (isset($_POST['count'])) {
    $count += intval(htmlspecialchars($_POST['count']));
}

if (isset($_POST['text'])) {
    $count += substr_count(htmlspecialchars($_POST['text']), 'e');
    setcookie('count', $count);
    $_SESSION['count'] = $count;
}

?>
<!doctype html>
<html lang="de">
<head>
    <title>Aufgabe 4</title>
    <meta charset="utf-8">
</head>
<body>
<form method="post">
    <input type="hidden" name="count" value="<?= $count ?>">
    <label>
        Eingabe:
        <input type="text" name="text">
    </label>
    <input type="submit" value="Abschicken">
</form>
<p><?php echo "Gesamtanzahl an e: " . $count; ?></p>
<pre>
<?php print_r($_SESSION); ?>
</pre>
</body>
</html>
