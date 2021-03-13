<?php 

try{
    $pdo = new PDO("mysql:host=localhost;dbname=constructionapp", "root", "");
}catch(PDOException $pdo) {
    die("Couldn't Connect To Database :(");
}