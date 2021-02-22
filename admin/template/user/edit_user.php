<?php

if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $sql = "SELECT * FROM users WHERE user_id = '$uid'";
    $user = getrow($sql);
}


if (isset($_POST['submit'])) {

    $uid = $_GET['uid'];

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


    if(!$image_name){
        $image_name = $user['profile_image'];
    }
        move_uploaded_file($image_tmp, "../images/users/$image_name");

        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE users SET
         username='$username',first_name='$first_name',last_name='$last_name',email='$email',password='$password',profile_image='$image_name',user_role='$role' WHERE user_id='$uid'";


        update($sql);

        header('location:users.php');
    }


?>


<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <h2>Edit User</h2>
                <label for="title">Username</label>
                <input name="username" type="text" class="form-control" id="title" value="<?= $user['username'] ?>">

            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input name="first_name" type="text" class="form-control" id="first_name"
                    value="<?= $user['first_name'] ?>">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input name="last_name" type="text" class="form-control" id="last_name"
                    value="<?= $user['last_name'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email Adress</label>
                <input name="email" type="text" class="form-control" id="email" value="<?= $user['email'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password"
                    value="<?= $user['password'] ?>">
            </div>

            <div class="form-group">
                <label for="<?= $user['cat_id'] ?>">Accesss</label>
                <select name="role" class="form-control" name="category" id="">
                <option value="<?=$user['user_role']?>"><?=$user['user_role']?></option>
                    <option value="Admin">Admin</option>
                    <option value="subscriber">Subscriber</option>

                </select>
            </div>

            <div class="mt-5 mx-auto text-center">
                <button name="submit" type="submit" class="btn btn-success">Update</button>
                <button name="submit" type="submit" class="btn btn-danger"><a style=" text-decoration: none;"
                        class="text-white" href="users.php">Cancel</a></button>
            </div>

        </div>
        <div class="col-4 mt-5">
            <div class="mt-5">
                <h3>Curent Image</h3>
                <img width="250px" src="../images/users/<?= $user['profile_image'] ?>" alt="">
            </div>
            <div class="custom-file mt-3">
                <label name="file" class="custom-file-label" for="inputGroupFile02"
                    aria-describedby="inputGroupFileAddon02">New Image</label>
                <input name="image" type="file" class="custom-file-input" id="inputGroupFile02"
                    value="<?= $user['user_image'] ?>">

            </div>

        </div>
    </div>


</form>