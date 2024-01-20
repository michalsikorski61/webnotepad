<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Księga gości</title>
</head>

<body>
    <h1>Witaj w księdze gości</h1>
    
    <?php
    require_once('config.php');
    require_once('includes/nav.php');
    ?>
    <a href="sign.php">Wpisz się</a>
    <?php
    require_once('includes/footer.php');
    ?>
    <p>Oto ostatnie osoby które tu były</p>
    <!-- wpisy tutaj -->
    <?php require_once("entries.php"); ?>
</body>

</html>