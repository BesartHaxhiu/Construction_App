<?php 
	require('../../db/db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $sql = 'SELECT * FROM machines WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id]);

    $machine = $query->fetch();
	
	if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $target = '../../assets/images/' .basename($image);

     
        
        if(!empty($_FILES['image']['name'])){
            $sql = 'UPDATE machines SET title = :title, description = :description, image = :image WHERE id = :id ';
            $query = $pdo->prepare($sql);
            $query->bindParam('title', $title);
            $query->bindParam('description', $description);
            $query->bindParam('image', $image);
            $query->bindParam('id', $id);

            $upload = move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
        else{
            $sql = 'UPDATE machines SET title = :title, description = :description WHERE id = :id ';
            $query = $pdo->prepare($sql);
            $query->bindParam('title', $title);
            $query->bindParam('description', $description);
            $query->bindParam('id', $id);
        }
        $query->execute();
        header("Location: machines.php");
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
<div class="mt-2">
    <div class="container my-5">
    <div class="col-md-6  mx-auto">
    <span class="flex-start text-dark"> Edit Machines</span>
    <span class="float-end text-primary goBack" onclick="window.history.go(-1); return false;">Go back</span>
    </div>
        <form method="POST" enctype="multipart/form-data" class="col-md-6 mx-auto">
            <input type="text" name="title" value="<?= $machine['title']; ?>" placeholder="Enter title" class="form-control my-2"><br>
            <input type="text" name="description" value="<?= $machine['description']; ?>" placeholder="Enter description" class="form-control my-2"><br>
            <input type="file" name="image" value="<?= $machine['image']; ?>" class="form-control my-2">
            <img src="../../assets/images/<?= $machine['image'] ?>" class="img-thumbnail" width="100" height="100">
            <br>
            <button type="submit" name="submit" value="Submit" class="btn btn-outline-dark my-2">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
