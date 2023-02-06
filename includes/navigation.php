    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS GeraldIb</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

              <?php 

                 $query = "SELECT * FROM categories ";
                 $select_all_categories = mysqli_query($connection, $query);

                 while ($row = mysqli_fetch_assoc($select_all_categories)) {
                     
                     $cat_tittle = $row['cat_tittle'];
                     $cat_id = $row['cat_id'];

                      $category_class = '';
                      $register_class = '';

                     $pageName = basename($_SERVER['PHP_SELF']);

                     if (isset($_GET['category']) && $_GET['category'] == $cat_id ) {

                         $category_class = 'active';

                     }
                     else if ($pageName == 'registration.php') {
                         $register_class = 'active'; 
                     }

                     echo 
                     "<li class='$category_class'>
                     <a href='category.php?category=$cat_id'>{$cat_tittle}</a>
                     </li>";
                 } ?>
                 </ul>

                 <ul class="nav navbar-nav">
                 <li ><a href="admin">Admin</a></li>
                 <li class="<?php echo $register_class; ?>"><a href="registration.php">Register</a></li>
                 </ul>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>