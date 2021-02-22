<?php

include 'template/header.php';

$sql = "SELECT * FROM users";
$allusers = select($sql);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql= "DELETE FROM users WHERE user_id='$id'";
     delete($sql);
     header('Location:users.php');
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
                                include 'template/user/add_user.php';
                                break;
                            case 'edit';
                                include 'template/user/edit_user.php';
                                break;
                            default:
                                include 'template/user/users_table.php';
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