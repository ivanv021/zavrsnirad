<?php
    include "dbhome.php";

    
    if(!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['body'])) {
        $author = $_POST['author'];
        $title = $_POST['title'];
        $body = $_POST['body'];
        $createdAt = $_POST['created_at'];
        $sqlInsert = "INSERT INTO posts (Author, Title, Body, Created_at) VALUES ('{$author}', '{$title}', '{$body}', '{$createdAt}');";
        $statementInsert = $connection->prepare($sqlInsert);
        $statementInsert->execute();
        $statementInsert->setFetchMode(PDO::FETCH_ASSOC);
    
        header("Location: http://localhost:8080/index.php");
    } else {
        header("Location: http://localhost:8080/create.php?&error=1");
    }
?>