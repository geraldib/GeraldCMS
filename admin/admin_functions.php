<?php



function escape($string){
global $connection;  
return  mysqli_real_escape_string($connection,trim($string));   
}

function users_online(){
   global $connection;

       $session = session_id();
       $time = time();
       $time_out_in_sec = 30;
       $time_out = $time - $time_out_in_sec;

       $query = "SELECT * FROM users_online WHERE session = '{$session}' ";
       $send_query = mysqli_query($connection, $query);

       $count = mysqli_num_rows($send_query);

         if ($count == NULL) {

             mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES ('{$session}','{$time}')");

         }else{

             mysqli_query($connection, "UPDATE users_online SET time = '{$time}' WHERE session = '{$session}' ");

         }

       $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '{$time_out}' ");
       return $count_user = mysqli_num_rows($users_online_query);



}


function check_Query($result){
  global $connection;
  
  if (!$result) {
    echo "query fail".mysqli_error($connection);
   // var_dump($query);
     
  }
}


 function addCatDropdown($post_Category){
  global $connection;

  //add default value
   $query = "SELECT * FROM categories WHERE cat_id = $post_Category";
   $default_category = mysqli_query($connection, $query);
  
   while ($row = mysqli_fetch_assoc($default_category)) {
   $cat_default_tittle = $row['cat_tittle']; 
   $cat_default_id = $row['cat_id'];
   echo "<option value='$cat_default_id'> $cat_default_tittle </option>";
   }

   $query = "SELECT * FROM categories ";
   $result = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($result)) {
       $cat_edit_id = $row['cat_id'];
       $cat_tittle = $row['cat_tittle']; 
        
        if ($cat_edit_id != $post_Category) {
          echo "<option value='$cat_edit_id' > $cat_tittle </option>";
        }
       
       
   }

 }




//=================Category===================Category====================Category======================Category===================
//add category

function insertCategory(){

	global $connection;

	if (isset($_POST['submit'])) {
	  
	    $cat_tittle = $_POST['cat_tittle'];

	    if ($cat_tittle == "" || empty($cat_tittle)) {
	        echo "Can't leave empty";
	    }else{

	        $query_add_cat = "INSERT INTO categories(cat_tittle) ";
	        $query_add_cat .= " VALUES('$cat_tittle')";

	        $create_cat_query = mysqli_query($connection, $query_add_cat);

	        if (!$create_cat_query) {
	            echo "<h1>Query Failed</h1>";
	        }

	    }
	    
	}

}


function showAllCategories(){

	global $connection;

   $query = "SELECT * FROM categories ";
   $select_categories_admin = mysqli_query($connection, $query);
     

   while ($row = mysqli_fetch_assoc($select_categories_admin)) {
   $cat_tittle = $row['cat_tittle']; 
   $cat_id = $row['cat_id'];
   
   

    echo "<tr>";
    echo "<td>$cat_id</td>";
    echo "<td>$cat_tittle</td>";
    echo "<td><a href='categories.php?delete=$cat_id'>DELETE</td>";
    echo "<td><a href='categories.php?edit=$cat_id'>Edit</td>";
    echo "</tr>";
    
   } 

}




function deleteCategory(){
  global $connection;

 if (isset($_GET['delete'])) {
     
       $cat_delete_id = $_GET['delete'];

       $query = "DELETE FROM categories WHERE cat_id = $cat_delete_id";

       $delete_query = mysqli_query($connection,$query);
       if (!$delete_query) {

          die("Query Failed");

       }else{
        header("Location: categories.php"); 
       }

  }


}


//=====POST=====================POST===========================POST===================POST=================POST======================

function showAllPosts(){
  global $connection;

  $query = "SELECT * FROM posts ORDER BY post_id DESC";
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
  $post_views = $row['post_views_count'];

  echo "<tr>";
  echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='$post_Id'></td>";
  echo "<td>{$post_Id}</td>";
  echo "<td>{$post_Author}</td>";
  echo "<td>{$post_Tittle}</td>";

  //shwoing all categories =======================================

   $query_categorie = "SELECT * FROM categories WHERE cat_id = $post_Category";
   $select_categorie_admin = mysqli_query($connection, $query_categorie);
     

   while ($row = mysqli_fetch_assoc($select_categorie_admin)) {
   $cat_tittle = $row['cat_tittle']; 
   $cat_id = $row['cat_id'];

//========category section ends here =============================
  echo "<td>{$cat_tittle}</td>";
}
  echo "<td>{$post_Status}</td>";
  echo "<td><img width='100' src='images/{$post_Image}' alt'image'></td>";
  echo "<td>{$post_Content}</td>";
  echo "<td>{$post_Tags}</td>";
  echo "<td>{$post_Comments}</td>";
  echo "<td><a href='posts.php?reset_views={$post_Id}'>{$post_views}</td></a>";
  echo "<td>{$post_Date}</td>";
  echo "<td><a href='../post.php?p_id={$post_Id} '>View</a></td>";
  echo "<td><a href='posts.php?edit_Posts={$post_Id} '>Edit</a></td>";


  echo "<td><a rel='$post_Id' href='#' class='delete_link'>DELETE</a></td>";
  // echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?') \"  href='posts.php?delete_post={$post_Id}'>DELETE</a></td>";
  echo "</tr>";

  }


    
}




function addNewPost(){
  global $connection;

    if (isset($_POST['create_post'])) {
                
          
          $post_Category = escape($_POST['post_category_id']);
          $post_Tittle = escape($_POST['post_tittle']);
          $post_Author = escape($_POST['post_author']) ;
          $post_Date = escape(date('d-m-y'));

          $post_Image = escape($_FILES['image']['name']);
          $post_Image_temp = escape($_FILES['image']['tmp_name']);


          $post_Content = escape($_POST['post_content']);

          $post_Status = escape($_POST['post_status']);

          $post_Tags = escape($_POST['post_tags']);
          $post_Comments = escape(0);

          move_uploaded_file($post_Image_temp, "images/$post_Image");


          $posted_query = "INSERT INTO posts (post_category_id,
          post_tittle,
          post_author,
          post_date,
          post_image,
          post_content,
          post_tags,
          post_comment_count,
          post_status) ";

          $posted_query .= " VALUES ('{$post_Category}',
          '{$post_Tittle}',
          '{$post_Author}',
            now(),
          '{$post_Image}',
          '{$post_Content}',
          '{$post_Tags}',
          '{$post_Comments}',
          '{$post_Status}') ";


                   $create_post_query = mysqli_query($connection, $posted_query);

                  check_Query($create_post_query);
                  //var_dump($posted_query);
                  
                  $post_created_id = mysqli_insert_id($connection);
                  echo "<a href='../post.php?p_id=$post_created_id'><h5>View Post</h5></a>";

                  echo "Post Added "."<a href='posts.php'>View All Posts</a>";



 } 

}


function deletePost($delete_id){

  global $connection;



$query = " DELETE FROM posts WHERE post_id = $delete_id ";

 $result = mysqli_query($connection, $query);
 check_Query($result);
 header("Refresh:0; url=posts.php");

 }


function resetViews($reset_id){

 global $connection;

 $query = " UPDATE posts SET post_views_count = 0 WHERE post_id = $reset_id ";

 $result = mysqli_query($connection, $query);
 check_Query($result);
 header("Refresh:0; url=posts.php");

} 




  function postDropdownSelection($edit_post_id){
  global $connection;

      //add default value
     $query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
     $default_post_status = mysqli_query($connection, $query);
    
     while ($row = mysqli_fetch_assoc($default_post_status)) {
     $post_default_status = $row['post_status']; 
     $post_default_id = $row['post_id'];
     echo "<option value='$post_default_status'> $post_default_status </option>";
     }


        //check for alternatives: 
     if ($post_default_status ==='published') {
       echo "<option value='draft'>draft</option>";
     }else{
       echo "<option value='published'>published</option>";
     }
          
          


 }



//======COMMENTS=======================COMMENTS===========================COMMENTS===========================COMMENTS================

 function showAllComments(){
  global $connection;

  $query = "SELECT * FROM comments ";
  $select_Comments_Admin = mysqli_query($connection, $query);


  while ($row = mysqli_fetch_assoc($select_Comments_Admin)) {
  $comment_id = $row['comment_id']; 
  $comment_post_id = $row['comment_post_id'];
  $comment_author = $row['comment_author'];
  $comment_email = $row['comment_email'];
  $comment_content = $row['comment_content'];
  $comment_status = $row['comment_status'];
  $comment_date = $row['comment_date'];


  echo "<tr>";
  echo "<td>{$comment_id}</td>";
  echo "<td>{$comment_author}</td>";
  echo "<td>{$comment_content}</td>";
  echo "<td>{$comment_email}</td>";
  echo "<td>{$comment_status}</td>";

//comment link to post========
  $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
  $post_to_comments = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($post_to_comments)) {
    $comment_post_tittle = $row['post_tittle'];
    $comment_post_id = $row['post_id'];

  echo "<td><a href='../post.php?p_id=$comment_post_id'>{$comment_post_tittle}</a></td>";

  } //ends here===========
  echo "<td>{$comment_date}</td>";

  echo "<td><a href='comments.php?approve_comment={$comment_id} '>Approve</a></td>";
  echo "<td><a href='comments.php?disapprove_comment={$comment_id}'>Disapprove</a></td>";
  echo "<td><a href='comments.php?delete_comment={$comment_id}'>DELETE</a></td>";
  echo "</tr>";

  }


    
}

function deleteComment($delete_id){

  global $connection;

 $query = " DELETE FROM comments WHERE comment_id = $delete_id ";
 $result = mysqli_query($connection, $query);
 check_Query($result);
 header("Refresh:0; url=comments.php");


 }


 function disapproveComment($unapproved_id){

  global $connection;

 $query = " UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $unapproved_id ";
 $result = mysqli_query($connection, $query);
 check_Query($result);
 header("Refresh:0; url=comments.php");

 }

  function approveComment($approved_id){

  global $connection;

 $query = " UPDATE comments SET comment_status = 'approved' WHERE comment_id = $approved_id ";
 $result = mysqli_query($connection, $query);
 check_Query($result);
 header("Refresh:0; url=comments.php");

 }





//=======USER====================USER===================USER==================USER======================USER========USER================


 function showAllUsers(){
  global $connection;

  $query = "SELECT * FROM users ";
  $select_All_users = mysqli_query($connection, $query);


  while ($row = mysqli_fetch_assoc($select_All_users)) {
  $user_id = $row['user_id']; 
  $user_username = $row['user_username'];
  $user_password = $row['user_password'];
  $user_first_name = $row['user_first_name'];
  $user_last_name = $row['user_last_name'];
  $user_email = $row['user_email'];
  $user_image = $row['user_image'];
  $user_role = $row['user_role'];
  //$user_rand_salt = $row['user_rand_salt'];
  

  echo "<tr>";
  echo "<td>{$user_id}</td>";
  echo "<td>{$user_username}</td>";
  echo "<td>{$user_password}</td>";
  echo "<td>{$user_first_name}</td>";
  echo "<td>{$user_last_name}</td>";
  echo "<td>{$user_email}</td>";
  echo "<td><img width='100' src='images/$user_image' alt'image'></td>"; 
  echo "<td>{$user_role}</td>";

  echo "<td><a href='users.php?make_subscriber=$user_id'>Make Subscriber</a></td>";
  echo "<td><a href='users.php?make_admin=$user_id'>Make Admin</a></td>";
  echo "<td><a href='users.php?edit_User=$user_id'>EDIT</a></td>";
  echo "<td><a href='users.php?delete_User=$user_id'>DELETE</a></td>";
//  echo "<td>{$user_rand_salt}</td>";
  echo "</tr>";

  }


    
}




function addNewUSer(){
  global $connection;

    if (isset($_POST['create_user'])) {
                
          
          $user_firstname = $_POST['user_firstname'];
          $user_lastname = $_POST['user_lastname'];
          $user_role = $_POST['user_role'];
          $user_username = $_POST['user_username'];
          $user_email = $_POST['user_email'];
          $user_password = $_POST['user_password'];

          // $post_Image = $_FILES['image']['name'];
          // $post_Image_temp = $_FILES['image']['tmp_name'];
          //move_uploaded_file($post_Image_temp, "images/$post_Image");

          //the code for random salt=========
           // $query = "SELECT user_rand_salt FROM users";
           // $select_randSalt = mysqli_query($connection, $query);
           // $row = mysqli_fetch_assoc($select_randSalt);
           // $salt = $row['user_rand_salt'];

           // $hashed_password = crypt($user_password,$salt);
          //the end code for random salt========

          $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10) );

          $query = "INSERT INTO users (
          user_first_name,
          user_last_name,
          user_role,
          user_username,
          user_email,
          user_password )";

          $query .= " VALUES (
          '{$user_firstname}',
          '{$user_lastname}',
          '{$user_role}',
          '{$user_username}',
          '{$user_email}',
          '{$hashed_password}' )";


                   $added_user_query = mysqli_query($connection, $query);
                     
                     if (!$added_user_query) {
                      var_dump($query);
                     }

                   echo "User Created "."<a href='users.php'>View Users</a>";  

 } 


}


function deleteUser($deleted_id){

 global $connection;

 $query = " DELETE FROM users WHERE user_id = $deleted_id ";
 $result = mysqli_query($connection, $query);
 check_Query($result);
 
 if (!$result) {
  var_dump($query);
 }else{
  header("Refresh:0; url=users.php");
 }
 

}



function makeSubscriber($sub_id){

 global $connection;

 $query = " UPDATE users SET user_role = 'Subscriber' WHERE user_id = $sub_id  ";
 $result = mysqli_query($connection, $query);
 check_Query($result);
 
 if (!$result) {
  var_dump($query);
 }else{
  header("Refresh:0; url=users.php");
 }
 

}


function makeAdmin($adm_id){

 global $connection;

 $query = " UPDATE users SET user_role = 'Admin' WHERE user_id = $adm_id  ";
 $result = mysqli_query($connection, $query);
 check_Query($result);
 
 if (!$result) {
  var_dump($query);
 }else{
  header("Refresh:0; url=users.php");
 }
 

}



?>








