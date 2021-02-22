<?php

include 'template/header.php';


$sql = "SELECT * FROM posts ORDER BY post_date ASC";
$allposts = select($sql);

if (isset($_GET['delete'])) {
    $id =trim(filter_input(INPUT_GET,'delete',FILTER_SANITIZE_STRING));
    $id = mysqli_real_escape_string($connection,$id);
     $sql = "DELETE FROM posts WHERE post_id='$id'";
     delete($sql);
    header('Location:posts.php');
  
}
// getting the categorie we need to update
// $single_post = null;
if (isset($_GET['edit'])) {
    $id = $_GET['pid'];
    $sql = "SELECT * FROM posts WHERE cat_id='$id' ORDER BY post_date ASC";
    $single_cat = getrow($sql);
}
?>

<body>
  <div id="wrapper">
    <!-- Navigation -->
    <?php include "template/nav.php"?>
    <div id="page-wrapper">
      <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-6 ">
            <h1 class="page-header">
              Admin Panel
              <small>Current Posts <i class="fas fa-address-card"></i> </small>
            </h1>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}
switch ($action) {
    case 'add';
        include 'template/posts/add_post.php';
        break;
    case 'edit';
        include 'template/posts/edit_post.php';
        break;
    default:
        include 'template/posts/posts_table.php';
        break;
}
?>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
  </div>
  <!-- /#wrapper -->
  <!-- jQuery -->
  <?php include 'template/footer.php' ?>