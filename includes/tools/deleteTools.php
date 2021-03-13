<?php 

    require('../../db/db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $query = 'DELETE FROM tools WHERE id = :id';
    $query = $pdo->prepare($query);

    $query->execute(['id' => $id]);

    header("Location: tools.php");