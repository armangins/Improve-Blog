<?php
include 'template/header.php';
include 'template/db_connection.php';
include 'template/nav.php';

$sql = "SELECT * FROM posts ORDER BY post_date ASC";
$allposts = select($sql);
$published = array();
foreach ($allposts as $publish) {
  if ($publish['post_status'] == 'Published') {
    $published[] = $publish;
  }
}
?>



<!-- Page Content -->
<div class="container">

  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-lg-8">
      <h1 class="page-header">
        Top Posts <i class="fas fa-poll-h"></i>
        <small>Top Article</small>
      </h1>
      <!-- No Posts -->
      <?php if (!$published) : ?>
        <div class="row">
          <div class="col-12">
            <h1>No Post Yet</h1>
          </div>
        </div>
      <?php endif ?>
      <!-- No Posts -->
      <!-- First Blog Post -->
      <?php foreach ($published as $post) : ?>
        <h2>
          <a style="text-decoration: none; color:black;" class="text-black" href="post.php?pid=<?= $post['post_id'] ?>"><?= $post['post_title'] ?></a>
        </h2>
        <p class="lead">
          By <?= $post['post_author'] ?>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $post['post_date'] ?></p>
        <hr>
        <img class="img-responsive" src="images/<?= $post['post_image'] ?> " alt="">
        <hr>
        <p><?= substr($post['post_content'], 0, 100) ?></p>
        <a class="btn btn-secondary " href="post.php?pid=<?= $post['post_id'] ?>"><span class="lead">Read More</span> ...</a>
        <hr>
      <?php endforeach ?>
    </div>
    <div class="col-lg-4 mt-5">
      <?php include 'template/sidebar.php' ?>
    </div>
    <!-- Blog Sidebar Widgets Column -->
  </div>
  <!-- /.row -->
  <div class="row">
  </div>
  <hr>
  <?php include 'template/footer.php' ?>