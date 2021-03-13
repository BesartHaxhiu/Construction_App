<?php require('../../db/db.php'); ?>
<?php 

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];
        $image = $_FILES['image']['name'];
        $target = '../../assets/images/' .basename($image);

        $sql = 'INSERT INTO tools (title, description, stock, image) VALUES (:title, :description, :stock, :image)';
        $query = $pdo->prepare($sql);
        $query->bindParam('title', $title);
        $query->bindParam('description', $description);
        $query->bindParam('stock', $stock);
        $query->bindParam('image', $image);

        $upload = move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $query->execute();

        header('Location: tools.php');
    }

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
<div class="container my-5">
<div class="mx-auto col-md-6 my-2">
    <span class="flex-start text-dark"> Add New Tool</span>
    <span class="float-end text-primary goBack" onclick="window.history.go(-1); return false;">Go back</span>
    </div>
    <form  method="POST" enctype="multipart/form-data" class="col-md-6 mx-auto">
    <input type="text" name="title" placeholder="enter title" class="form-control my-3"/>
    <input type="text" name="description" placeholder="enter description"  class="form-control my-3"/>
    <input type="number" name="stock"  placeholder="enter stock"  class="form-control my-3"/>
    <input type="file" name="image" class="form-control my-3">

    <button type="submit" value="submit" name="submit" class="btn btn-outline-dark">Submit</button>
    </form>
</div>
</body>
</html>