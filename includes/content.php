



            <div class="col-md-8">

                <?php 
                   $cnt = 0;
                   $post_on_page = 5;

                   if (isset($_GET['page'])) {
                            $pageSelected = escape($_GET['page']);
                           }else{
                            $pageSelected = 1;
                           }

                   if ($pageSelected == 1 && $pageSelected == "" ) {
                        $page1 = 0;

                   } else{

                        $page1 = ($pageSelected * $post_on_page) - $post_on_page;   

                   }   

                       

                   

                   $post_count_query = "SELECT * FROM posts";
                   $find_post_count = mysqli_query($connection,$post_count_query);

                   $post_count_num = mysqli_num_rows($find_post_count);

                   $page_count = ceil($post_count_num / $post_on_page);

                   $query = "SELECT * FROM posts  ORDER BY post_id DESC LIMIT {$page1} , $post_on_page";
                   $select_all_post_query = mysqli_query($connection, $query);


                    ?>            
                    <h1 class="page-header">
                    Homepage
                    <small>Page <?php echo $pageSelected;  ?></small>
                    </h1>
                    <?php

          while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                     
                     $post_id  = $row['post_id'];
                     $post_tittle  = $row['post_tittle'];
                     $post_author  = $row['post_author'];
                     $post_date    = $row['post_date'];
                     $post_image   = $row['post_image'];
                     $post_content = substr($row['post_content'], 0,100)." ..." ;
                     $post_status   = $row['post_status'];
                  
                  
                  if (isset($_SESSION['username'])) {  
                    ?> 
                     
                     <?php include "post_content_code.php"?> <!-- actual post code -->

                    <?php $cnt++;

                    }


                  else if ($post_status == 'published') { ?>
 
                     <?php include "post_content_code.php"?> <!-- actual post code -->
  
                 <?php  $cnt++;

                   }  

          } 
          
              if ($cnt == 0) {
                         echo "<h1 class='text-center'>No Posts to Show!</h1>";
                     }

              ?>

            </div>

            