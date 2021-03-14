<?php require ('./db/db.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Construction</title>
</head>
<body>
    <?php 
    require ('./Components/header.php' ); 
    require ('./Components/navbar.php')
    ?>
    <div class="container">
    <div class="card-group">
        <div class="card m-5">
            <img src="./assets/bager.png" width="100" height="200" class="card-img-top p-4" alt="no image">
            <div class="card-body">
            <h5 class="card-title text-center">Machines</h5>
            <a href="./includes/machines/machines.php">View All</a>
            </div>
        </div>
        <div class="card m-5">
            <img src="./assets/tools.png" width="100" height="200" class="card-img-top p-4" alt="no image">
            <div class="card-body">
            <h5 class="card-title text-center">Tools</h5>
            <a href="./includes/tools/tools.php">View All</a>
            </div>
        </div>
        <div class="card m-5">
            <img  src="./assets/safe.png" width="100" height="200" class="card-img-top p-4" alt="no image">
            <div class="card-body">
            <h5 class="card-title text-center">Safety Equipments</h5>
            <a href="./includes/machines/machines.php">View All</a>
            </div>
        </div>
  </div>
  </div>
</body>
</html>