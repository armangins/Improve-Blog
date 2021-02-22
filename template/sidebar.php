<?php
$sql = "SELECT * FROM categories";
$categories = select($sql);
$error = '';

if (isset($_GET['err'])) {
    $err = $_GET['err'];
    switch ($err) {
        case 'empty';
            $error = 'Please Enter All Fields';
            break;
        case 'false';
            $error = 'Wrong Username Or Password <i class="far fa-frown"></i> ';
            break;
        default:
            $error = 'Really ? ';
            break;
    }
}
?>




<!-- <div class="col-xs-12"> -->
    <?php if (!isset($_SESSION['user_id'])): ?>

        <!-- Blog Search Well -->
        <div class="well  mt-5 ">
            <h4>Login here !</h4>
            <!-- row for the form -->
            <div class="row">
                <div class="col-md-12">
                    <!-- form -->
                    <form action="template/login.php" method="POST">

                    <!-- username input -->
                        <div class="form-group">
                        <label for="username"><i class="fas fa-user ml-1"></i> Username</label>
                            <input name="username" type="text" class="form-control w-75" id="username" placeholder="Enter Username">
                        </div>

                        <!-- password input -->
                        <div class="form-group ">
                        <label for=password"><i class="fas fa-lock ml-1"></i> Password </label>
                            <input name="password" type="password" class="form-control w-75" placeholder="Enter Password">
                        </div>

                        <!-- login btn -->
                        <button name="submit" class="btn btn-success" type="submit" value="login">
                                    login <i class="fa fa-angle-double-right ml-1"></i>
                        </button>
                         <!-- login btn end-->

<!-- check if errors -->
                        <?php if ($error): ?>
                            <span class="text-danger mt-3">
                                <?=$error?>
                            </span>
                        <?php endif?>
<!-- check if errors end -->
                    </form>
                    <!-- form end -->
                </div>
            </div>
               <!-- row for the form end -->
        </div>
        <!-- well end -->
    <?php elseif (isset($_SESSION['user_id'])): ?>

    <?php endif?>
    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-xs-12">
                <ul class="list-unstyled">
                    <?php foreach ($categories as $category): ?>
                        <li><a href="category.php?cid=<?=$category['cat_id']?>"><?=$category['cat_title']?></a>
                        </li>
                    <?php endforeach?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- Side Widget Well -->
    <?php include 'widget.php'?>
<!-- </div> -->