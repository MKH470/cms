<?php
include("inc/hearder.php");
include("inc/aside.php");
$msg='';
$id=$_SESSION['id'];
$get_user=mysqli_query($conn,"SELECT  username, useremail, avatar, role FROM registrars WHERE user_id ='$id' ");
$sql=mysqli_fetch_assoc($get_user);
$posts=mysqli_query($conn,"SELECT * FROM posts");
$post=mysqli_num_rows($posts);
$members=mysqli_query($conn,"SELECT * FROM registrars");
$member=mysqli_num_rows($members);
$comment=mysqli_query($conn,"SELECT * FROM comments");
$comment=mysqli_num_rows($comment);
?>
<article class="col-lg-9">
  <div class="col-lg-12">
    <div class="row">
      <ol class="breadcrumb" style="margin-bottom: 5px;">
        <li><a href="../index.php">home</a></li>
        <li>control panel</li>
      </ol>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="row">
      <div class="col-md-3">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>welcome!</strong> <?php echo ucwords($sql['username']);?></div>
          <div class="panel-body">
            <div class="text-center">
              <img src="../<?php echo $sql['avatar'];?>" width="50%"  style="max-width: 150px;" />
              <hr/>
            </div>
            <div class="text-left">
              <p><strong>Email:</strong> <?php echo ' '.$sql['useremail'];?></p>
              <p><strong>Role:</strong><?php echo ' '.$sql['role'];?></p>
              <p class="text-right"><a href="edite_user.php?user=<?php echo $id ;?>" type="button" class="btn btn-warning btn-xs" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit data</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-info">
          <div class="panel-heading"><strong>The articles</strong></div>
          <div class="panel-body">
            <div class="col-md-8">
              <i class="fa fa-list-alt fa-5x" aria-hidden="true" style="color:#1596d6; margin-top:60px; margin-bottom: 60px; margin-left: 10px;"></i>
            </div>
            <div class="col-md-4">
              <p style="font-size:200%; margin-top:70px; margin-bottom: 80px; margin-left: -20px;"><strong><?php echo $post; ?></strong></p>
            </div>
          </div>
          <div class="panel-footer text-center"><i class="fa fa-eye" aria-hidden="true"></i> <a href="posts.php"> <strong>preview</strong></a></div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-danger">
          <div class="panel-heading"><strong>The members</strong></div>
          <div class="panel-body">
            <div class="col-md-8">
              <i class="fa fa-users fa-5x" aria-hidden="true" style="color: #c34848; margin-top:60px; margin-bottom: 60px; margin-left: 10px;"></i>
            </div>
            <div class="col-md-4">
              <p style="font-size:200%; margin-top:70px; margin-bottom: 80px; margin-left: -20px;"><strong><?php echo $member; ?></strong></p>
            </div>
          </div>
          <div class="panel-footer text-center"><i class="fa fa-eye" aria-hidden="true"></i> <a href="users.php"> <strong>preview</strong></a></div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-success">
          <div class="panel-heading"><strong>The comments</strong></div>
          <div class="panel-body">
            <div class="col-md-8">
              <i class="fa fa-comments fa-5x" aria-hidden="true" style="color:#0d920f; margin-top:60px; margin-bottom: 60px; margin-left: 10px;"></i>
            </div>
            <div class="col-md-4">
              <p style="font-size:200%; margin-top:70px; margin-bottom: 80px; margin-left: -20px;"><strong><?php echo $comment?></strong></p>
            </div>
          </div>
          <div class="panel-footer text-center"><i class="fa fa-eye" aria-hidden="true"></i> <a href="comments.php"> <strong>preview</strong></a></div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="panel panel-info">
          <?php echo $msg;?>
          <div class="panel-heading" style="text-align: center; font-size:200%;"><b>The new articles</b></div>
          <div class="panel-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Preview</th>
                  <th>Author</th>
                  <th>Publication's Date</th>
                  <th>Status edite</th>
                  <th>Addit</th>
                  <th>Delet</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $select= "SELECT * from posts INNER JOIN registrars ON posts.author =registrars.user_id ORDER BY post_id DESC LIMIT 5";
                $sql= mysqli_query($conn ,$select );
                $num =1;
                while ( $posts = mysqli_fetch_assoc($sql)) {
                echo '<tr>
                  <td>'.$num.'</td>
                  <td><img src="../'.($posts['image'] == '' ?'images/no-img.jpg': $posts['image']) .'" width=75px class="img-rounded" /></td>
                  <td>'.substr($posts['title'], 0,40).'...</td>
                  <td><a href="../post.php?id='.$posts['post_id'].'"  class="btn btn-primary btn-sm">preview</a></td>
                  <td>'.$posts['username'].'</td>
                  <td>'.$posts['post_date'].'</td>
                  
                  <td>'.($posts['status']=='disabled'?'<a href="posts.php?status=published&post='.$posts['post_id'].'"  class="btn btn-success btn-sm">published</a>':'<a href="posts.php?status=disabled&post='.$posts['post_id'].'"class="btn btn-info btn-sm">disabled!</a>').'</td>
                  <td><a href="edite-post.php?post='.$posts['post_id'].'"  class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edite</a></td>
                  <td><a class="btn btn-danger btn-sm" href="posts.php?delete='.$posts['post_id'].'">
                  <i class="fa fa-trash-o fa-lg"></i> Delete</a></td>
                </tr>' ;
                $num++;
                }
                ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="panel panel-info">
    <div style="text-align: center;">
    <?php echo $msg;?>
  </div>
    <div class="panel-heading" style="text-align: center; font-size: 200%;"><b>The new members </b></div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>user image</th>
            <th>user name</th>
            <th>user email</th>
            <th>gender</th>
            <th>user profile</th>
            <th>Eddit</th>
            <th>Delet</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $select= "SELECT * from registrars ORDER BY user_id DESC LIMIT 5";
          $sql= mysqli_query($conn ,$select );
          $num =1;
          while ( $posts = mysqli_fetch_assoc($sql)) {
          echo '<tr>
            <td>'.$num.'</td>
            <td>'.$posts['username'].'</td>
            <td><img src="../'.$posts['avatar'].'" width=50px class="img-rounded" /></td>
            <td>'.$posts['useremail'].'</td>
            <td>'.$posts['gender'].'</td>
            <td><a href="../profile.php?id='.$posts['user_id'].'"  class="btn btn-primary btn-sm" target="_blank">profile</a></td>
            <td><a href="edite_user.php?user='.$posts['user_id'].'"  class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edite</a></td>
            <td><a class="btn btn-danger btn-sm" href="users.php?delete='.$posts['user_id'].'">
            <i class="fa fa-trash-o fa-lg"></i> Delete</a></td>
          </tr>' ;
          $num++;
          }
          ?>
          
        </tbody>
      </table>
    </div>
  </div>
      </div>
    </div>
  </div>
  
</article>
<?php
include("inc/footer.php");
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->