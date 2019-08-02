<?php
include("inc/hearder.php");
include("inc/aside.php");
$msg=' ';
$msgdel=' ';
if(isset($_POST['add'])){
	
	if(empty($_POST['category'])){
		
$msg= '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> pless! Enter the category name </div>'.'<br/>';
	}
	else{
		$category1=$_POST['category'];
		
		$insert = mysqli_query($conn ,"INSERT INTO category (cate_name) VALUES ('$category1')");
		if (isset($insert) ){
$msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i>  category added successfully .</div>';
 echo '<meta http-equiv="refresh" content="1 ;category.php" />';
		}
	}
}
if(isset($_GET['delete'])){
	$get =$_GET['delete'];
	$del = mysqli_query($conn, "DELETE  FROM category WHERE cate_id = '$get'");
	if(isset($del)){
		$msgdel='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i>  deleteded successfully .</div>';
		echo '<meta http-equiv="refresh" content="1 ;category.php" />';
	}
	else{

$msgdel= '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> Delete faild!</div>'.'<br/>';
	}
}
?>
<article class="col-lg-9">
	
	<div class="row">
		<div class="col-lg-12">
			
			<ol class="breadcrumb" style="margin-bottom: 5px;">
				<li><a href="index.php">home</a></li>
				<li>category</li>
			</ol>
		</div>
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading" style="text-align: center; font-size:200%;"><strong>Add a new category</strong></div>
				<div class="panel-body">
					<form action="" method="post" class="form-horizontal">
						<div class="form-group">
							<label  for="category" class="col-sm-4 control-label" >N-category</label>
							<div class="col-sm-8">
								<input type="text" name="category" class="form-control" id="category" placeholder="Enter category's name" >
							</div>
						</div>
						<hr/>
						
						<div class="form-group">
							<div class="col-sm-12" style="text-align: center;"><?php echo $msg; ?></div>
							
							<div class="col-sm-offset-4 col-sm-8">
								<input type="submit" name="add" value="add category" class="btn btn-primary">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading" style="text-align: center; font-size:200%;"><strong>The category's</strong></div>
				<div class="panel-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Category Name</th>
								<th>Priview</th>
								<th>Eidt</th>
								<th>Delet</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$cat= mysqli_query($conn , "SELECT * FROM category ORDER BY cate_id DESC"  );
							
							$num =1;
							while ( $category = mysqli_fetch_assoc($cat)) {
								echo '<tr>
									 <td>'.$num.'</td>
									<td>'.$category['cate_name'].'</td>
									<td><a href="../category.php?cate='.strtolower($category['cate_name']).'"  target="_blank" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Priview</a></td>
									<td><a href="edite-category.php?cate='.$category['cate_id'].'"  class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edite</a></td>
									<td><a class="btn btn-danger btn-sm" href="category.php?delete='.$category['cate_id'].'">
									<i class="fa fa-trash-o fa-lg"></i> Delete</a></td>
								    </tr>' ;
								   $num++; 
							}
							?>
							
						</tbody>
					</table>
					<div class=" col-sm-12" style="text-align: center;"><?php echo $msgdel; ?></div>
					
				</div>
			</div>
		</div>
		
		
		
	</div>
	
</article>
<?php
include("inc/footer.php");
?>