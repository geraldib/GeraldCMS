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
                            <small>Users</small>
                        </h1>


                            
                         

                         <?php 

                         if (isset($_GET['make_admin'])) {

                            $admin_id = $_GET['make_admin'];
                            makeAdmin($admin_id); //Here is the admin function <--
                               
                         }else if(isset($_GET['make_subscriber'])){
                              
                             $subscriber_id = $_GET['make_subscriber'];

                             makeSubscriber($subscriber_id); // here is the subscriber function <-- 

                         }
                         else if(isset($_GET['delete_User'])){
                              
                             $deleted_id = $_GET['delete_User'];

                             deleteUser($deleted_id); // here is the delete function <-- 

                         }
                         else if (isset($_GET['add_user'])) {
                             include "includes/add_user.php";
                         }
                         else if(isset($_GET['edit_User'])){
                              
                           $edited_id = $_GET['edit_User'];

                           include "includes/edit_user.php"; // here is the delete function <-- 

                         }

                         else{
                            
                        //DISPPLAY ALL
                        //this is default else statement ===============================
                             ?>
                        <table class="table table-bordered table-hover">

                        <thead>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Role</th>
                            <th>Change to sub</th>
                            <th>Change to adm</th>
                            <th>Edit</th>
                            <th>Delete</th>          

                        </thead>
                        <tbody>

                             <?php  
                                 showAllUsers(); 
     
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