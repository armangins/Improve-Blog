<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->

  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>


  </div>

  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    <li class="dropdown">
      <a href="../index.php"><i class="fa fa-user"></i> Back To Site</a>

    </li>

    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $_SESSION['username'] ?> <b
          class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="../profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
        </li>

       
        <li class="divider"></li>
        <li>
          <a href="../template/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
      <li>
        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
      </li>

      <li>
        <a href="javascript:;" data-toggle="collapse" data-target="#posts_drop"><i class="far fa-newspaper"></i> Posts</a>
        <ul id="posts_drop" class="collapse">
          <li>
            <a href="posts.php">All posts <i class="far fa-newspaper"></i></a>
          </li>
          <li>
            <a href="posts.php?action=add">Add posts <i class="fas fa-plus"></i></a>
          </li>
        </ul>
      </li>
      <li>
        <a href="categories.php"><i class="fas fa-stream"></i> Categories </a>
      </li>

      <li class="active">
        <a href="comments.php"><i class="fas fa-comments"></i> Comments</a>
      </li>
      <li>
        <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fas fa-users"></i> Users</a>
        <ul id="users" class="collapse">
          <li>
            <a href="users.php"> <i class="fas fa-users"></i> All Users</a>
          </li>
          <li>
            <a href="users.php?action=add"> <i class="fas fa-user-plus"></i> New User</a>
          </li>
        </ul>
      </li>
     
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>