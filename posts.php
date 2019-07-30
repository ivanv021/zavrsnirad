<?php include('db.php') ?>

<?php
$sql = "select * from posts ORDER BY Created_at DESC;";
$statement = $connection->prepare($sql);
$statement->execute();

$statement->setFetchMode(PDO::FETCH_ASSOC);
$ads = $statement->fetchAll();


?>

<?php foreach ($ads as $value) {  ?>

<div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
              <a href = 'single-post.php?id=<?php echo $value['Id']; ?>'  <h2 class="blog-post-title"> <?php echo $value['Title'] ?></h2> </a>
                <p class="blog-post-meta"><?php echo $value['Created_at'] ?>  <a href="#"><?php echo $value['Author'] ?></a></p>

                <p><?php echo $value['Body'] ?> </p>
            </div><!-- /.blog-post -->

            

           

           

        </div><!-- /.blog-main -->

        <aside class="col-sm-3 ml-sm-auto blog-sidebar">
        <?php include 'sidebar.php'; ?>
        </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

    <?php } ?>
    <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>