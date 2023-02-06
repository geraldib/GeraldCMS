  <div id="wrapper">
      <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            ADD USER
                            <small>Add a new user</small>
                        </h1>


                    <!--Add New POST -->
                    <?php addNewUSer(); // add new post ?>


                    <div class="col-md-6">
                      <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">

                                    <label for="tittle">First Name:</label>
                                    <input class="form-control" type="text" name="user_firstname" placeholder="First name..."><br>
                                    <label for="tittle">Last Name:</label>
                                    <input class="form-control" type="text" name="user_lastname" placeholder="Last name..."><br>

                                     <label for="user_role">Role:</label><br>
                                     <select name="user_role" id="user_role">
                                          <option value="Admin">Admin</option>
                                          <option value="Subscriber">Subscriber</option>
                                     </select> 
                                    <div style="margin-bottom: 3px;"></div>      
                                    <br>



                                    <label for="tittle">Username:</label>
                                    <input class="form-control" type="text" name="user_username" placeholder="username..."><br>

                                    <label for="Post_tags">E-mail:</label>
                                    <input class="form-control" type="text" name="user_email" placeholder="E-mail..."><br>

                                    <label for="post_status">Password:</label>
                                    <input class="form-control" type="text" name="user_password" placeholder="Password..."><br>

                                    <!-- <label for="post_image">Post image:</label>
                                    <input class="form-control" type="file" name="image"><br> -->

                                    <input class="btn btn-primary" type="submit" name="create_user" value="Add User">




                            </div>
                            
                        </div>

                          
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