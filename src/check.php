<?php

session_start();
$card = $_POST['card'];

if (isset($_SESSION['winner'])) {
    if ($card == $_SESSION['winner']) echo "Captcha is valid.";
    else echo "Captcha is invalid. You are bot or fool :)";
}

echo "<br /><a href='/'>back</a>";
