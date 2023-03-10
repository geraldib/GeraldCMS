<?php include "includes/header.php"; ?>
<?php include "includes/db.php"  ?>

    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>    
            <?php 
            $cnt_categories = 0;




               if(isset($_SESSION['username']) && isset($_GET['category']) ){
                    
                   $category_id = $_GET['category']; 
                      
                   $query = "SELECT * FROM posts WHERE post_category_id = $category_id ";
                   $select_all_post_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                     
                     $post_id  = $row['post_id'];
                     $post_tittle  = $row['post_tittle'];
                     $post_author  = $row['post_author'];
                     $post_date    = $row['post_date'];
                     $post_image   = $row['post_image'];
                     $post_content = substr($row['post_content'], 0,100)." ..." ;


                ?>
                     

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_tittle;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date;?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>


                <?php $cnt_categories ++;  } 


                  }



           else  if (isset($_GET['category'])) {
                 $category_id = $_GET['category'];
             


                   $query = "SELECT * FROM posts WHERE post_category_id = $category_id AND post_status = 'published' ";
                   $select_all_post_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                     
                     $post_id  = $row['post_id'];
                     $post_tittle  = $row['post_tittle'];
                     $post_author  = $row['post_author'];
                     $post_date    = $row['post_date'];
                     $post_image   = $row['post_image'];
                     $post_content = substr($row['post_content'], 0,100)." ..." ;

                ?>
                     

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_tittle;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date;?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
               
               <?php $cnt_categories ++;  }  

               } //isset get category


               ?>



               <?php 

                   if ($cnt_categories == 0) {
                       echo "<h1>No Post in this categorie</h1>";
                   }


                ?>

           </div>
            <!-- Blog Sidebar Widgets Column -->

            <?php include "includes/sidebar.php" ?>
            


        </div>
        <!-- /.row -->

        <hr>



<?php include "includes/footer.php" ?>