<?php include "includes/admin_header.php"; ?>



    <div id="wrapper">




        <!-- Navigation -->
       <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Welcome Admin 
                            <small>Posts</small>
                        </h1>


                            
                         

                         <?php 

                         if (isset($_GET['delete_post'])) {

                            $delete_post_id = $_GET['delete_post'];
                            deletePost($delete_post_id); //Here is the delete function <--
                               
                         }else if(isset($_GET['edit_Posts'])){
                              
                             $edit_post_id = $_GET['edit_Posts'];

                             include "includes/edit_Posts.php"; // here is the EDIT post file <-- 

                         }
                         else if (isset($_GET['add_Posts'])) {
                             include "includes/add_Posts.php";
                         }
                         else if (isset($_GET['reset_views'])) {

                               $reset_id = $_GET['reset_views'];
                               resetViews($reset_id);
                         }
                         else{
                            
                        //DISPPLAY ALL
                        //this is default else statement ===============================
                             ?>



        <?php

        if (isset($_POST['checkBoxArray'])) {
            
             foreach ($_POST['checkBoxArray'] as $postValueId) {
                
                $bulk_options = $_POST['bulk_options'];


                switch ($bulk_options) {
                    case 'Publish':
                        $query_publish  = "UPDATE posts SET post_status =  'published' WHERE post_id = {$postValueId}";
                        $update_status = mysqli_query($connection,$query_publish);
                        if (!$update_status) {
                            var_dump($query_publish);
                        }
                        break;

                        case 'Draft':
                        $query_draft  = "UPDATE posts SET post_status =  'draft' WHERE post_id = {$postValueId}";
                        $update_status = mysqli_query($connection,$query_draft);
                        if (!$update_status) {
                            var_dump($query_draft);
                        }
                        break;


                        //clone case start
                        case 'Clone':
                        $query_clone  = "SELECT * FROM posts  WHERE post_id = {$postValueId}";
                        $clone_result = mysqli_query($connection,$query_clone);
                        if (!$clone_result) {
                            var_dump($query_clone);
                        }else{
                          while ($row = mysqli_fetch_assoc($clone_result)) {
                           
                              $post_Category = $row['post_category_id'];
                              $post_Tittle = $row['post_tittle'];
                              $post_Author = $row['post_author'];
                              $post_Date = $row['post_date'];
                              $post_Image = $row['post_image'];
                              $post_Content = $row['post_content'];
                              $post_Tags = $row['post_tags'];
                              $post_Comment_Count  = $row['post_comment_count'];
                              $post_Status  = $row['post_status'];

                          }

                                    $copy_query = "INSERT INTO posts (post_category_id,
                                                    post_tittle,
                                                    post_author,
                                                    post_date,
                                                    post_image,
                                                    post_content,
                                                    post_tags,
                                                    post_comment_count,
                                                    post_status)  ";

                                    $copy_query .= " VALUES ('{$post_Category}',
                                                    '{$post_Tittle}',
                                                    '{$post_Author}',
                                                    '{$post_Date}',
                                                    '{$post_Image}',
                                                    '{$post_Content}',
                                                    '{$post_Tags}',
                                                    '{$post_Comment_Count}',
                                                    '{$post_Status}') ";

                                   $copy_result = mysqli_query($connection,$copy_query); 

                                   if (!$clone_result) {
                                          var_dump($query_clone);
                                        }

                        }
                        break;
                       //clone end=======================     
                       


                        case 'Delete':
                        $query_delete  = "DELETE FROM posts WHERE post_id = {$postValueId}";
                        $delete = mysqli_query($connection,$query_delete);
                        if (!$delete) {
                            var_dump($query_delete);
                        }
                        break;
                    
                        default:
                            # code...
                            break;
                }

             }

        }


         ?>
                        



                             

                        <form action="" method="POST">     
                        <table class="table table-bordered table-hover">

                          <!-- Here we insert the options and two buttons -->

                            <div id="bulkOptionContainer" style="padding:0px;" class="col-xs-4">
                          
                                <select class="form-control" name="bulk_options"  id="">
                                    <option value="">Select Options</option>
                                    <option value="Publish">Publish</option>
                                    <option value="Draft">Draft</option>
                                    <option value="Clone">Clone</option>
                                    <option value="Delete">Delete</option>
                                </select>
                                
                            </div>
                            <div class="col-xs-4">
                                <input type="submit" name="submit" class="btn btn-success" value="Apply">
                                <a href="?add_Posts" class="btn btn-primary">Add New</a>
                                <?php include "includes/delete_modal.php"; ?>
                            </div>





                          <!-- Here we insert the options and two buttons -->
                        <thead>
                            <th><input id="selectAllBoxes" type="checkbox" name=""></th>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Tittle</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Tags</th>
                            <th>Comments</th>
                            <th>Views</th>
                            <th>Date</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>

                             <?php  
                                 showAllPosts(); 
     
                             }

                      //Default switch statements end here ================================

                          ?>


                        </tbody>
                          
                      </table>  
                      </form>


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





   <script type="text/javascript">
     

       $(document).ready(function(){

               
         $('.delete_link').on("click",function(){


              var id = $(this).attr("rel");

              var delete_url = "posts.php?delete_post="+ id +"";

              $('.modal_delete_link').attr("href",delete_url);

              $('#myModal').modal('show'); 


         });






       });



   </script>