<?php
include("inc/hearder.php");
include("inc/aside.php");
$msg='';

if(isset($_GET['delete'])){
$del=$_GET['delete'];
$sql=mysqli_query($conn ,"DELETE FROM comments1  WHERE com_id= '$del'");
if(isset($sql)){
$msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> The comment deleted successfully.</div>';
echo '<meta http-equiv="refresh" content="1 ; comments1.php" />';
}
}
?>

<article class="col-lg-9">
  <div class="col-lg-12">
    <div class="row">
      <ol class="breadcrumb" style="margin-bottom: 5px;">
        <li><a href="index.php">home</a></li>
        <li>comments</li>
      </ol>
    </div>
  </div>
  
  <div class="panel panel-info">
    <?php echo $msg;?>
    <div class="panel-heading" style="text-align: center; font-size:200%;"><b>The comments</b></div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>comments</th>
            <th>Preview</th>
            <th>Author</th>
            <th>Date</th>
            <th>Delet</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $per_page=3;
          if(!isset($_GET['page'])){
            $page=1;
          }else{
            $page=(int)$_GET['page'];

          }
          $start_from=($page-1)*$per_page;

          $select= "SELECT * from comments1 INNER JOIN registrars ON comments1.user_id =registrars.user_id ORDER BY com_id DESC LIMIT $start_from,$per_page";
          $sql= mysqli_query($conn ,$select );
          $num =1;
          while ( $posts = mysqli_fetch_assoc($sql)) {
          echo '<tr>
            <td>'.$num.'</td>
            <td>'.$posts['com'].'</td>
            <td><a href="../post.php?id='.$posts['post_id'].'"  class="btn btn-primary btn-sm">preview</a></td>
            <td>'.$posts['username'].'</td>
            <td>'.$posts['com_date'].'</td>
            <td><a class="btn btn-danger btn-sm" href="comments1.php?delete='.$posts['com_id'].'&page='.$page.'">
            <i class="fa fa-trash-o fa-lg"></i> Delete</a></td>
          </tr>' ;
          $num++;
          }
          ?>
          
        </tbody>
      </table>
      <?PHP
        $page_sql=mysqli_query($conn,"SELECT * FROM comments1  ORDER BY com_id DESC");
        $count_page=mysqli_num_rows($page_sql);
        $total_page=ceil($count_page/$per_page);


      ?>
      <nav class="text-center">
        <ul class="pagination">
          <?php
           for ($i=1 ;$i<=$total_page ;$i++){

         echo '<li '.($page == $i?'class="active"':'').'><a href="comments1.php?page='.$i.'" >'.$i.'</a></li>';
        }
           ?>
        </ul>
      </nav>
    </div>
  </div>
</article>
<?php
include("inc/footer.php");
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->