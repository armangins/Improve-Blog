<?php
include 'template/header.php';
include 'template/db_connection.php';
include 'template/nav.php';

if (isset($_POST['submit'])) {
    $allposts = array();
    $search = trim(filter_input(INPUT_POST,'search',FILTER_SANITIZE_STRING));
    $search = mysqli_real_escape_string($connection,$search);
    $sql = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
    $search_query = select($sql);
    if (!$search_query) {
        $message = 'No results found';
    } else {
        $sql = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
        $allposts = select($sql);
    }
}
?>


<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">
                No Posts
                <small>Sorry Cannot find posts</small>
            </h1>
            <?php if (!$allposts) : ?>
            <h1>No results found</h1>
            <?php endif ?>
            <!-- First Blog Post -->
            <?php foreach ($allposts as $post) : ?>
            <h2>
                <a href="post.php?pid=<?=$post['post_id']?>"><?= $post['post_title'] ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?= $post['post_author'] ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $post['post_date'] ?></p>
            <hr>
            <img class="img-responsive" src="images/<?= $post['post_image'] ?> " alt="">
            <hr>
            <p><?= $post['post_content'] ?></p>
            <a class="btn btn-primary" href="post.php?pid=<?=$post['post_id']?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
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