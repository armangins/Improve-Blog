<?php include 'template/header.php';

include 'template/nav.php';
include 'template/db_connection.php';

if (!$_SESSION['user_id']) {
    header('Location:profile.php');
}

$id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_id ='$id'";
$data = getrow($sql);

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

    $role = $_POST['role'];

    if (!$role) {
        $role = $_SESSION['role'];
    }

    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if (!$password) $password = $data['password'];

    if (!$image_name) $image_name = $data['profile_image'];

    $sql = "UPDATE users SET
         username='$username',first_name='$first_name',last_name='$last_name',email='$email',password='$password',profile_image='$image_name',user_role='$role' WHERE user_id='$id'";
    update($sql);

    $_SESSION['user_id'] = $id;
    $_SESSION['username'] = $username;
    $_SESSION['profile_image'] = $image_name;

    move_uploaded_file($image_tmp, "images/users/$image_name");

    header('Location:profile.php');
}

?>

<div class="container">
    <!-- title -->
    <div class="row">
        <h1 class="text-center">Welcome <small><?= $data['username'] ?></small></h1>
    </div>
    <!-- title end -->

    <!-- main row -->
    <div class="row mt-5">
        <!-- main column -->
        <div class="col-lg-6 col-xs-12 mt-5">

            <!-- form -->
            <form action="" method="POST" enctype="multipart/form-data">
                <!-- username -->
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username </label>
                    <input class="form-control" type="text" name="username" id="username"
                        value="<?= $data['username'] ?>">
                </div>
                <!-- username end -->

                <!-- Fname -->
                <div class="form-group">
                    <label for="first_name"><i class="far fa-id-card"></i> first Name </label>
                    <input class="form-control" type="text" name="first_name" id="first_name"
                        value="<?= $data['first_name'] ?>">
                </div>
                <!-- Fname end -->

                <!-- Lname -->
                <div class="form-group">
                    <label for="last_name"><i class="far fa-id-card"></i> Last Name </label>
                    <input class="form-control" type="text" name="last_name" id="last_name"
                        value="<?= $data['last_name'] ?>">
                </div>
                <!-- Lname end -->

                <!-- email -->
                <div class="form-group">
                    <label for="email"><i class="fas fa-at"></i> Email </label>
                    <input class="form-control" type="text" name="email" value="<?= $data['email'] ?>">
                </div>
                <!-- email end -->

                <!-- Pass -->
                <div class="form-group">
                    <label for="password"><i class="fas fa-unlock"></i> Password </label>
                    <input class="form-control" type="text" name="password" id="password">
                </div>
                <!-- Pass end -->

                <!-- if user is admin can set user accesess -->
                <?php if ($data['user_role'] == 'admin') : ?>
                <div class="form-group">
                    <label for="password"><i class="fas fa-unlock"></i> User Accesess</label>
                    <select class="form-control" name="role" id="role">
                        <option value="admin">Choose Accesess</option>
                        <option value="admin">Admin</option>
                        <option value="subscriber">Subscriber</option>
                    </select>
                </div>
                <?php endif ?>
                <!-- if user is admin can set user accesess end -->

                <!-- buttons -->
                <div class="row ">
                    <div class="form-group text-center mx-auto mt-5">
                        <button name="submit" class="btn btn-success">Save</button>
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                    </div>
                </div>

        </div>
        <!-- main column end -->

        <!-- image col -->
        <div class="col-lg-5 col-xs-12 mt-3">
            <h2>Profile Image</h2>
            <hr>
            <img src="images/users/<?= $data['profile_image'] ?>" alt="profile image" class="img-thumbnail">

            <div class="form-group">
                <small>*Dont like that profile image ?</small><br>

                <input class="form-control mt-3" type="file" name="image" id="image">
            </div>
        </div>
        <!-- image col -->
        
        </form>
<!-- form end -->

    </div>
     <!-- main row end -->
</div>
<!-- contianer end -->