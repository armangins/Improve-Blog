<?php
if (isset($_GET['published'])) {
    $publish = $_GET['published'];
    $sql = "UPDATE posts SET post_status ='Published' WHERE post_id= '$publish'";
    update($sql);
     header('Location:posts.php');
}
if (isset($_GET['draft'])) {
    $draft = $_GET['draft'];

    $sql = "UPDATE posts SET post_status ='Darft' WHERE post_id= '$draft'";
    update($sql);
    header('Location:posts.php');
}

if(isset($_POST['checkBoxArray'])){
  
  
  foreach($_POST['checkBoxArray'] as $val){

  $bulk_option =$_POST['bulk_option'];

  switch($bulk_option){
    case 'Published';
    $sql = "UPDATE posts SET post_status ='$bulk_option' WHERE post_id ='$val'";
    update($sql);
    header('Location:posts.php');
    break;
    case 'Draft';
    $sql = "UPDATE posts SET post_status ='$bulk_option' WHERE post_id ='$val'";
    update($sql);
    header('Location:posts.php');
    break;
    case 'Delete';
    $sql = "DELETE FROM posts WHERE post_id='$val'";
    delete($sql);
    header('Location:posts.php');
  }

  
  }

}

?>


<form action="" method="POST">
<table class=" table table-bordered  ml-4">
  <div id="bulkOptionContainer" class="col-xs-2 ">
  <select class="form-control" name="bulk_option">
      <option value="">Select Action</option>
      <option value="Published">Publish</option>
      <option value="Draft">Draft</option>
      <option value="Delete">Delete</option>
    </select>
  </div>
  <div class="col-xs-3">
    <input type="submit" id="confirm " class="btn btn-primary ">
    <a class="btn btn-success" href="posts.php?action=add">New Post</a>
  </div>
  <thead class="thead-dark">
    <tr>
 
    <th class="text-center">
    <input type="checkbox" id="selectAll">
  
    </th>
      <th class="text-center">Edit</th>
      <th class="text-center">Author</th>
      <th class="text-center">Title <i class="fas fa-heading"></i></th>

      <th class="text-center">Status</th>
      <th class="text-center">Image</th>
      <th class="text-center">Category</th>
      <th class="text-center">Tags</th>
      <th class="text-center">Comments</th>
      <th class="text-center">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($allposts as $post) : ?>
    <?php
            $id = $post['cat_id'];
            $sql = "SELECT  * FROM categories WHERE cat_id='$id'";
            $res = getrow($sql);
            ?>
    <tr>
      <td class="text-center">  <input type="checkbox" class="selected" name="checkBoxArray[]" value="<?=$post['post_id']?>"></td>
      <td class="text-center " scope="col"> <a href="posts.php?action=edit&pid=<?= $post['post_id'] ?>">
      <i class="fas fa-pencil-alt"></i></a> 
 
    </td> 
      <td class="text-center " scope="col"><?= $post['post_author'] ?></td>
      <td class="text-center " scope="col"><a href="../post.php?pid=<?=$post['post_id']?>"><?= $post['post_title'] ?></a></td>

            </td> 
      <td class="text-center " scope="col"><?= $post['post_status'] ?></td>
      <td style="width:150px; height:auto" scope="col"><img class="img-responsive" width="280px" ; height="auto"
          src="../images/<?= $post['post_image'] ?>" alt=""></td>

      <td class="text-center " scope="col"><?= $res['cat_title'] ?></td>

      <td class="text-center " scope="col"> <?= $post['post_tags'] ?></td>
      <td class="text-center pt-5" scope="col"><?= $post['comment_count'] ?></td>



      <td style="width:40px; height:auto" class="text-center mt-5 pt-5" scope="col">
        <?= date("d.m.y", strtotime($post['post_date'])); ?> </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
</form>