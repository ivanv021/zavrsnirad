<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Create</title>

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
            
            <h5>Make post:</h5>

            <?php
                $error = '';
                if ($_SERVER["REQUEST_METHOD"] === 'GET' && !empty($_GET['error'])) {
                    $error = 'You must complete all the fields!';
                }
            ?>
            <form class="form" method="POST" action="create-post.php" >
                <?php if (!empty($error)) {?>
                    <p class="alert alert-danger">
                        <?php echo $error; ?>
                </p>
                <?php } ?>
                <br>               
                
                <input name="author" type="text" placeholder="Author"  /><br><br>
                <input name="title" type="text" placeholder="Title"  /><br><br>
                <textarea name="body" rows="5" cols="50" placeholder="Text"></textarea><br>
                <input type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" name="created_at"/>
                <input class="btn btn-default" type="submit" value="Submit">
            </form>
            
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