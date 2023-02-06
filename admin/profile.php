<?php include "includes/admin_header.php"; ?>


       <?php 

           if (isset($_SESSION['username'])) {


                $username = $_SESSION['username'];

                $query = "SELECT * FROM users WHERE user_username = '$username' ";

                $select_user_profile = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($select_user_profile)) {
                	
	                  $user_id = $row['user_id']; 
					  $user_username = $row['user_username'];
					  $user_password = $row['user_password'];
					  $user_first_name = $row['user_first_name'];
					  $user_last_name = $row['user_last_name'];
					  $user_email = $row['user_email'];
					  $user_image = $row['user_image'];
					  $user_role = $row['user_role'];
					  $user_rand_salt = $row['user_rand_salt'];

                }

           	
           }


        ?>


        <?php 


        if (isset($_POST['update_profile'])) {


			  $edit_username = $_POST['user_username'];
			  $edit_password = $_POST['user_password'];
			  $edit_first_name = $_POST['user_firstname'];
			  $edit_last_name = $_POST['user_lastname'];
			  $edit_email = $_POST['user_email'];
			  //$user_image = $row['user_image'];
			  $edit_role = $_POST['user_role'];
			  //$user_rand_salt = $row['user_rand_salt'];


	           $query_edit  = " UPDATE users SET ";
	           $query_edit .= " user_first_name =  '$edit_first_name', ";
	           $query_edit .= " user_last_name = '$edit_last_name', ";
	           $query_edit .= " user_role =  '$edit_role', ";
	           $query_edit .= " user_username =  '$edit_username', ";
	           $query_edit .= " user_email =  '$edit_email', ";
	           $query_edit .= " user_password =  '$edit_password' ";
	           $query_edit .= " WHERE user_username = '$username' ";


	           $updated_query_edit = mysqli_query($connection,$query_edit);
	           if (!$updated_query_edit) {
	               var_dump($query_edit);
	           }

	           header("Refresh:0, url = ../includes/logout.php");
        	
        }


         ?>


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
                            <small>Profile</small>
                        </h1>

                    </div>


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

                                    <label for="post_status">Password:</label>
                                    <input class="form-control" type="text" name="user_password" value="<?php echo $user_password ?>"><br>

                                    <!-- <label for="post_image">Post image:</label>
                                    <input class="form-control" type="file" name="image"><br> -->

                                    <input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile">
                                    <p>If you change anything to profile, you'll be loged out and forced to loged in again</p>

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

   <?php include "includes/admin_footer.php"; ?>



