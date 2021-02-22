<?php

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $sql = "SELECT * FROM posts WHERE post_id = '$pid'";
    $post = getrow($sql);
 

}
$sql = "SELECT * FROM categories";
$cats = select($sql);

if (isset($_POST['submit'])) {
    $post_title = $_POST['title'];
    $post_title = mysqli_real_escape_string($connection,$post_title);
    $post_author = $_POST['author'];
    $post_category = $_POST['category'];
    $post_status = $_POST['status'];
    $post_tags = $_POST['tags'];
    $content = $_POST['content'];
    $content = mysqli_real_escape_string($connection,$content);
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $date = date('d-m-y');
    $comment_count = 4;
    if (empty($image)) {
        $image = $post['post_image'];
    }
    if (empty($post_category)) {
        $post_category = $post['cat_id'];
    }
    move_uploaded_file($image_tmp, "../images/$image");
    $sql = "UPDATE posts SET cat_id=' $post_category',
    post_title=' $post_title',
    post_author='$post_author',
    post_date='$date',
    post_image='$image',
    post_content='$content',
    post_tags='$post_tags',
    comment_count='$comment_count',
    post_status='$post_status'
     WHERE post_id ='$pid'";
 update($sql);
  
     header('location:posts.php');
}

?>


<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <h2>Edit Posts Here</h2>
                <label for="title">Post Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Enter Post Title"
                    value="<?=$post['post_title']?>">

            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input name="author" type="text" class="form-control" id="author" placeholder="Author's Name"
                    value="<?=$post['post_author']?>">
            </div>
            <div class="form-group">
    <div class="row">
      <div class="col-3">
      <label for="category">Categoires:</label>
    <select name="category" class="form-control name=" category" id="category">
      <option class="form-control" value="">Choose A Category</option>
      <?php foreach($cats as $cat): ?>
      <option name="category" class="form-control" value="<?=$cat['cat_id']?>"><?=$cat['cat_title']?></option>
      <?php endforeach ?>
    </select>
      </div>
    </div>
   
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-3">
      <label for="status">Post Status:</label>
    <select class="form-control" name="status" id="">
      <option value="<?=$post['post_status']?>">Choose Status</option>
      <option value="Published">Publish</option>
      <option value="Draft">Draft</option>
    </select>

      </div>
    </div>
    
  </div>
            <div class="form-group">
                <label for="tags">Post Tags</label>
                <input name="tags" type="text" class="form-control" id="tags" value="<?=$post['post_tags']?>">
            </div>
            <!--Material textarea-->


            <!--Material textarea-->


            <div class="md-form mt-5">
                <i class="fas fa-pencil-alt prefix"></i>
                <label for="content">Content</label>
                <textarea style="min-width: 100%; height:250px" name="content" id="content"
                    class="md-textarea form-control" rows="3"><?=$post['post_content']?></textarea>
            </div>



            <div class="mt-5 text-center"> <button name="submit" type="submit" class="btn btn-success">Update</button>
            <button name="submit" type="submit" class="btn btn-danger"><a style=" text-decoration: none;"
                        class="text-white" href="posts.php">Cancel</a></button>
        </div>
        </div>
        <div class="col-4 mt-5">
            <div class="mt-5">
                <h3>Curent Image</h3>
                <img width="250px" src="../images/<?=$post['post_image']?>" alt="">
            </div>
            <div class="custom-file mt-3">
                <label name="file" class="custom-file-label" for="inputGroupFile02"
                    aria-describedby="inputGroupFileAddon02">New Image</label>
                <input name="image" type="file" class="custom-file-input" id="inputGroupFile02"
                    value="<?=$post['post_image']?>">

            </div>

        </div>
    </div>


</form>