<?php 

    require('../../db/db.php'); 
    session_start(); 

    if(isset($_SESSION['id'])) {
        header('Location: ../../Home.php');
    }

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindParam(':email', $email);
        $query->execute();

        $user = $query->fetch();

        if(is_array($user)&&count($user) > 0 && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            header('Location: ../../Home.php');
        }
        if(isset($_POST['email'])){
            $emailErr = 'Email is required';
        }
        if(isset($_POST['password'])){
            $passwordErr = 'Password is required';
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
    <script src="https://kit.fontawesome.com/70e8663556.js" crossorigin="anonymous"></script>
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
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            <?php if(isset($emailErr)) : ?>
                <p class="text-danger"><?= $emailErr ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            <?php if(isset($passwordErr)) : ?>
                <p class="text-danger"><?= $passwordErr ?></p>
            <?php endif; ?>
        </div>
        <button type="submit" name="submit" value="submit" class="btn btn-dark my-3">Submit</button><br>
        <div class="text-center">
			<p>Don't have an account ? <a href="signup.php">Sign up</a></p>
        </div>    
        </form>
        </div>
    </div>
</body>
</html>
