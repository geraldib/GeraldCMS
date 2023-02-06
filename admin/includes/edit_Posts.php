  <div id="wrapper">
      <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin 
                            <small>Edit post</small>
                        </h1>


                    <!--Add New POST -->
                    <?php

                      $query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
                      $select_Posts_Admin = mysqli_query($connection, $query);


                      while ($row = mysqli_fetch_assoc($select_Posts_Admin)) {
                      $post_Id = $row['post_id']; 
                      $post_Category = $row['post_category_id'];
                      $post_Tittle = $row['post_tittle'];
                      $post_Author = $row['post_author'];
                      $post_Date = $row['post_date'];
                      $post_Image = $row['post_image'];
                      $post_Content = $row['post_content'];
                      $post_Status = $row['post_status'];
                      $post_Tags = $row['post_tags'];
                      $post_Comments = $row['post_comment_count'];

                      }


                      if (isset($_POST['edit_the_post'])) {

                       $post_Author = escape($_POST['post_author']);
                       $post_Tittle = escape($_POST['post_tittle']) ;
                       $post_Category = escape($_POST['post_category']);
                       $post_Status = escape($_POST['post_status']);
                       $post_Image = escape($_FILES['image']['name']);
                       $post_Image_temp = escape($_FILES['image']['tmp_name']);
                       $post_Content = escape($_POST['post_content']);
                       $post_Tags = escape($_POST['post_tags']);


                       move_uploaded_file($post_Image_temp, "images/$post_Image");

                       if (empty($post_Image)) {
                         $query = "SELECT * FROM posts WHERE post_id = $edit_post_id " ;

                         $select_image = mysqli_query($connection,$query);
                         while ($row = mysqli_fetch_assoc($select_image)) {
                           $post_Image = $row['post_image'];
                         }
                       }


                       $query_edit  = "UPDATE posts SET ";
                       $query_edit .= " post_tittle =  '$post_Tittle', ";
                       $query_edit .= " post_category_id = '$post_Category', ";
                       $query_edit .= " post_date =  now(), ";
                       $query_edit .= " post_author =  '$post_Author', ";
                       $query_edit .= " post_status =  '$post_Status', ";
                       $query_edit .= " post_tags =  '$post_Tags', ";
                       $query_edit .= " post_content =  '$post_Content', ";
                       $query_edit .= " post_image =  '$post_Image' ";
                       $query_edit .= " WHERE post_id = $edit_post_id ";


                        $updated_query = mysqli_query($connection,$query_edit);

                        header("Refresh:0, url = posts.php?edit_Posts=".$edit_post_id);

                        
                      }



                     // var_dump($query_edit);

                      ?>


                    <div class="col-md-6">
                      <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">

                        <label for="tittle">Post Tittle:</label>
                        <input class="form-control" type="text" name="post_tittle" value="<?php echo $post_Tittle; ?>"><br>
                         

                        <label for="post_category">Post Category Id:</label><br>
                        <select name="post_category" id="post_category" value="<?php echo '$cat_tittle'; ?>">
                        <?php addCatDropdown($post_Category); ?>   
                        </select> 
                        <div style="margin-bottom: 3px;"></div>      
                        <br>

                        <label for="tittle">Author:</label><br>
                        <select name="post_author">
                                         <?php  

                                               echo "<option value='$post_Author' selected hidden> select: </option>";


                                               $query_author = "SELECT * FROM users WHERE user_role = 'Admin' ";
                                               $result_author = mysqli_query($connection, $query_author); 
                                               while ($row = mysqli_fetch_assoc($result_author)) {
                                               $author_id = $row['user_id'];
                                               $author_username = $row['user_username']; 

                                               echo "<option value='$author_username'> $author_username </option>";
                                               
                                               } 
                                         ?>   
                                    </select> <br>
                        <!-- <input class="form-control" type="text" name="post_author" value="<?php echo $post_Author; ?>"> -->
                        <br>
                        <label>Select Post Status:</label><br>
                        <select name="post_status">
                          
                        <?php postDropdownSelection($edit_post_id); ?>

                        </select><br>




                       <!--  <label for="post_status">Post Status:</label>
                        <input class="form-control" type="text" name="post_status" value="<?php echo $post_Status; ?>"><br> -->


                        <br>
                        <label for="post_image">Post image:</label>
                        <div>
                        <img width="100" src="images/<?php echo $post_Image; ?>">
                        </div><br>
                        <input class="form-control" type="file" name="image"><br>

                        <label for="Post_tags">Post Tags:</label>
                        <input class="form-control" type="text" name="post_tags" value="<?php echo $post_Tags; ?>"><br>

                        <label for="post_content">Post Content:</label>
                        <textarea id="editor" class="form-control" rows="5" cols="50" type="text-area" name="post_content"><?php echo $post_Content; ?>
                        </textarea><br>

                        <input class="btn btn-primary" type="submit" name="edit_the_post" value="Edit Post">




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