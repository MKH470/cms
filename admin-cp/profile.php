<?php

include("inc/hearder.php");
include("inc/aside.php");
$id=$_SESSION['id'];
$getuser=mysqli_query($conn ,"SELECT * FROM registrars WHERE user_id ='$id'");
$user=mysqli_fetch_object($getuser);
$msg='';
if(isset($_GET['status']) AND isset($_GET['post'] )){
$get=$_GET['status'];
$post=$_GET['post'];
$sql=mysqli_query($conn ,"UPDATE posts SET   status='$get' WHERE post_id= '$post'");
   $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> edit status successfully.</div>';
echo '<meta http-equiv="refresh" content="1 ; profile.php" />';
}
if(isset($_GET['delete'])){
$del=$_GET['delete'];
$sql=mysqli_query($conn ,"DELETE FROM posts  WHERE post_id= '$del'");
if(isset($sql)){
$msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> The article deleted successfully.</div>';
echo '<meta http-equiv="refresh" content="1 ; profile.php" />';
}
}
?>
          

  <article class="col-lg-9">
    <div class="col-md-10">
      <div class="row">
          <ol class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="index.php">home</a></li>
           
              <li>profile</li>
          </ol>
        </div>
    </div>
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="row">
           <div class="panel panel-info">
            <div class="col-sm-12" style="text-align: center;"><?php echo $msg; ?></div>
          <div class="panel-heading" style="text-align: center; font-size:200%;" ><strong>The personal data</strong></div>
            <div class="panel-body">
                <div class="col-md-6">
                  
                  <p style="font-size:150%; "><strong><span style="color:#2f5a77;"> Username:</span> </strong> <?php echo $user->username ; ?></p><br/>
                  <p style="font-size:150%; "><strong><span style="color:#2f5a77;">Email:</span></strong> </strong><?php echo $user->useremail; ?></p><br/>
                  <p style="font-size:150%; "><strong><span style="color:#2f5a77;">Gender:</span></strong> <?php echo $user->gender ; ?></p><br/>
                  <p style="font-size:150%; "><strong><span style="color:#2f5a77;">Role:</span></strong> <?php echo $user->role ; ?></p><br/>
                  <p style="font-size:150%; "><strong><span style="color:#2f5a77;">Registor date:</span></strong> <?php echo $user->reg_date ; ?></p><br/>
                  <br/>
                  
                  <br/>
                     





                  <div class="col-md-12"><p style="font-size:200%; color:#2f5a77;"><strong>your profile:</strong></p>
                  <p><?php echo $user->useercomment ; ?></p></div>
                  
                  <br/>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                  <img src="../<?php echo $user->avatar;?>" width="100%"  class="img-thumbnail"/>
                  <br/>
                  <br/>
                  
                    
                </div>
                <div class="col-md-12">
                  <hr/>
                   <p style="float: left; ">
                    <a href="<?php echo $user->linkedin ; ?>"   target="_blank" style="margin: 0px 20px;
                      color:hsl(201, 100%, 35%);" >  <i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
                    <a href="<?php echo $user->github ; ?>"  target="_blank" style="margin: 0px 20px;
                      color:#24292e;">  <i class="fa fa-github-square fa-3x" aria-hidden="true"></i></a>
                    <a href="<?php echo $user->facebook ; ?>"  target="_blank" style="margin: 0px 20px;
                      color:#3d5b99;">  <i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                  </p>
                  <a href="edite_user.php?user=<?php echo $user->user_id; ?>" class="btn btn-danger pull-right btn-lg active ">Edit profile data</a>
                </div>
            </div>
      </div>

        </div>
        
      </div>
      <div class="col-md-1"></div>
       <div class="col-md-10">
        <div class="row">
           <div class="panel panel-info">
          <div class="panel-heading" style="text-align: center; font-size: 30px;" ><strong>The last posts</strong></div>
            <div class="panel-body">
                <table class="table table-hover" style="background: #ffffff" >
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Title</th>
            <th>Preview</th>
            <th>Publication's Date</th>
            <th>Status edite</th>
            <th>Addit</th>
            <th>Delet</th>
          </tr>
        </thead>
        <tbody>
          <?php
          
          $select= "SELECT * from posts WHERE author ='$id' ORDER BY post_id DESC LIMIT 5";
          $sql= mysqli_query($conn ,$select );
          $num =1;
          while ( $posts = mysqli_fetch_assoc($sql)) {
          echo '<tr>
            <td>'.$num.'</td>
            <td><img src="../'.($posts['image'] == '' ?'images/no-img.jpg': $posts['image']) .'" width=75px class="img-rounded" /></td>
            <td>'.substr($posts['title'], 0,40).'...</td>
            <td><a href="../post.php?id='.$posts['post_id'].'"  class="btn btn-primary btn-sm">preview</a></td>
            
            <td>'.$posts['post_date'].'</td>
            
            <td>'.($posts['status']=='disabled'?'<a href="profile.php?status=published&post='.$posts['post_id'].'"  class="btn btn-success btn-sm">published</a>':'<a href="profile.php?status=disabled&post='.$posts['post_id'].'"class="btn btn-info btn-sm">disabled!</a>').'</td>
            <td><a href="edite-post.php?post='.$posts['post_id'].'"  class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edite</a></td>
            <td><a class="btn btn-danger btn-sm" href="profile.php?delete='.$posts['post_id'].'">
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
        
    
           