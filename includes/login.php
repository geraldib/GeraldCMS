<?php include "db.php"  ?>
<?php session_start(); ?>
<?php include "functions.php"  ?>


<?php 

if (isset($_POST['login_btn'])) {

	$username = escape($_POST['username']);
	$password = escape($_POST['password']);

$query = "SELECT * FROM users WHERE user_username = '$username' ";

$select_user_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($select_user_query)) {
	
     $db_user_id = $row['user_id'];
     $db_user_username = $row['user_username'];
     $db_user_password = $row['user_password'];
     $db_user_firstname = $row['user_first_name'];
     $db_user_lastname = $row['user_last_name'];
     $db_user_role = $row['user_role'];


}  


if ( password_verify($password, $db_user_password) ) {

  $_SESSION['username'] = $db_user_username; 
  $_SESSION['firstname'] = $db_user_firstname;
  $_SESSION['lastname'] = $db_user_lastname;
  $_SESSION['user_role'] = $db_user_role;
	
  header("Location: ../admin/index.php");
   
}
else{

	header("Location: ../index.php");
}


}



 ?>