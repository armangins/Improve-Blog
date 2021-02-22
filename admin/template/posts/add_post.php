<?php
$sql = "SELECT * FROM categories";
$cats=select($sql);
$sql_s = "SELECT post_status FROM posts";



if (isset($_POST['submit'])) {

    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category = $_POST['category'];
    $post_status = $_POST['status'];
    $post_tags = $_POST['tags'];
    $content = $_POST['content'];
    $content =mysqli_real_escape_string($connection,$content);
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
  
    $comment_count = '';

    move_uploaded_file($image_tmp, "../images/$image");
  
    $sql = "INSERT INTO `posts`
    (`post_id`, `cat_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `comment_count`, `post_status`)
    VALUES (NULL, '$post_category', '$post_title', '$post_author', '".date('Y-m-d H:i:s')."', '$image', '$content', '$post_tags', '0', '$post_status')";
     
    insert($sql);
  
    // mysqli_query($connection, $sql);
    header('Location:posts.php');
}

?>
<form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Title:</label>
    <input name="title" type="text" class="form-control" id="title" placeholder="Enter Post Title">
  </div>
  <div class="form-group">
    <label for="author">Author:</label>
    <input name="author" type="text" class="form-control" id="author" placeholder="Author's Name">
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
      <label for="status">Post Status:(Draft/Publish)</label>
    <select class="form-control" name="status" id="">
      <option value="">Choose Status</option>
      <option value="Published">Publish</option>
      <option value="Draft">Draft</option>
    </select>

      </div>
    </div>
    
  </div>
  <div class="form-group">
    <label for="tags">Post Tags:</label>
    <input name="tags" type="text" class="form-control" id="tags">
  </div>
  <div class="row">
    <div class="col-3">
    <div class="custom-file mt-3">
    <label name="file" class="custom-file-label" for="image" aria-describedby="inputGroupFileAddon02">Choose
      file</label>
    <input name="image" type="file" class="custom-file-input" id="image">
  </div>
    </div>
  </div>
  
  <div class="md-form mt-5">
    <i class="fas fa-pencil-alt prefix"></i>
    <label for="content">Content:</label>
    <div id="summernote">
      <textarea class="form-control"  name="content" id="" cols="30" rows="10"></textarea>
    </div>
  </div>
  <div class="mt-5 text-center"> <button name="submit" value="Upload" type="submit" class="btn btn-success">Add Post</button>
  <button name="submit" type="submit" class="btn btn-danger"><a style=" text-decoration: none;"
                        class="text-white" href="posts.php">Cancel</a></button>
</div>
</form>
