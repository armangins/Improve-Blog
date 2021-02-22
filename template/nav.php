
<nav style="background-color:#10536c !important" class="navbar navbar-expand-lg navbar-light bg-dark  sticky-top">
  <a class="navbar-brand text-white mt-2" href="index.php">I'm-Prove <i class="fas fa-child"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse in navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active text-white">
        <a class="nav-link text-white" href="index.php">Home <i class="fas fa-home"></i> <span class="sr-only">(current)</span></a>
      </li>
      <?php if(!isset($_SESSION['user_id'])): ?>
      <li class="nav-item active text-white">
        <a class="nav-link text-white" href="register.php">Register <i class="fas fa-user-plus"></i> <span class="sr-only">(current)</span></a>
      </li>
<?php endif ?>
    </ul>
 
    <!-- <div class="input-group">
    <span class="input-group-btn">
  
            <button name="submit" class="btn btn-default" type="submit">
                 <input name="search" type="text" class="form-control " placeholder="Search In Blog"><
            </button>
        </span>
    </div> -->
    
<ul class="navbar-nav">
<?php if(isset($_SESSION['user_id']) && $_SESSION['role']=='admin'): ?>
                            <li>    <a class="nav-link text-white"  href="admin/index.php">Admin Panel <i class="fas fa-users-cog"></i></a></li>
                        
                            <?php endif ?>
  <?php if(isset($_SESSION['user_id'])): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php if(isset($_SESSION['username'])): ?>
        <?=$_SESSION['username']?>
        <?php endif ?>
       
        <?php if(isset($_SESSION['profile_image'])): ?>
          <img style="width:20px;" src="images/users/<?=$_SESSION['profile_image']?>" class="rounded float-left" alt="profile_image">
          <?php endif ?>
        </a> 
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profile.php">Profile <i class="far fa-user"></i></a>
          <a class="dropdown-item" href="template/logout.php">Log Out <i class="fas fa-door-open"></i></a>
          <div class="dropdown-divider"></div>
       
        </div>
        
      </li>
    <?php endif ?>
</ul>
  
    <form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
      <input name="search" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="search">
      <button type="submit" name="submit" class="btn btn-outline-light my-2 my-sm-0" ><i class="fas fa-search"></i></button>
    </form>
  </div>
</nav>
