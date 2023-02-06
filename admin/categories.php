<?php include "includes/admin_header.php"; ?>


    <div id="wrapper">




        <!-- Navigation -->
       <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin 
                            <small>Categories</small>
                        </h1>


                    <div class="col-md-6">
                    <!--Add a new category -->
                    <?php insertCategory();  ?>   

                      <form action="" method="POST">
                        <div class="form-group">

                            <label for="cat_tittle">Add Category</label>
                            <input class="form-control" type="text" name="cat_tittle" placeholder="Category name..."><br>

                            <input class="btn btn-primary" type="submit" name="submit" value="Add">
                            
                        </div>

                          
                      </form>
                     
                 <!--inculde the edit -->

                 <?php include "includes/edit_categories.php" ; ?>

      
     

                    </div>

                    <div class="col-md-6">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Tittle</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <!-- /Show categories -->
                                   <?php showAllCategories(); ?>
                                     <!-- /Delete categories -->
                                    <?php  deleteCategory(); ?>


                            </tbody>

                        </table>

                    </div>

                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php"; ?>