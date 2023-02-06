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
                            <small>Comments</small>
                        </h1>


                            
                         

                         <?php 

                         if (isset($_GET['delete_comment'])) {

                            $delete_comment_id = $_GET['delete_comment'];
                            deleteComment($delete_comment_id); //Here is the delete function <--
                               
                         }else if(isset($_GET['disapprove_comment'])){
                              
                             $disaprove_id = $_GET['disapprove_comment'];

                             disapproveComment($disaprove_id); // here is the Disapprove function <-- 

                         }
                         else if(isset($_GET['approve_comment'])){
                              
                             $approved_id = $_GET['approve_comment'];

                             approveComment($approved_id); // here is the Approve function <-- 

                         }
                         else if (isset($_GET['add_Posts'])) {
                             include "includes/add_Posts.php";
                         }
                         else{
                            
                        //DISPPLAY ALL
                        //this is default else statement ===============================
                             ?>
                        <table class="table table-bordered table-hover">

                        <thead>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>In response to</th>
                            <th>Date</th>
                            <th>Approve</th>
                            <th>Unapprove</th>
                            <th>Delete</th>          

                        </thead>
                        <tbody>

                             <?php  
                                 showAllComments(); 
     
                             }

                      //Default switch statements end here ================================

                          ?>


                        </tbody>
                          
                      </table>  


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