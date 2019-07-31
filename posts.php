<?php include('dbhome.php') ?>

<?php
$sql = "select * from posts ORDER BY Created_at DESC;";
$statement = $connection->prepare($sql);
$statement->execute();

$statement->setFetchMode(PDO::FETCH_ASSOC);
$ads = $statement->fetchAll();


?>


<div class="col-sm-8 blog-main">

<?php foreach ($ads as $value) {  ?>


        
        
            
            <div class="blog-post">
    
              <a href = 'single-post.php?id=<?php echo $value['Id']; ?>'>  <h2 class="blog-post-title"> <?php echo $value['Title'] ?></h2> </a>
                <b><p class="blog-post-meta"><i><?php echo $value['Created_at'] ?> </i> <?php echo $value['Author'] ?></p></b>

                <p><?php echo $value['Body'] ?> </p>
                

                </div><!-- /.blog-post -->
                <?php } ?>
                
            

            

           

           

        </div><!-- /.blog-main -->

        

   

    
    
    