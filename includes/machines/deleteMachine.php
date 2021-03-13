<?php
    require('../../db/db.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $query = "DELETE FROM machines WHERE id= :id";
    $query = $pdo->prepare($query);

    $query->execute(['id' => $id]);


    header("Location: machines.php");