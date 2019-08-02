<aside class="col-lg-3">
	<div class="list-group">
  <a href="#" class="list-group-item disabled">
   Quick Access List
  </a>
  <?php
  if($_SESSION['role'] =='admin'){
    ?>
  
  <a href="index.php" class="list-group-item list-group-item-success"><i class="fa fa-tachometer" aria-hidden="true"></i>  Dashboard</a>
  <a href="setting.php" class="list-group-item list-group-item-warning"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
  <a href="category.php" class="list-group-item list-group-item-info"><i class="fa fa-list" aria-hidden="true"></i> Category</a>
  <a href="new_post.php" class="list-group-item list-group-item-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add new articLe</a>
  <a href="posts.php" class="list-group-item list-group-item-success"><i class="fa fa-files-o" aria-hidden="true"></i> articles</a>
  <a href="users.php" class="list-group-item list-group-item-warning"><i class="fa fa-users" aria-hidden="true"></i> Members</a>
  <!------whith approval---href="comments.php"----------whith out approval use---href="comments1.php"-and edit -in -else
  then go to fonction.php and edit the action from the form- THEN go to post.php and edit SELECET -->
  <a href="comments.php" class="list-group-item list-group-item-info"><i class="fa fa-comments-o" aria-hidden="true"></i> Comments</a>
  
  <a href="profile.php" class="list-group-item list-group-item-success"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
  <?php
 }else{
  ?>

   <a href="index.php" class="list-group-item list-group-item-success"><i class="fa fa-tachometer" aria-hidden="true"></i>  Dashboard</a>
  
  <a href="category.php" class="list-group-item list-group-item-info"><i class="fa fa-list" aria-hidden="true"></i> Category</a>
  <a href="new_post.php" class="list-group-item list-group-item-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add new articLe</a>
  <a href="posts.php" class="list-group-item list-group-item-success"><i class="fa fa-files-o" aria-hidden="true"></i> articles</a>
<!------whith approval---href="comments.php"----------whith out approval use---href="comments1.php"---
  then go to fonction.php and edit the action from the form--->

  <a href="comments.php" class="list-group-item list-group-item-info"><i class="fa fa-comments-o" aria-hidden="true"></i> Comments</a>
  
  <a href="profile.php" class="list-group-item list-group-item-success"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
  <?php
 }
  ?>
</div>


</aside>