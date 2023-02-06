<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="POST">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                   </form> <!-- /.Search form -->
                </div>


                 <!-- Login -->
                <div class="well">

                      <?php 

                            if (isset($_SESSION['username'])) { ?>

                             <h4>Logged in as <?php echo $_SESSION['username']; ?></h4>

                             <a class="btn btn-warning" href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                             
                           
                      <?php }

                            else{ ?>


                            <h4>Log In</h4>
                            <form action="includes/login.php" method="POST">
                            <div class="form-group">
                                <input placeholder="Enter Username..." name="username" type="text" class="form-control">
                            </div>
                            <div class="input-group">
                                <input placeholder="Enter Password..." name="password" type="password" class="form-control"><span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" name="login_btn" value="login"><span> Login </span> </button>
                               </span>

                            </div>
                             

                            <!-- /.input-group -->
                           </form> <!-- /.Search form -->



                     <?php  } ?>

                </div>



                 <!-- /.Code for side cat -->
              <?php 

                 $query = "SELECT * FROM categories ";
                 $select_categories_sidebar = mysqli_query($connection, $query);

               ?>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <ul class="list-unstyled">

                               <?php  
                                   while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                                   $cat_tittle = $row['cat_tittle']; 
                                   $cat_id = $row['cat_id'];
                                   ?>


                                 <li><a href="category.php?category=<?php echo $cat_id; ?>"><?php echo $cat_tittle ;  ?></a> </li>

                                <?php  } ?>
                                
                            </ul>
                        </div>


                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php"; ?>

            </div>