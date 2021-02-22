<?php 
include "db_connection.php";
include "../admin/template/functions.php";

session_start();

if($_SESSION['user_id']){

    header('location:index.php');
}

if(isset($_POST['submit'])){


   $username = trim(filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING));
   $username = mysqli_real_escape_string($connection,$username);

   $password = trim(filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING));
   $password = mysqli_real_escape_string($connection,$password);

  
 
   $sql = "SELECT * FROM users WHERE username='$username'";
   $user =getrow($sql);

 
   $uid= $user['user_id'];
   $uname = $user['username'];
   $name= $user['first_name'];
   $pimage= $user['profile_image'];
   $role = $user['user_role'];
   $email = $user['email'];
   $upassword = $user['password'];
   $uimage = $user['profile_image'];
 
   

   if(!$username || !$password){
    header('Location:../index.php?err=empty');
   } elseif(!$username == $uname && !password_verify($password,$upassword)){
    header('Location:../index.php?err=false');


   }else{
    $_SESSION['user_id']= $uid;
    $_SESSION['username']= $uname;
    $_SESSION['image']= $pimage;
    $_SESSION['email']= $email;
    $_SESSION['role']= $role;
    $_SESSION['profile_image']= $uimage;

    if($role == 'Admin'){
        header('Location:../admin/index.php');
    }else header('Location:../index.php');
  
   }
}
