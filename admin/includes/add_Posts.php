  <div id="wrapper">
      <div id="page-wrapper">

            <div class="container-fluid">

                              <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            ADD POST 
                            <small>Add a new post</small>
                        </h1>


                    <!--Add New POST -->
                    <?php addNewPost(); // add new post ?>


                    <div class="col-md-6">
                      <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">

                                    <label for="tittle">Post Tittle:</label>
                                    <input class="form-control" type="text" name="post_tittle" placeholder="Tittle name..."><br>

                                     <label for="post_category">Post Category Id:</label><br>
                                     <select name="post_category_id" id="post_category_id">
                                         <?php    
                                            $query_cat = "SELECT * FROM categories";
                                             $result_cat = mysqli_query($connection, $query_cat); 
                                              echo "<option value='' selected disabled hidden> select: </option>";
                                               while ($row = mysqli_fetch_assoc($result_cat)) {
                                               $cat_edit_id = $row['cat_id'];
                                               $cat_tittle = $row['cat_tittle']; 

                                               echo "<option value='$cat_edit_id'> $cat_tittle </option>";
                                               
                                               } 
                                         ?>   
                                    </select> 
                                    <div style="margin-bottom: 3px;"></div>      
                                    <br>

                                 

                                    <label for="tittle">Author:</label> <br>

                                    <select name="post_author">
                                         <?php    
                                            $query_author = "SELECT * FROM users WHERE user_role = 'Admin' ";
                                             $result_author = mysqli_query($connection, $query_author); 
                                              echo "<option value='anonymus' selected disabled hidden> select: </option>";
                                               while ($row = mysqli_fetch_assoc($result_author)) {
                                               $author_id = $row['user_id'];
                                               $author_username = $row['user_username']; 

                                               echo "<option value='$author_username'> $author_username </option>";
                                               
                                               } 
                                         ?>   
                                    </select> <br>
                                    <!-- <input class="form-control" type="text" name="post_author" placeholder="Author name..."><br> --><br>

                                    <label for="post_status">Post Status:</label><br>
                                    <select name="post_status"><br>
                                        <option value="draft">Select: </option>
                                        <option value="published">Published</option>
                                        <option value="draft">Draft</option>

                                    </select>
                                    <div style="margin-bottom: 3px;"></div>
                                    <br>

                                    <label for="post_image">Post image:</label>
                                    <input class="form-control" type="file" name="image"><br>

                                    <label for="Post_tags">Post Tags:</label>
                                    <input class="form-control" type="text" name="post_tags" placeholder="Tags..."><br>

                                    <label for="post_content">Post Content:</label>
                                    <textarea  class="form-control" id="editor" type="text-area" name="post_content" placeholder="write something..." ></textarea><br>

                                    <input class="btn btn-primary" type="submit" name="create_post" value="Add Post">




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


