<?php
include("inc/hearder.php");
include("inc/aside.php");
$msg='';
if(isset($_GET['status']) AND isset($_GET['post'] )){
$get=$_GET['status'];
$post=$_GET['post'];
$sql=mysqli_query($conn ,"UPDATE posts SET   status='$get' WHERE post_id= '$post'");

}
if(isset($_GET['delete'])){
$del=$_GET['delete'];
$sql=mysqli_query($conn ,"DELETE FROM posts  WHERE post_id= '$del'");
if(isset($sql)){
$msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> The article deleted successfully.</div>';
echo '<meta http-equiv="refresh" content="1 ; posts.php" />';
}
}
?>

<article class="col-lg-9">
  <div class="col-lg-12">
    <div class="row">
      <ol class="breadcrumb" style="margin-bottom: 5px;">
        <li><a href="index.php">home</a></li>
        <li>articles</li>
      </ol>
    </div>
  </div>
  
  <div class="panel panel-info">
    <?php echo $msg;?>
    <div class="panel-heading" style="text-align: center; font-size:200%;"><b>The articles</b></div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Title</th>
            <th>Preview</th>
            <th>Author</th>
            <th>Categoty</th>
            <th>Publication's Date</th>
            <th>Status edite</th>
            <th>Addit</th>
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

          $select= "SELECT * from posts INNER JOIN registrars ON posts.author =registrars.user_id ORDER BY post_id DESC LIMIT $start_from,$per_page";
          $sql= mysqli_query($conn ,$select );
          $num =1;
          while ( $posts = mysqli_fetch_assoc($sql)) {
          echo '<tr>
            <td>'.$num.'</td>
            <td><img src="../'.($posts['image'] == '' ?'images/no-img.jpg': $posts['image']) .'" width=75px class="img-rounded" /></td>
            <td>'.substr($posts['title'], 0,40).'...</td>
            <td><a href="../post.php?id='.$posts['post_id'].'"  class="btn btn-primary btn-sm">preview</a></td>
            <td>'.$posts['username'].'</td>
            <td>'.$posts['category'].'</td>
            <td>'.$posts['post_date'].'</td>
            
            <td>'.($posts['status']=='disabled'?'<a href="posts.php?status=published&post='.$posts['post_id'].'&page='.$page.'"  class="btn btn-success btn-sm">published</a>':'<a href="posts.php?status=disabled&post='.$posts['post_id'].'&page='.$page.'"class="btn btn-info btn-sm">disabled!</a>').'</td>
            <td><a href="edite-post.php?post='.$posts['post_id'].'"  class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edite</a></td>
            <td><a class="btn btn-danger btn-sm" href="posts.php?delete='.$posts['post_id'].'&page='.$page.'">
            <i class="fa fa-trash-o fa-lg"></i> Delete</a></td>
          </tr>' ;
          $num++;
          }
          ?>
          
        </tbody>
      </table>
      <?PHP
        $page_sql=mysqli_query($conn,"SELECT * FROM posts");
        $count_page=mysqli_num_rows($page_sql);
        $total_page=ceil($count_page/$per_page);


      ?>
      <nav class="text-center">
        <ul class="pagination">
          <?php
           for ($i=1 ;$i<=$total_page ;$i++){

         echo '<li '.($page == $i?'class="active"':'').'><a href="posts.php?page='.$i.'" >'.$i.'</a></li>';
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