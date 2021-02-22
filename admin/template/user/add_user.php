<?php
$error = ['username' => '', 'first_name' => '', 'last_name' => '', 'email' => '', 'password' => ''];
if (isset($_POST['submit'])) {

    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $username = mysqli_real_escape_string($connection, $username);

    $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
    $first_name = mysqli_real_escape_string($connection, $first_name);

    $last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING));
    $last_name = mysqli_real_escape_string($connection, $last_name);

    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $email = mysqli_real_escape_string($connection, $email);

    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $password = mysqli_real_escape_string($connection, $password);

    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $role = $_POST['role'];

    if(!$image_name) $image_name='default.png';

    if (!$username && strlen($username) < 2) {
        $error['username'] = "User Name Most Be More Than 2 chars";
    } elseif (!$first_name && strlen($first_name) < 2) {
        $error['first_name'] = 'First Name Must Be More Than Charss';
    } elseif (!$password && strlen($password) < 8 || strlen($password) > 32) {
        $error['password'] = 'Password Must Containt 8-32 Chars';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'Please Enter A Valid Email';
    } elseif (!$last_name && strlen($last_name) < 2) {
        $error['last_name'] = 'Last Name Most Be More That 2 Chars';
    } else {
        $password = password_hash($password, PASSWORD_BCRYPT);
        move_uploaded_file($image_tmp, "../images/users/$image_name");
        $sql = "INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `email`, `password`, `profile_image`, `user_role`) VALUES (NULL, '$username', '$first_name', '$last_name', '$email', '$password', '$image_name', '$role')";
        insert($sql);
   
       header('location:users.php');

    }

    //  header('Location:users.php');
}

?>
<div class="row">
  <div class="col-8">
  <form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <i class="fas fa-user"></i>
    <label for="username">Username:</label>
    <input name="username" type="text" class="form-control" id="title" placeholder="Enter user name">
    <?php if ($error['username']): ?>
    <div class="text-danger" role="alert">
      <?=$error['username']?>
    </div>
    <?php endif?>
  </div>
  <div class="form-group">
    <i class="fas fa-address-card"></i>
    <label for="first_name">First Name:</label>

    <input name="first_name" type="text" class="form-control" id="first_name" placeholder="First name">
    <?php if ($error['first_name']): ?>
    <div class="text-danger mt-2" role="alert">
      <?=$error['first_name']?>
    </div>
    <?php endif?>
  </div>
  <div class="form-group">
    <i class="far fa-address-card"></i>
    <label for="last_name">Last Name:</label>
    <input name="last_name" type="text" class="form-control" id="last_name">
    <?php if ($error['last_name']): ?>
    <div class="text-danger" role="alert">
      <?=$error['last_name']?>
    </div>
    <?php endif?>
  </div>
  <div class="form-group">
    <i class="fas fa-at"></i>
    <label for="email">Email Adress:</label>
    <input name="email" type="text" class="form-control" id="email">
    <?php if ($error['email']): ?>
    <div class="text-danger" role="alert">
      <?=$error['email']?>
    </div>
    <?php endif?>
  </div>
  <div class="form-group">
    <i class="fas fa-lock"></i>
    <label for="password">Password:</label>
    <input name="password" type="password" class="form-control" id="password">
    <?php if ($error['password']): ?>
    <div class="text-danger" role="alert">
      <?=$error['password']?> <i class="fas fa-exclamation"></i>
    </div>
    <?php endif?>
  </div>
  <i class="fas fa-portrait"></i>
  <label for="">Profile Image</label>
  <div class="row">
    <div class="col-6">
      <div class="custom-file mt-3">
        <label name="file" class="custom-file-label" for="profile" aria-describedby="inputGroupFileAddon02">Choose
          Profile
          Picture</label>
        <input name="image" type="file" class="custom-file-input" id="image">
      </div>
    </div>
  </div>

  <div class="md-form mt-5">
    <i class="fas fa-key"></i>
    <label for="content">Accses:</label>
    <div class="row">
      <div class="col-4">
        <div class="form-group">
          <select class="form-control" name="role" id="role">
            <option value="subscriber" selected='selected'>Subscriber</option>
            <option value="admin">Admin</option>
          </select>
        </div>
      </div>
    </div>


  </div>
  <div class="mt-5 text-center"> <button name="submit" value="Upload" type="submit" class="btn btn-success">Add New User</button>
  <button name="submit" type="submit" class="btn btn-danger"><a style=" text-decoration: none;"
                        class="text-white" href="users.php">Cancel</a></button>
</div>

</form>
  </div>
</div>
