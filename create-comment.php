<?php
    include "dbhome.php";

    $id = $_POST['id'];
    if(!empty($_POST['author']) && !empty($_POST['comment'])) {
        $author = $_POST['author'];
        $comment = $_POST['comment'];
        $sqlInsert = "INSERT INTO comments (Author, Text, Post_id) VALUES ('{$author}', '{$comment}', {$id});";
        $statementInsert = $connection->prepare($sqlInsert);
        $statementInsert->execute();
        $statementInsert->setFetchMode(PDO::FETCH_ASSOC);
    
        header("Location: http://localhost:8080/single-post.php?id=$id");
    } else {
        header("Location: http://localhost:8080/single-post.php?id=$id&error=1");
    }
?>