                      <form action="" method="POST">
                        <div class="form-group">

                           <?php  //display edit and the form for edit

                              if (isset($_GET['edit'])) {
                             ?>
                             <label for="cat_tittle">Edit Category</label>
                             <?php   
                                                 
                                   $cat_edit_id = $_GET['edit'];
                                   $query = "SELECT * FROM categories WHERE cat_id = $cat_edit_id ";
                                   $edit_categories_admin = mysqli_query($connection, $query);

                                    

                                   while ($row = mysqli_fetch_assoc($edit_categories_admin)) {
                                   $cat_edit_tittle = $row['cat_tittle']; 
                                   $cat_edit_id = $row['cat_id'];  


                             ?>

 <input class="form-control" type="text" name="cat_update_tittle" value=" <?php if(isset($cat_edit_tittle)){ echo $cat_edit_tittle; } ?> "> 
 <br>
 
                            <?php } ?>

                               <input class="btn btn-primary" type="submit" name="update" value="Update">

                           <?php   } ?>

                            
                        </div>

                          
                      </form>




                                    <!-- if button update is pushed -->
                                <?php 
                                    
                                     if (isset($_POST['update'])) {

                                      $cat_update_tittle = $_POST['cat_update_tittle'];

                                      $query_update = "UPDATE categories SET cat_tittle = '{$cat_update_tittle}' WHERE  cat_id = {$cat_edit_id}";

                                      $updated_query = mysqli_query($connection,$query_update);

                                      header("Refresh:0");
                                     }


                                 ?>                      