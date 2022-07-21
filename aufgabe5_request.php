<?php

if (isset($_POST['text'])) {
    echo substr_count(htmlspecialchars($_POST['text']), 'e');
}
