<?php
if (isset($_GET['aprove'])) {
    $aprove = $_GET['aprove'];

    $sql = "UPDATE users SET user_status ='Aproved' WHERE user_id= '$aprove'";
    update($sql);
    header('Location:users.php');
}
if (isset($_GET['unaprove'])) {
    $unaprove = $_GET['unaprove'];

    $sql = "UPDATE users SET user_status ='Unproved' WHERE user_id= '$unaprove'";
    update($sql);
    header('Location:users.php');
}


?>






<table class=" table table-bordered ">
  <thead class="thead-dark text-center">
    <tr>
      <th class="text-center">Edit/Delete</th>
      <th class="text-center">Username</th>
      <th class="text-center">First Name</th>
      <th class="text-center">Last Name</th>
      <th class="text-center">Profile Image</th>
      <th class="text-center">Email</th>
      <th class="text-center">Accsese</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($allusers as $user) : ?>

    <tr>
      <td class="text-center " scope="col"> 
      <a href="users.php?action=edit&&uid=<?= $user['user_id'] ?>">
      <i " class="fas fa-pencil-alt"></i></a>
        <a href="users.php?delete=<?= $user['user_id'] ?>"><i style="color:red;"
            class="far fa-trash-alt"></i></a> 
          </td>
      <td class="text-center"><?= ucfirst($user['username']) ?></td>
      <td class="text-center"><?= ucfirst($user['first_name']) ?></td>
      <td class="text-center"><?= ucfirst($user['last_name']) ?></td>
      <td class="text-center"><img style="width:55px; height:auto;" src="../images/users/<?=$user['profile_image']?>" alt="">
      </td>


      <td class="text-center"><?= ucfirst($user['email']) ?></td>
      <td class="text-center"><?= ucfirst($user['user_role']) ?></td>




    </tr>
    <?php endforeach ?>
  </tbody>
</table>