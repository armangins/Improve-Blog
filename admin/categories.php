<?php

include 'template/header.php';

// getting categories to display in table
$sql = "SELECT * FROM categories";
$allcats = select($sql);

// form validation to add category
$error = '';
if (isset($_POST['submit'])) {
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $title = mysqli_real_escape_string($connection, $title);
    $desc = trim(filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING));
    $desc = mysqli_real_escape_string($connection, $desc);
    if (!$title || strlen($title) < 2) {
        $error = '* Title Is Required';
    } elseif (!$desc || strlen($desc) < 2) {
        $error = '* Description Is Required ';
    } else {
         echo $sql;
        $sql = "INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES (NULL, '$title', '$desc')";
        insert($sql);
         header('Location:categories.php');
    }
}

// delete categorie
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM categories WHERE cat_id='$id'";
    delete($sql);
    header('Location:categories.php');
}

// getting the categorie we need to update
$single_cat = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM categories WHERE cat_id='$id'";
    $single_cat = getrow($sql);
}

// updating the categories
if (isset($_POST['update'])) {
    $id = $_GET['edit'];
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $title = mysqli_real_escape_string($connection, $title);
    $desc = trim(filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING));
    $desc = mysqli_real_escape_string($connection, $desc);
    $sql = "UPDATE categories SET cat_title ='$title',cat_desc='$desc' WHERE cat_id= '$id'";
   
    update($sql);
    header('Location:categories.php');
}
?>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "template/nav.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin panel
                            <small>Edit your website </small>
                        </h1>
                        <div class="row">
                            <div class="col-xs-4">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="cat-title">Add Category</label>
                                        <input value="<?php if (isset($_GET['edit'])) : ?> <?= $single_cat['cat_title'] ?><?php endif ?>" class="form-control" type="text" placeholder="Title" name="title">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Description</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc" placeholder="text" placeholder=""><?php if (isset($_GET['edit'])) : ?> <?= $single_cat['cat_desc'] ?><?php endif ?></textarea>
                                        </div>
                                    </div>
                                    <?php if (isset($_GET['edit'])) : ?>
                                        <input class="btn btn-primary" type="submit" name="update" value="Update">
                                    <?php else : ?>
                                        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                    <?php endif ?>
                                    <?php if ($error) : ?>
                                        <span class="danger text-danger">
                                            <?= $error ?>
                                        </span>
                                    <?php endif ?>
                                </form>
                            </div>
                            <div class="col-xs-7">
                                <table class="table table-borderless table-light">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Delete</th>
                                            <th>Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($allcats as $category) : ?>
                                            <tr>
                                                <th scope="col"><?= $category['cat_id'] ?></td>
                                                <td scope="col"><?= $category['cat_title'] ?></td>
                                                <td scope="col"><?= $category['cat_desc'] ?></td>
                                                <td><a href="categories.php?delete=<?= $category['cat_id'] ?>"><i class="fas fa-trash text-danger"></i></a></td>
                                                <td><a href="categories.php?edit=<?= $category['cat_id'] ?>"><i class="fas fa-pen text-dark"></i></a></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <?php include 'template/footer.php' ?>