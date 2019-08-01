<?php
   include "dbhome.php";
?>

<?php
    $id = $_GET['id'];
    $sqlDeleteComments = "DELETE FROM comments where Post_id = $id;";
    $statement = $connection->prepare($sqlDeleteComments);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    
   
   

?>



<?php
        $id = $_GET['id'];
        $sqlDeletePost = "DELETE FROM posts WHERE Id = $id;";
        $statementDelete = $connection->prepare($sqlDeletePost);
        $statementDelete->execute();
        $statementDelete->setFetchMode(PDO::FETCH_ASSOC);
    
        header("Location: http://localhost:8080/index.php");
    
?>