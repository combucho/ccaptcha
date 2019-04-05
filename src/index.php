<? require 'captcha.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple card CAPTCHA</title>
    <script type="text/javascript" src="js/tools.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper">
    <div class="content">
        <h1>Simple card captcha</h1>
        <h2>Beat this card with the minimal one of the hand cards</h2>
        <div class="cards">
            <img src="image.php?card=<?= CARDS_IN_HAND; ?>" alt=""
                 onclick="sendToScript('check.php',{'card':'<?= CARDS_IN_HAND ?>'}, '');"/>
        </div>
        <h2>Hand cards</h2>
        <div class="cards">
            <? for ($i = 0; $i < CARDS_IN_HAND; $i++) { ?>
                <img src="image.php?card=<?= $i ?>" alt=""
                     onclick="sendToScript('check.php',{'card':'<?= $i ?>'},'');"/>
            <? } ?>
        </div>
        <h2>Trump</h2>
        <div class="cards">
            <img src="res/cover.png" alt=""/>
            <img src="image.php?card=<?= CARDS_IN_HAND + 1; ?>" alt=""/>
        </div>
    </div>
</div>
</body>
</html>
