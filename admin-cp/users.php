<?php
include("inc/hearder.php");
include("inc/aside.php");
$msg='';
if($_SESSION['role'] != 'admin'){
  header("location:index.php");
}
if(isset($_GET['delete'])){
  $del=$_GET['delete'];
  $sql=mysqli_query($conn ,"DELETE FROM registrars  WHERE user_id= '$del'");
  if(isset($sql)){
    $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> The usre deleted successfully.</div>';
    echo '<meta http-equiv="refresh" content="2 ; users.php" />';
  }
}

?>

<article class="col-lg-9">
  <div class="col-lg-12">
    <div class="row">
      <ol class="breadcrumb" style="margin-bottom: 5px;">
        <li><a href="index.php">home</a></li>
        <li>registrars</li>
      </ol>
    </div>
  </div>
  
  <div class="panel panel-info">
    <div style="text-align: center;">
    <?php echo $msg;?>
  </div>
    <div class="panel-heading" style="text-align: center; font-size: 30px;"><b>The registrars </b></div>
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
           $per_page=5;
          if(!isset($_GET['page'])){
            $page=1;
          }else{
            $page=(int)$_GET['page'];

          }
          $start_from=($page-1)*$per_page;

          $select= "SELECT * from registrars ORDER BY user_id DESC LIMIT $page,$per_page";
          $sql= mysqli_query($conn ,$select );
          $num =1;
          while ( $posts = mysqli_fetch_assoc($sql)) {
          echo '<tr>
            <td>'.$num.'</td>
            <td>'.$posts['username'].'</td>
            <td><img src="../'.$posts['avatar'].'" width=50px class="img-rounded" /></td>
            <td>'.$posts['useremail'].'</td>
            <td>'.$posts['gender'].'</td>
            <td><a href="../profile.php?user='.$posts['user_id'].'"  class="btn btn-primary btn-sm" target="_blank">profile</a></td>
            <td><a href="edite_user.php?user='.$posts['user_id'].'"  class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edite</a></td>
            <td><a class="btn btn-danger btn-sm" href="users.php?delete='.$posts['user_id'].'&page='.$page.'">
            <i class="fa fa-trash-o fa-lg"></i> Delete</a></td>
          </tr>' ;
          $num++;
          }
          ?>
          
        </tbody>
      </table>
      <?PHP
       $page_sql=mysqli_query($conn,"SELECT * FROM registrars");
       $count_page=mysqli_num_rows($page_sql);
       $total_page=ceil($count_page/$per_page);
      ?>
    </div>
    <nav class="text-center">
      <ul class="pagination">
         <?php
           for ($i=1 ;$i<=$total_page ;$i++){

         echo '<li '.($page == $i?'class="active"':'').'><a href="users.php?page='.$i.'" >'.$i.'</a></li>';
        }
           ?>
      </ul>
    </nav>
  </div>
</article>
<?php
include("inc/footer.php");
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->