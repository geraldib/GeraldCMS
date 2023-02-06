<?php include "includes/header.php"; ?>
<?php include "includes/db.php"  ?>

    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

                <div class="col-md-8">


                <?php 

                if (isset($_GET['p_id'])) {
                    
                      $post_Page_id = $_GET['p_id'];
                      $post_Author_id = $_GET['author'];

                }

                   $query = "SELECT * FROM posts WHERE post_author = '{$post_Author_id}' ";
                   $result = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                     
                     $post_id  = $row['post_id'];
                     $post_tittle  = $row['post_tittle'];
                     $post_author  = $row['post_author'];
                     $post_date    = $row['post_date'];
                     $post_image   = $row['post_image'];
                     $post_content = $row['post_content'];

                ?>


                <h1 class="page-header">
                    <?php echo "$post_author"; ?>'s
                    <small>Posts</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_tittle;?></a>
                </h2>
                <p class="lead">
                    All posts by <?php echo $post_author;?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="">
                <hr>

                 <?php 
                        if (isset($_SESSION['username'])) {
                           if (isset($_GET['p_id'])) {
                              $post_edit = $_GET['p_id'];

                              echo "<a href='admin/posts.php?edit_Posts=$post_edit'><h5>Edit</h5></a>";
                           }
                        }

                 ?>

                <?php 
         
                        if (isset($_SESSION['username'])) {
                           if (isset($_GET['p_id'])) {
                              $post_edit = $_GET['p_id'];

                              echo "<a href='admin//posts.php?delete_post=$post_edit'><h5>Delete</h5></a>";
                           }
                        }
                 ?>
                <hr>    
                <p><?php echo $post_content;?></p>
                
               
               <?php  }  ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <?php include "includes/sidebar.php" ?>
            


        </div>
        <!-- /.row -->

        <hr>
<div class="col-md-8">
<!-- Blog Comments -->
<?php include "includes/comments.php" ?>
</div>

<?php include "includes/footer.php" ?>