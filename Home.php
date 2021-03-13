<?php require ('./db/db.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css" >
    <title>Construction</title>
</head>
<body>
    <?php require ('./Components/header.php' )?>
    <div class="container">
        <div class="utilsContainer">
        <div class="utils">
            <h1>Machines</h1>
            <img src="./assets/bager.png" alt="no image">
            <a href="./includes/machines/machines.php">View All</a>
        </div>
        <div class="utils">
            <h1>Tools</h1>
            <img src="./assets/tools.png" alt="no image">
            <a href="./includes/tools/tools.php">View All</a>
        </div>
        <div class="utils">
            <h1>Safety</h1>
            <img src="./assets/safe.png" alt="no image">
            <a href="https://www.google.com/" target="_blank">View All</a>
        </div>
        </div>
    </div>
</body>
</html>