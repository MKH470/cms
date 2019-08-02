<?php
include("include/header.php");
?>
<section class="container-fluid cotainer" >

<article class="col-md-9 col-lg-9 art_bg" >
<!-- start carousel -->

<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: 20px; margin-bottom: 30px;">

<!-- Wrapper for slides -->
<div class="carousel-inner">
	<?php
	$slidnum=$setting['slide'];
	$valueslid=$setting['slide_value'];
	$valuechaptera=$setting['chaptera_value'];
	$catenum=$setting['chaptera'];
	$tab1num=$setting['taba'];
	$tab2num=$setting['tabb'];
	$tab3num=$setting['tabc'];
	$valuetab1=$setting['taba_value'];
	$valuetab2=$setting['tabb_value'];
	$valuetab3=$setting['tabc_value'];
	$chapter2num=$setting['chapterb'];
	$chapter2value=$setting['chapterb_value'];
	$select="SELECT * FROM `posts` WHERE `status`='published' AND `category`='$slidnum'  ORDER BY `post_id` DESC LIMIT $valueslid";
	$sleslide=mysqli_query($conn,$select);
	$rows = mysqli_num_rows($sleslide);
	$x=0;
	while ($slide = mysqli_fetch_assoc($sleslide)){
	?>
	<div class="item <?php echo ($x== 0 ?'active':'');?>">
		<img src="<?php echo ($slide['image']==''?'images\slide\noslide.jpg' : $slide['image']);?>" width='100%' style="height: 400px;">
		<div class="carousel-caption">
			<h3 class="carousel_h3" ><a href="post.php?id=<?php echo $slide['post_id'];?>"> <?php echo $slide['title'];?></a></h3>
			<p><?php $slide1=strip_tags($slide['post']); $slide2=substr($slide1,0,350);  echo $slide2;?>...</p>
		</div>
	</div>
	<?php
	$x++;
	}
	?>
	</div><!-- End Item -->
	
	</div><!-- End Carousel Inner -->
	<ul class="nav nav-pills nav-justified sliddd">
		<?php
		
		for ($i=0; $i < $rows ; $i++) {
		echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="'.($i==0?'active':'').'"><a href="#"><i class="fa fa-star fa-2x" aria-hidden="true"></i></a></li>';
		}
		?>
		
		
	</ul>
</div>
<!-- End Carousel -->

<hr />

<!-- category A -->
<div class="row">
	<h2 class="tit_cat1"><?php echo $catenum; ?></h2>
	<?php
	$select1="SELECT * FROM posts INNER JOIN registrars ON posts.author =registrars.user_id WHERE `status`='published' AND `category`='$catenum'  ORDER BY `post_id` DESC LIMIT $valuechaptera";
	$chapterquery=mysqli_query($conn,$select1);
	while ($chaptera= mysqli_fetch_assoc($chapterquery)){
	
	?>
	<div class="col-sm-4 col-md-4" style="margin-bottom: 20px">
		<div class="post">
			<div class="post-img-content">
				<img src="<?php echo ($chaptera['image']==''?'images\slide\noslide.jpg' : $chaptera['image']);?>" class="img-responsive" style="width: 100%;height: 200px;"/>
				<span class="post-title"><b><?php echo $chaptera['title']; ?></b>
				</div>
				<div class="content">
					<div class="author">
						By <a href="profile.php?user=<?php echo $chaptera['user_id']; ?>"><b><?php echo $chaptera['username']; ?></b></a> <time datetime="2019-01-20"><?php echo $chaptera['post_date']; ?></time>
					</div>
					<div class="text-justify">
						<p>
						<?php $chap1=strip_tags($chaptera['post']); $chap2=substr($chap1,0,350);  echo $chap2;?>...</p>
					</div>
					<hr />
					<div class="text-left">
						<a href="post.php?id=<?php echo $chaptera['post_id']; ?>" class="btn btn-warning btn-sm">Read more&larr;</a>
					</div>
				</div>
			</div>
		</div>
		<?php
		}
		?>
	</div>
	<hr />
	<!-- end category A -->
	<!-- tab -->
	<div class="col-md-12">
		<div class="row">
			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tab_default_1" data-toggle="tab">
							<strong><?php echo $tab1num; ?></strong></a>
						</li>
						<li>
							<a href="#tab_default_2" data-toggle="tab">
							<strong><?php echo $tab2num; ?></strong> </a>
						</li>
						<li>
							<a href="#tab_default_3" data-toggle="tab">
							<strong><?php echo $tab3num; ?></strong> </a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							<?php
							$select2="SELECT * FROM posts WHERE `status`='published' AND `category`='$tab1num'  ORDER BY `post_id` DESC LIMIT $valuetab1";
							$tab1query=mysqli_query($conn,$select2);
							while ($taba= mysqli_fetch_assoc($tab1query)){
							?>
							<div class="bg_tab_topic">
								<div class="col-md-3">
									<img src="<?php echo ($taba['image']==''?'images\slide\noslide.jpg' : $taba['image']);?>" width="100%" class="img-thumbnail" />
								</div>
								<div class="col-md-9">
									<h3 class="col-md-12 text-justify" style="margin-top: 8px;background: #009688;padding: 8px;">
									<a href="post.php?id=<?php echo $taba['post_id']; ?>" class="a_1"><?php echo $taba['title']; ?></a>
									</h3>
									<p class="col-md-12 text-justify">
										<p>
										<?php $tab1=strip_tags($taba['post']); $tab2=substr($tab1,0,350);  echo $tab2;?>...<a href="post.php?id=<?php echo $taba['post_id']; ?>"><srong>read more</srong></a></p>
									</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<?php
							}?>
							
							
						</div>
						<div class="tab-pane" id="tab_default_2">
							<div class="tab-pane active" id="tab_default_1">
								<?php
								$select2="SELECT * FROM posts WHERE `status`='published' AND `category`='$tab2num'  ORDER BY `post_id` DESC LIMIT $valuetab2";
								$tab2query=mysqli_query($conn,$select2);
								while ($tabb= mysqli_fetch_assoc($tab2query)){
								?>
								<div class="bg_tab_topic">
									<div class="col-md-3">
										<img src="<?php echo ($tabb['image']==''?'images\slide\noslide.jpg' : $tabb['image']);?>" width="100%" class="img-thumbnail" />
									</div>
									<div class="col-md-9">
										<h3 class="col-md-12 text-justify" style="margin-top: 8px;background: #009688;padding: 8px;">
										<a href="post.php?id=<?php echo $tabb['post_id']; ?>" class="a_1"><?php echo $tabb['title']; ?></a>
										</h3>
										<p class="col-md-12 text-justify">
											<p>
											<?php $tab1=strip_tags($tabb['post']); $tab2=substr($tab1,0,350);  echo $tab2;?>...<a href="post.php?id=<?php echo $tabb['post_id']; ?>"><srong>read more</srong></a></p>
										</p>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php
								}?>
								
								
								
								
								
							</div>
							
							
						</div>
						<div class="tab-pane" id="tab_default_3">
							<div class="tab-pane active" id="tab_default_1">
								<?php
								$select3="SELECT * FROM posts WHERE `status`='published' AND `category`='$tab3num'  ORDER BY `post_id` DESC LIMIT $valuetab3";
								$tab3query=mysqli_query($conn,$select3);
								while ($tabc= mysqli_fetch_assoc($tab3query)){
								?>
								<div class="bg_tab_topic">
									<div class="col-md-3">
										<img src="<?php echo ($tabc['image']==''?'images\slide\noslide.jpg' : $tabc['image']);?>" width="100%" class="img-thumbnail" />
									</div>
									<div class="col-md-9">
										<h3 class="col-md-12 text-justify" style="margin-top: 8px;background: #009688;padding: 8px;">
										<a href="post.php?id=<?php echo $tabc['post_id']; ?>" class="a_1"><?php echo $tabc['title']; ?></a>
										</h3>
										<p class="col-md-12 text-justify">
											<p>
											<?php $tab1=strip_tags($tabc['post']); $tab2=substr($tab1,0,350);  echo $tab2;?>...<a href="post.php?id=<?php echo $tabc['post_id']; ?>"><srong>read more</srong></a></p>
										</p>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php
								}?>
								
								
								
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end Tabs -->
	
	<!-- start category B -->
	<div class="col-lg-12">
		<h2 class="tit_cat2"><?php echo $chapter2num; ?></h2>
		<div class="row  bg_cat2">
			<?php
								$select4="SELECT * FROM posts WHERE `status`='published' AND `category`='$chapter2num'  ORDER BY `post_id` DESC LIMIT $chapter2value";
								$chapter2query=mysqli_query($conn,$select4);
								while ($chapter2= mysqli_fetch_assoc($chapter2query)){
								?>
			<div class="bg_tab_topic col-md-6">
				<div class="col-md-4">
					<img src="<?php echo ($chapter2['image']==''?'images\slide\noslide.jpg' : $chapter2['image']);?>" width="100%" class="circle" />
				</div>
				<div class="col-md-8">
					<h3 class="col-md-12 text-justify" style="margin-right: -30px;margin-top: 8px;">
					<a href="post.php?id=<?php echo $chapter2['post_id'];?>"><?php echo $chapter2['title']; ?></a>
					</h3>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php
             }
			?>
			<div class="clearfix"></div>
			
		</div>
	</div>
	<!-- end category B -->
</article>
</section>
<!-- end body -->
<?php
include("include/footer.php");
?>