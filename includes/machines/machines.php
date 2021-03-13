<?php 
  require('../../db/db.php');
  $query = $pdo->query('SELECT * FROM machines');
  $machines =  $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php require('../../Components/header.php');  ?>
<div class="container">
<a href="addMachines.php">Add new machines</a>
<span class="float-end text-info goBack" onclick="window.history.go(-1); return false;">Go back</span>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
    <?php foreach($machines as $machine): ?>
      <div class="col">
        <div class="card h-100">
          <img src="../../assets/images/<?php echo $machine['image'] ?>" class="card-img-top h-50 w-100" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $machine['title'] ?></h5>
            <p class="card-text"><?= $machine['description'] ?></p>
          </div>
          <div class="card-footer">
            <a class="btn btn-outline-danger" href="deleteMachine.php?id=<?php echo $machine['id']; ?>">Delete</a>
            <a class="btn btn-outline-dark" href="editMachine.php?id=<?php echo $machine['id']; ?>">Edit</a>
          </div>
        </div>
      </div>
      <?php endforeach ?>
</div>

</div>
</body>
</html>

