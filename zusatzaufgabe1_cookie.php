<?php
if (isset($_POST['setcookie'])) {
    setcookie('cookie', 1);
} elseif (isset($_POST['deletecookie'])) {
    if (isset($_COOKIE['cookie'])) {
        unset($_COOKIE['cookie']);
        setcookie('cookie', 0, time() - 3600);
    }
}
?>
<!doctype html>
<html lang="de">
<head>
    <title>Zusatzaufgabe 1</title>
    <meta charset="utf-8">
</head>
<body>
<form method="post">
    <button type="submit" name="setcookie" value="1">Set</button>
    <button type="submit" name="deletecookie" value="0">Delete</button>
</form>
</body>
</html>
