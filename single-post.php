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

<body>

<header>
  <?php include 'header.php'; ?>
</header>

<main role="main" class="container">

<div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
              <a href = 'single-post.php?id=<?php echo $value['Id']; ?>'  <h2 class="blog-post-title"> <?php echo $ad['Title'] ?></h2> </a>
                <p class="blog-post-meta"><?php echo $ad['Created_at'] ?>  <a href="#"><?php echo $ad['Author'] ?></a></p>

                <p><?php echo $ad['Body'] ?> </p>
            </div><!-- /.blog-post -->

            <?php include('comments.php') ?>

            

           

           

        </div><!-- /.blog-main -->

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
        <?php include 'sidebar.php'; ?>
        </aside><!-- /.blog-sidebar -->

</main><!-- /.container -->

<footer class="blog-footer">
<?php include 'footer.php'; ?>
</footer>
</body>
</html>
