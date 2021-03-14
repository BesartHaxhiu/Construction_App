<?php 
  session_start();
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
    <script src="https://kit.fontawesome.com/70e8663556.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php require('../../Components/header.php');  ?>
<nav>
    <a href="../../Home.php">Home</a>
    <a class="text-light">Machines</a>
    <a href="../tools/tools.php">Tools</a>
</nav>
<div class="container my-5">
<a href="addMachines.php"><i class="fa fa-plus-circle text-warning plus"></i></a>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
    <?php foreach($machines as $machine): ?>
      <div class="col">
        <div class="card h-100">
          <img src="../../assets/images/<?php echo $machine['image'] ?>" class="card-img-top h-50 w-60 p-4" alt="This machine has no image">
          <div class="card-body">
            <h5 class="card-title text-center"><?= $machine['title'] ?></h5>
            <p class="card-text text-secondary"><?= $machine['description'] ?></p>
          </div>
          <div class="card-footer">
            <?php if(isset($_SESSION['id']) && $_SESSION['id']): ?>
            <a class="btn btn-outline-danger" href="deleteMachine.php?id=<?php echo $machine['id']; ?>"><i class="fa fa-trash"></i></a>
            <a class="btn btn-outline-dark float-end" href="editMachine.php?id=<?php echo $machine['id']; ?>"><i class="fa fa-edit"></i></a>
            <?php else: ?>
              <button class="btn btn-outline-danger" disabled><i class="fa fa-trash"></i></button>
              <button class="btn btn-outline-dark float-end" disabled><i class="fa fa-edit"></i></button>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach ?>
</div>

</div>
</body>
</html>

