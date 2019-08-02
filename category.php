<?php
include("include/header.php");
$id=$_GET['cate'];
?>
<section class="container-fluid cotainer" >
  <article class="col-md-9 col-lg-9 art_bg" >
    
    <div class="col-lg-12 art_bg">
      <?php
      $per_page=3;
          if(!isset($_GET['page'])){
            $page=1;
          }else{
            $page=(int)$_GET['page'];

          }
          $start_from=($page-1)*$per_page;
      $sel_cate="SELECT * FROM posts INNER JOIN registrars ON posts.author =registrars.user_id WHERE `status`='published' AND `category`='$id'  ORDER BY `post_id` DESC LIMIT $start_from,$per_page";
      $post_query=mysqli_query($conn,$sel_cate);
      while ($post=mysqli_fetch_assoc($post_query)) {
      
      ?>
      <div class="cate-post">
        <div class="col-md-3">
          <img src="<?php echo ($post['image']==''?'images\slide\noslide.jpg' : $post['image']);?>" width="100%" />
        </div>
        <div class="col-md-9">
          <h2 class="cate-h2 "><?php $title=$post['title']; $title1=strip_tags($title);  echo $title1; ?></h2>
          
          
          <p>
            <?php echo strip_tags(substr($post['post'], 0,350)).'...';?>
          </p>
        </div>
        <div class="col-md-12 ">
          <hr style="margin-bottom: : 3px; margin-top: 0px;" />
          <a href="post.php?id=<?php echo $post['post_id'];?>" class="btn btn-warning btn-sm pull-right" >Read more&larr;</a>
          <p class="pull-left"><i class="fa fa-user" aria-hidden="true"> </i> <a href="profile.php?user=<?php echo $post['user_id'];?>"><?php echo $post['username'].' ';?></a> <i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $post['post_date'];?></p>
          
        </div>
        
        <div class="clearfix"></div>
      </div>
      <?php
      }
      ?>
    </div>
          <?PHP
        $page_sql=mysqli_query($conn,"SELECT * FROM posts WHERE `category`='$id' ORDER BY `post_id` DESC ");
        $count_page=mysqli_num_rows($page_sql);
        $total_page=ceil($count_page/$per_page);


      ?>
      <nav class="text-center">
        <ul class="pagination">
          <?php
           for ($i=1 ;$i<=$total_page ;$i++){

         echo '<li '.($page == $i?'class="active"':'').'><a href="category.php?cate='.$id.'&page='.$i.'" >'.$i.'</a></li>';
        }
           ?>
        </ul>
      </nav>
  </article>
</section>
<?php
include("include/footer.php");
?>