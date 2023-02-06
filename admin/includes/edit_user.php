  <div id="wrapper">
      <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            EDIT USER
                            <small>Edit the user</small>
                        </h1>

                                         <!--Add New POST -->
                    <?php

                      $query = "SELECT * FROM users WHERE user_id = $edited_id";
                      $select_edited_User = mysqli_query($connection, $query);


                      while ($row = mysqli_fetch_assoc($select_edited_User)) {
                      $user_Id = $row['user_id']; 
                      $user_first_name = $row['user_first_name'];
                      $user_last_name = $row['user_last_name'];
                      $user_role = $row['user_role'];
                      $user_username = $row['user_username'];
                      $user_email = $row['user_email'];
                             // $user_password = $row['user_password'];

                      }  


                      if (isset($_POST['edit_user'])) {

                        $user_first_name = $_POST['user_firstname'];
                        $user_last_name = $_POST['user_lastname'];
                        $user_role = $_POST['user_role'];
                        $user_username = $_POST['user_username'];
                        $user_email = $_POST['user_email'];
                                    // $user_password = $_POST['user_password'];

                                    //  the code for random salt=========
                                    //  $query = "SELECT user_rand_salt FROM users";
                                    //  $select_randSalt = mysqli_query($connection, $query);
                                    //  $row = mysqli_fetch_assoc($select_randSalt);
                                    //  $salt = $row['user_rand_salt'];

                                    //  $hashed_password = crypt($user_password,$salt);
                                    //  the end code for random salt========





                       $query_edit  = " UPDATE users SET ";
                       $query_edit .= " user_first_name =  '$user_first_name', ";
                       $query_edit .= " user_last_name = '$user_last_name', ";
                       $query_edit .= " user_role =  '$user_role', ";
                       $query_edit .= " user_username =  '$user_username', ";
                       $query_edit .= " user_email =  '$user_email' ";
                       // $query_edit .= " user_password =  '$hashed_password' ";
                       $query_edit .= " WHERE user_id = $edited_id ";


                       $updated_query = mysqli_query($connection,$query_edit);
                       if (!$updated_query) {
                           var_dump($query_edit);
                       }

                       header("Refresh:0, url = users.php?edit_user=".$edited_id);
                        echo "User Edited "."<a href='users.php'>View Users</a>";
                         
                      }

                      ?>



                    <div class="col-md-6">
                      <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">

                                    <label for="tittle">First Name:</label>
                                    <input class="form-control" type="text" name="user_firstname" value="<?php echo $user_first_name ?>"><br>
                                    <label for="tittle">Last Name:</label>
                                    <input class="form-control" type="text" name="user_lastname" value="<?php echo $user_last_name ?>"><br>

                                     <label for="user_role">Role:</label><br>
                                     <select name="user_role" id="user_role">
                                          <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
                                          <?php

                                              if ($user_role == 'Subscriber') {
                                                echo "<option value='Admin'>Admin</option>";
                                                
                                              }

                                              else {
                                                echo "<option value='Subscriber'>Subscriber</option>";
                                              }

                                            ?>
                                     </select> 
                                    <div style="margin-bottom: 3px;"></div>      
                                    <br>



                                    <label for="tittle">Username:</label>
                                    <input class="form-control" type="text" name="user_username" value="<?php echo $user_username ?>"><br>

                                    <label for="Post_tags">E-mail:</label>
                                    <input class="form-control" type="text" name="user_email" value="<?php echo $user_email ?>"><br>

<!--                                     <label for="post_status">Password:</label>
                                    <input class="form-control" type="text" name="user_password" value="<?php echo $user_password ?>" --><br>

                                    <!-- <label for="post_image">Post image:</label>
                                    <input class="form-control" type="file" name="image"><br> -->

                                    <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">




                            </div>
                            
                          
                        </form>
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