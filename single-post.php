<?php include('db.php') ?>

<?php
if (isset($_GET['id'])) {
    $sql = "select * from posts where Id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $_GET['id']);
    $statement->execute();

    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $ad = $statement->fetchAll()[0];
   
}; 
?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Single Post</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>


<?php include 'header.php'; ?>
<body>


  


<main role="main" class="container">

<div class="row">


            <div class="col-sm-8 blog-main">
            
            <div class="blog-post">
            
              <a href = 'single-post.php?id=<?php echo $ad['Id']; ?>'>  <h2 class="blog-post-title"> <?php echo $ad['Title'] ?></h2> </a>
                <p class="blog-post-meta"><?php echo $ad['Created_at'] ?> <b> <?php echo $ad['Author'] ?></b></p>

                <p><?php echo $ad['Body'] ?> </p>

                <form method="GET" action="delete-post.php" name="deletePost" id="deletePostForm">
                <input class="btn btn-default" type="submit" value="Delete this post" id="deletePostBtn">
                <input type="hidden" value="<?php echo $ad['Id']; ?>" name="id" />
                </form>
                <script>
                    var deletePostBtn = document.getElementById('deletePostBtn');
                    var deletePostForm = document.getElementById('deletePostForm');

                    deletePostBtn.addEventListener("click", function(event){
                    event.preventDefault();
                    if(window.confirm("Do you really want to delete this post?")) {
                    deletePostForm.submit();
                    }
                    });
                 


                   
                </script><br>
                
            <h5>Make comment:</h5>
            
            <?php
                $error = '';
                if ($_SERVER["REQUEST_METHOD"] === 'GET' && !empty($_GET['error'])) {
                    $error = 'You must complete all the fields!';
                }
            ?>
            <form class="form" method="POST" action="create-comment.php" >
                <?php if (!empty($error)) {?>
                    <p class="alert alert-danger">
                        <?php echo $error; ?>
                </p>
                <?php } ?>
                <br>               
                
                <input name="author" type="text" placeholder="Author"  /><br><br>
                <textarea name="comment" rows="5" cols="50" placeholder="Text"></textarea>
                <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id"/><br><br>
                <input class="btn btn-default" type="submit" value="Submit">
            </form>
            
            <br>
            <br>


            
            <h5>Comments:</h5>
            <?php include 'comments.php' ?>
           
            

           
            
            </div><!-- /.blog-post -->
            

        </div><!-- /.blog-main -->
        <?php include 'sidebar.php' ?>
        
        
        
        </div><!-- /.row -->
</main><!-- /.container -->

<footer class="blog-footer">
<?php include 'footer.php'; ?>
</footer>
</body>
</html>
