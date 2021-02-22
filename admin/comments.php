<?php

include 'template/header.php';

$sql = "SELECT * FROM comments";
$allcomments = select($sql);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql= "DELETE FROM comments WHERE comment_id='$id'";
     delete($sql);
     header('Location:comments.php');
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
          <div class="col-lg-6 ">
            <h1 class="page-header">
              Admin Panel
              <small>Current Posts <i class="fas fa-address-card"></i> </small>
            </h1>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-10 col-sm-12">
            <?php
                        if (isset($_GET['action'])) {
                            $action = $_GET['action'];
                        } else {
                            $action = '';
                        }
                        switch ($action) {
                            case 'add';
                                include 'template/add_post.php';
                                break;
                            case 'edit';
                                include 'template/edit_post.php';
                                break;
                            default:
                                include 'template/comments_table.php';
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
  <?php include 'template/footer.php' ?>