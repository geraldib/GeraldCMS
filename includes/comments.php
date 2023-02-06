                
                <hr>

       
                <?php 


                if (isset($_POST['create_comment'])) {

                    $post_Page_id = $_GET['p_id'];

                    $comment_author = escape($_POST['comment_author']);
                    $comment_email = escape($_POST['comment_email']);
                    $comment_content = escape($_POST['comment_content']);


                            if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content) ) {
                               
                            $query = "INSERT INTO comments (
                            comment_post_id,
                            comment_author,
                            comment_email,
                            comment_content,
                            comment_status,
                            comment_date) 
                             VALUES (
                            $post_Page_id,
                            '$comment_author',
                            '$comment_email',
                            '$comment_content',
                            'unapproved' ,
                            now())" ;

                          $create_comment_query = mysqli_query($connection, $query);

                          if (!$create_comment_query) {
                              var_dump($query);
                          }

                          //change comment number in post view page:

                          $query_comment_count = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $post_Page_id";
                          $update_comment_count = mysqli_query($connection, $query_comment_count);  


                        }

                        else{
                            echo "<script>alert('You should fill all fields')</script>";
                        }



                    }

                 ?>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="POST" role="form">

                        <label for="comment_author">Name  :</label>
                        <div class="form-group"> 
                            <input class="form-control" type="text" name="comment_author" placeholder="write name..">
                        </div>

                        <label for="comment_email">E-mail :</label>
                        <div class="form-group">
                            <input class="form-control" type="email" name="comment_email" placeholder="write email..">
                        </div>
                          
                        <label for="comment_author">Your Comment  :</label>  
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment_content" placeholder="write comment..."></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <?php  
                $query = "SELECT * FROM comments WHERE comment_post_id = $post_Page_id ";
                $query .= " AND comment_status = 'approved' ";
                $query .= " ORDER BY comment_id DESC";

                $select_comments_post = mysqli_query($connection, $query);

                if (!$query) {
                    die("Query Failed");
                }
                while ($row = mysqli_fetch_assoc($select_comments_post)) {
                    $comment_date = $row['comment_author'];
                    $comment_content = $row['comment_content'];
                    $comment_author = $row['comment_email'];
                    $comment_id = $row['comment_id']
                ?>

                   
                <div class="media" style="margin-bottom: 100px;">




                    <a class="pull-left" href="#">

                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;?>
                            <small><?php echo $comment_date;?></small>
                        </h4>
                        <?php echo $comment_content;?>
                        
                             <?php 
                                    if (isset($_SESSION['username'])) {
                                       if (isset($_GET['p_id'])) {
                                          $post_edit = $_GET['p_id'];

                                          echo "<a href='admin/comments.php?delete_comment=$comment_id'><h5>DELETE</h5></a>";
                                       }
                                    }

                             ?>

                    </div>
                </div>

                <?php } ?>






     

