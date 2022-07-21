<!doctype html>
<html lang="de">
<head>
    <title>Aufgabe 5</title>
    <meta charset="utf-8">
</head>
<body>
<label>
    Eingabe:
    <input type="text" name="eingabe" onkeyup="count(this)"/>
</label>
<p>
    Gesamtanzahl an e: <span id="counter">0</span>
</p>
<script type="text/javascript">
    const counter = document.getElementById('counter');

    function count(target) {
        const formData = new FormData();
        formData.set('text', target.value);
        fetch('aufgabe5_request.php', {method: 'post', body: formData})
            .then(response => response.text())
            .then(data => {
                counter.innerText = data; // innerHTML!?
            });
    }
</script>
</body>
</html>
