

<?php include('db.php') ?>

<?php
$sql = "select * from posts ORDER BY Created_at DESC LIMIT 5;";
$statement = $connection->prepare($sql);
$statement->execute();

$statement->setFetchMode(PDO::FETCH_ASSOC);
$ads = $statement->fetchAll();


?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">

<div class="sidebar-module sidebar-module-inset">
                <b><h3>Latest posts</h3></b>

                <?php foreach ($ads as $value) {  ?>
                   <i> <a href = 'single-post.php?id=<?php echo $value['Id']; ?>'> <h5><?php echo $value['Title'] ?></h5></a></i>
                <?php } ?>
            </div>

            
        
</aside><!-- /.blog-sidebar -->