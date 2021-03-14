<?php 
  session_start();
  require('../../db/db.php');
  $query = $pdo->query('SELECT * FROM tools');
  $tools = $query->fetchALL();  
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
    <a href="../machines/machines.php">Machines</a>
    <a class="text-light">Tools</a>
</nav>
<div class="container my-5">
<div class="mx-auto my-2">
    <a href="addTools.php"><i class="fa fa-plus-circle text-warning plus"></i></a>
    </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Stock</th>
      <th scope="col">Image</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($tools as $tool) : ?>
    <tr>
      <th scope="row"><?= $tool['id'] ?></th>
      <td><?= $tool['title'] ?></td>
      <td><?= $tool['description'] ?></td>
      <td><?= $tool['stock'] ?></td>
      <td> <img src="../../assets/images/<?= $tool['image'] ?>" class="img-thumbnail" width="50" height="50"></td>
      <?php if(isset($_SESSION['id']) && $_SESSION['id']): ?>
      <td><a href="editTools.php?id=<?= $tool['id'] ?>" class="text-secondary">Edit</a></td>
      <td><a href="deleteTools.php?id=<?= $tool['id'] ?>" class="text-danger">Delete</a></td>
      <?php else: ?>
      <td><button class="btn btn-outline-secondary" disabled><i class="fa fa-edit"></i></button></td>
      <td><button class="btn btn-outline-danger" disabled><i class="fa fa-trash"></i></button></td>
      <?php endif; ?>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>
</body>
</html>