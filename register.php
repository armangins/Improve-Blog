<?php include 'template/header.php';
include 'template/nav.php';
include 'template/db_connection.php';
$error ='';
if (isset($_POST['submit'])) {

    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $username = mysqli_real_escape_string($connection, $username);

    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $email = mysqli_real_escape_string($connection, $email);

    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $password = mysqli_real_escape_string($connection, $password);

    $password = password_hash($password,PASSWORD_BCRYPT);

    if(!$username || !$email || !$password){

      $error= ' Please Enter All Fields ';
    } else{

        //$sql = "INSERT INTO users  VALUES('','$username','$email','$password',user_role='subscriber')";
        $sql="INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `email`, `password`, `profile_image`, `user_role`) VALUES (NULL, '$username', '', '', '$email', '$password', 'default.png', 'subscriber')";
     
        insert($sql);
        header('Location:index.php');
    }

}

?>

<div class="container mt-5">
    <section id="login " class="mt-5">
     
            <div class="row ">
                <div class="col-12 ">
                    <div class="form-wrap ">
                    <h1 class="text-center">Register New Account</h1>
                    <h4 class="text-center lead">We never share or store you personal info. </h4>
                        <form class="w-25 mx-auto" role="form"  method="POST" id="login-form" autocomplete="off">
                      <div class="">
                      <div class="form-group">
                               <label for="username"> <i class="fas fa-user-alt"></i> Username:</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            </div>
                             <div class="form-group">
                                <label for="email" ><i class="fas fa-envelope"></i> Email:</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                             <div class="form-group">
                                <label for="password" ><i class="fas fa-lock"></i> Password:</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            </div>
                    
                      <div class="row ">
                     <div class="col-12">
                     <input type="submit" name="submit" id="btn-login" class="btn btn-success" value="Register">
                       <button class="btn btn-danger"><a class="text-white" style="text-decoration: none" href="index.php">Cancel</a></button>
                     </div>
                      </div>
                            
                                                        <?php if($error): ?>
                            <span class="text-danger"><?= $error ?> <i class="fas fa-exclamation-triangle"></i></span>
                            <?php endif ?>
                      </div>
                        </form>
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->

    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
            <hr>
<?php include 'template/footer.php'?>