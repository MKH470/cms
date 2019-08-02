<?php
include("inc/hearder.php");
include("inc/aside.php");
$msg=' ';
if(isset($_GET['cate'])){
  $cate=$_GET['cate'];
  
  $queryedite= "SELECT * FROM category WHERE cate_id='$cate'";
  $sqledite= mysqli_query($conn ,$queryedite);
  $edite= mysqli_fetch_assoc($sqledite);  
}
 if(isset($_POST['edite_category'])){
 	$oldgategory=$_POST['category'];
 	$category=$_POST['edite_category'];
 	$query="UPDATE category SET cate_name ='$oldgategory' WHERE cate_id ='$cate' ";
 	$newsql=mysqli_query($conn,$query);
 	
 	if(isset($newsql)){
 		if(empty($oldgategory)){
 			$msg= '<div class="alert alert-danger" role="alert"> <i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter the category name</div>'.'<br/>';
 		}
 		else{
 		echo '<meta http-equiv="refresh" content="0 ;category.php" />';
 	}
 	}
 }?>
 <article class="col-lg-9">
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb" style="margin-bottom: 5px;">
				<li><a href="category.php">home</a></li>
				<li>category</li>
			</ol>
		</div>
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading" style="text-align: center; font-size:160%;">Edite [<?php echo $edite['cate_name'];?>]</div>
				<div class="panel-body">
					<form action="" method="post" class="form-horizontal">
						<div class="form-group">
							<label  for="category" class="col-sm-4 control-label" >N-category</label>
							<div class="col-sm-8">
								<input type="text" name="category" value="<?php echo $edite['cate_name'];?>" class="form-control" id="category" placeholder="Enter category's name" >
							</div>
						</div>
						<div class="col-sm-12" style="text-align: center;"><?php echo $msg; ?></div>
						<hr/>
						<div class="form-group">
							<div class="col-sm-12" style="text-align: center;"></div>
							<div class="col-sm-offset-4 col-sm-8">
								<input type="submit" name="edite_category" value="edite category" class="btn btn-primary">
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</article>
<?php
include("inc/footer.php");
?>