<?php

    require('../../db/db.php');
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: ../../Home.php');
    }

    if(isset($_POST['submit'])){
    if(!empty($_POST['title']) && !empty($_POST['description'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target = '../../assets/images/' .basename($image);

    $sql = 'INSERT INTO machines (title, description, image) VALUES (:title, :description, :image)';
    $query = $pdo->prepare($sql);
    $query->bindParam('title', $title);
    $query->bindParam('description', $description);
    $query->bindParam('image', $image);

    $upload = move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $query->execute();
    header('Location: machines.php');
    }
    if(empty($_POST['title'])){
        $titleErr = 'Title is required';
    }
    if(empty($_POST['description'])){
        $descriptionErr = 'Description is required';
    }

   
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Add Machines</title>
</head>
<body>
<?php require('../../Components/header.php');  ?>
<div class="container py-5">
    <div class="col-md-6  mx-auto">
    <span class="flex-start text-dark"> Add New Machines</span>
    <span class="float-end text-primary goBack" onclick="window.history.go(-1); return false;">Go back</span>
    </div>
<form  method="POST" enctype="multipart/form-data" class="col-md-6 mx-auto">
<input type="text" name="title" placeholder="enter title" class="form-control my-3"/>
<?php if(isset($titleErr)) : ?>
    <p class="text-danger"><?= $titleErr ?></p>
<?php endif; ?>
<input type="text" name="description" placeholder="enter description"  class="form-control my-3"/>
<?php if(isset($descriptionErr)) : ?>
    <p class="text-danger"><?= $descriptionErr ?></p>
<?php endif; ?>
<input type="file" name="image" class="form-control my-3">

<button type="submit" value="submit" name="submit" class="btn btn-outline-dark">Submit</button>
</form>
</div>
</body>
</html>

