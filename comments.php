<?php include('db.php') ?>
<?php

    $sql = "select * from comments where Post_id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $_GET['id']);
    $statement->execute();

    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statement->fetchAll();
   
   

?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

   

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>
<body>






<button class="btn btn-default" id ="hideShowBtn" onclick="hideShow()">Hide Comments</button>

 
<div id ="comments">
<?php foreach ($comments as $value) {  ?>



<hr>
<ul>
<b>
Author:
</b>
<i><li><?php echo $value['Author'] ?></li></i>
<b>
Text:
</b>
<i><li><?php echo $value['Text'] ?></li></i>

<form method="GET" action="delete-comment.php" >
                <input class="btn btn-default" type="submit" value="Delete">
                <input type="hidden" value="<?php echo $value['Id']; ?>" name="id"/>
                <input type="hidden" value="<?php echo $value['Post_id']; ?>" name="post_id"/>
            </form>




</ul>
<hr>


<?php } ?>
</div>

<script type="text/javascript">
 
 
  var komentari = document.getElementById("comments");
  var hideShowBtn = document.getElementById("hideShowBtn");

  function hideShow(){
    
    if(hideShowBtn.innerHTML == "Show Comments"){
        komentari.classList.remove("hide")
        hideShowBtn.innerHTML = "Hide Comments"
    } else{
        komentari.className = "hide"
        hideShowBtn.innerHTML = "Show Comments"
    }
}
</script>
</body>
</html>