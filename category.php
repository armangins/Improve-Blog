<?php
include 'template/header.php';
include 'template/db_connection.php';
include 'template/nav.php';

if (isset($_GET['cid'])) {
    $cid = trim(filter_input(INPUT_GET,'cid',FILTER_SANITIZE_STRING));
    $cid = mysqli_real_escape_string($connection, $cid);
} else {
    $cid = '';
}
$sql = "SELECT * FROM posts WHERE cat_id='$cid'";
$allposts = select($sql);
?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>
            <!-- First Blog Post -->
            <?php foreach ($allposts as $post) : ?>
                <h2>
                    <a href="post.php?pid=<?= $post['post_id'] ?>"><?= $post['post_title'] ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?= $post['post_author'] ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $post['post_date'] ?></p>
                <hr>
                <img class="img-responsive" src="images/<?= $post['post_image'] ?> " alt="">
                <hr>
                <p><?= substr($post['post_content'], 0, 100) ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
            <?php endforeach ?>
        </div>
        <div class="col-md-4">
        <?php include 'template/sidebar.php' ?>
        </div>
        <!-- Blog Sidebar Widgets Column -->
 
    </div>
    <!-- /.row -->
    <hr>
    <?php include 'template/footer.php' ?>