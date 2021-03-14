<?php
session_start();
?>
<?php require('../../db/db.php') ?>
<?php
        if(isset($_SESSION['id'])) {
        header('Location: ../../Home.php');
    }
?>
    
<?php

    if(isset($_POST['submit'])) {
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $password = password_hash($_POST['password'], PASSWORD_ARGON2I);

            $stmt = $pdo->prepare('SELECT COUNT(email) AS EmailCount FROM users WHERE email = :email');
            $stmt->execute(array('email' => $_POST['email']));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result['EmailCount'] == 0) {
            $query = $pdo->prepare('INSERT INTO users (email, password) VALUES ( :email, :password)');
            $query->bindParam(':email', $_POST['email']);
            $query->bindParam(':password', $password);
            $query->execute();
            header('Location: ../../Home.php');
            } 
        }
        if(empty($_POST['email'])){
            $emailErr = 'Email is required!';
        }
        if(empty($_POST['password'])){
            $passwordErr = 'Password is required';
        }
        
        else{
            echo "<div class='alert alert-primary' role='alert'>
                        This email is taken!
                    </div>";
        }
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
    <src="https://kit.fontawesome.com/70e8663556.js" crossorigin="anonymous"></src=>
    <title>Document</title>
</head>
<body>
    <div class="container">
    <a class="mt-5" href="../../Home.php">Return Home</a>
        <div class="my-5 p-5 card">
        <form class="col-md-6 mx-auto" method="POST">
        <div class="text-center mx-auto">
        <i class="fa fa-user-circle" style="font-size: 3rem"></i>
        </div>
        <div class="form-group ">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            <?php if(isset($emailErr)) : ?>
                <p class="text-danger"><?= $emailErr ?></p>
            <?php endif; ?>        
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control"  id="exampleInputPassword1" placeholder="Password">
            <?php if(isset($passwordErr)) : ?>
                <p class="text-danger"><?= $passwordErr ?></p>
            <?php endif; ?>
        </div>
        <button type="submit" name="submit" value="submit" class="btn btn-dark my-3">Submit</button><br>
        <div class="text-center">
        <p>Already have an account ? <a href="login.php">Login</a></p>
        </div>    
        </form>
        </div>
    </div>
</body>
</html>