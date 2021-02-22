<?php
if (isset($_GET['aprove'])) {
    $aprove = $_GET['aprove'];

    $sql = "UPDATE comments SET comment_status ='Aproved' WHERE comment_id= '$aprove'";
    update($sql);
    header('Location:comments.php');
}
if (isset($_GET['unaprove'])) {
    $unaprove = $_GET['unaprove'];

    $sql = "UPDATE comments SET comment_status ='Unproved' WHERE comment_id= '$unaprove'";
    update($sql);
    header('Location:comments.php');
}


?>






<table class=" table table-bordered ">
    <thead class="thead-dark text-center">
        <tr>
            <th class="text-center">Delete</th>
            <th class="text-center">Author</th>
            <th class="text-center">comment</th>
           
            <th class="text-center">Status</th>
            <th class="text-center">In Response To</th>
            <th class="text-center">Approve/Unaprove</th>
            <th class="text-center">Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allcomments as $comment) : ?>
        <?php

            $comment_post_id = $comment['c_post_id'];
            $sql = "SELECT * FROM posts WHERE post_id= '$comment_post_id' ";
            $comments_post = getrow($sql);
            ?>
        <tr>
            <td class="text-center " scope="col"> <a href="comments.php?delete=<?= $comment['comment_id'] ?>"><i
                        style="color:red;" class="far fa-trash-alt"></i></a> </td>
            <td><?= $comment['comment_author'] ?></td>
            <td><?= $comment['comment_content'] ?></td>
         
            <td><?= $comment['comment_status'] ?>
                <?php if($comment['comment_status']=='Aproved'):?>
                <i class="fas fa-check text-success"></i>
                <?php else: ?>
                <i class="fas fa-times text-danger"></i>
                <?php endif ?>
            </td>
            <td class="text-center"><a class=""
                    href="../post.php?pid=<?= $comments_post['post_id'] ?>"><?= $comments_post['post_title'] ?></a>
            </td>
            <td class="text-center "><a class="text-success" href="comments.php?aprove=<?= $comment['comment_id'] ?>">
                    <i class="fas fa-check"></i></a> |
                <a class="text-danger" href="comments.php?unaprove=<?= $comment['comment_id'] ?>">
                    <i class="fas fa-times"></i></a>
            </td>
            <td class="text-center " scope="col">
                <?= date("m.d.y", strtotime($comment['date'])); ?> </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>