<?php
include 'template/header.php';
include 'template/db_connection.php';
include 'template/nav.php';

if (isset($_POST['submit'])) {
    $name = $_SESSION['username'];
    $comment = trim(filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING));
    $comment = mysqli_real_escape_string($connection, $comment);
    $pid = $_GET['pid'];
//    $sql = "INSERT INTO comments VALUES('','$pid','$name','$comment',"+now()+"",'Aproved')";
    
    $sql="INSERT INTO `comments` (`comment_id`, `c_post_id`, `comment_author`, `comment_content`, `date`, `comment_status`) VALUES (NULL, '$pid', '$name', '$comment', '".date('Y-m-d H:i:s')."', 'Aproved');";
    insert($sql);
    echo date('Y-m-d H:i:s');
    $sql = "UPDATE posts SET comment_count= comment_count +1 WHERE post_id ='$pid'";
    update($sql);
}

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $pid = mysqli_real_escape_string($connection, $pid);
} else {
    $pid = '';
}
$sql = "SELECT * FROM posts WHERE post_id='$pid'";
$allposts = select($sql);

$sql = "SELECT * FROM comments WHERE c_post_id ='$pid' AND comment_status ='Aproved' ORDER BY comment_id ASC";
$comments = select($sql);
?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-lg-8">
            <h1 class="page-header">
                Self improvment
                <small>Get new knowledge</small>
            </h1>
            <!-- First Blog Post -->
            <?php foreach ($allposts as $post): ?>
            <h2>
                <a href="#"><?=$post['post_title']?></a>
            </h2>
            <p class="lead">
                By <a href="index.php"><?=$post['post_author']?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?=$post['post_date']?></p>
            <hr>
            <img class="img-responsive" src="images/<?=$post['post_image']?> " alt="">
            <hr>
            <p><?=$post['post_content']?></p>

            <hr>
            <?php endforeach?>
        </div>
        <div class="col-lg-4">
            <?php include 'template/sidebar.php'?>
        </div>
        <!-- Blog Sidebar Widgets Column -->
    </div>
    <!-- /.row -->
    <!-- Blog Comments -->
    <!-- Comments Form -->
    <?php if(isset($_SESSION['user_id'])): ?>
    <div class="row">
        <div class="col-md-8">
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" method="POST">
                    <div class="form-group">
                        <textarea name="comment" class="form-control" rows="3"></textarea>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary">Comment</button>
                </form>
            </div>
        </div>
    </div>
    <?php endif ?>
    <small>Sign in To Leave a comment</small>
    <?php foreach ($comments as $comment): ?>
    <div class="row p-5">
        <div class="col-md-8">
            <div class="media">
                <a class="pull-left" href="#">
                    <?php 
                    $user = $comment['comment_author'];
                    $sql ="SELECT * FROM users WHERE username= '$user'";
                    $row=getrow($sql);
                    ?>
                    <img style="width:50px; hight:auto;" class="media-object"
                        src="images/users/<?=$row['profile_image']?>" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?=$comment['comment_author']?>
                  
                        
                    </h4>
                    <?=$comment['comment_content']?>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php endforeach?>
</div>
<?php include 'template/footer.php'?>