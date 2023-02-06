<?php include "includes/header.php"; ?>
<?php include "includes/db.php"  ?>

    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

           <?php include "includes/content.php"; ?>

            <!-- Blog Sidebar Widgets Column -->

            <?php include "includes/sidebar.php" ?>



        </div>
        <!-- /.row -->
         <hr>

        <ul class="pager">

           
           <?php 

             for($i=1; $i<=$page_count;$i++){

                if ($i == $pageSelected) {
                    echo "<li><a id='active_link' href='index.php?page={$i}'>$i</a></li>";
                }else{
                    echo "<li><a href='index.php?page={$i}'>$i</a></li>";
                }

                

             }


            ?>
            
        </ul>

       



<?php include "includes/footer.php" ?>
