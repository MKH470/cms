<?php
include("include/header.php");
$id=$_GET['id'];
$sel_post="SELECT * FROM posts INNER JOIN registrars ON posts.author =registrars.user_id WHERE `post_id`='$id' ";
$query_post=mysqli_query($conn,$sel_post);
$article=mysqli_fetch_assoc($query_post);
?>
<section class="container-fluid cotainer" >
  <article class="col-md-9 col-lg-9 art_bg" >
    
    
    <div class="col-lg-12">
      <div class="cotainer0">
        <div class="cate-post">
         
          <div class="col-md-12">
            <h2 class="cate-h2"><?php echo strip_tags($article['title']);?></h2>
            <img src="<?php echo($article['image']==' '?'images\slide\noslide.jpg':$article['image']);?>" width="100%" style="max-height: 600px; margin-top: 10px; margin-bottom: 5px;" />
          </div>
          <div class="col-md-12 ">
            <div class="col-md-12 writer">
              <p class="pull-right"><i class="fa fa-user" aria-hidden="true"> </i> <a href="profile.php?user=<?php echo $article['user_id'];?>"><?php echo $article['username'];?> </a></p>
              <p class="pull-left"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $article['post_date'];?></p>
            </div>
            <hr/>
            <p>
               <?php echo strip_tags($article['post']);?>
            </p>
            
            
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <!--comments area------>
    <div class="col-lg-12 " >
      <div class="col-md-12 com-container" style="background: #f5f5f5;">
        <!------------------------------------------------>
        <div class="col-md-12" >
          <div class="col-md-12" >
            <h2 class="cate-h2" style="text-align: center; margin-bottom: 25px;"><i class="fa fa-commenting-o " aria-hidden="true"></i> The Comments</h2>
          </div>
          <!------------------------------------------------>
      
          
            <?php
            /*----upon--- approval---------
               $select= "SELECT * from comments INNER JOIN registrars ON comments.user_id =registrars.user_id WHERE post_id =$id AND status='published'  ORDER BY com_id DESC";
              ----WHITH out-- approval---------
              $select= "SELECT * from comments1 INNER JOIN registrars ON comments1.user_id =registrars.user_id WHERE post_id =$id  ORDER BY com_id DESC";
              
            */
               $select= "SELECT * from comments INNER JOIN registrars ON comments.user_id =registrars.user_id WHERE post_id =$id AND status='published' ORDER BY com_id DESC ";
               $com_query=mysqli_query($conn,$select);
               while ($comments=mysqli_fetch_assoc($com_query)){

            ?>
            <div class="col-md-12 com-container1">
            <div class="col-md-2" >
              <img   src="<?php echo $comments['avatar'];?>"  class="com-circle" width="100%" />
            </div>
            <div class="col-md-10">
              <p style="padding:5PX;margin:10px 20px 5px -80px ;">
                <?php echo $comments['com']; ?>
              </p>
            </div>
            <div class="col-md-12 ">
              <hr style="margin-bottom:3px; margin-top:0px;" />
              <p class="pull-left"> <i class="fa fa-comments" aria-hidden="true"></i>  commented by  <a href="profile.php?user=<?php echo $comments['user_id'];?>"> <?php echo $comments['username'];?> </a></p>
              <p class=" pull-right" > <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $comments['com_date'];?></p>
            </div>

          </div>
            <?php
            }
            ?>
          <div class="col-md-12" style="margin-left: -80px; ">
            
            <?php comments_aria();?>
          </div>
          
          <!--- </div>-->
          <!-----end-------whrite ------comments---------------->
          <div class="clearfix"></div>
        </div>
      </div>
      
    </div>
    
  </article>
</section>
<?php
include("include/footer.php");
?>