<?php
include("inc/hearder.php");
include("inc/aside.php");

$msg='';
$title='';
$post='';
if(isset($_POST['add_post'])){
$title=$_POST['title'];
$post=$_POST['post'];
$category=$_POST['category'];
$status=$_POST['status'];
$date=date("d-M-Y");
$author=$_SESSION['id'];

if(empty($title)){
   $msg= '<div class="alert alert-danger" role="alert"> <i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter the title</div>';
}
elseif (empty($post)) {
	 $msg= '<div class="alert alert-danger" role="alert"> <i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter post content</div>';
}
elseif (empty($category)) {
	 $msg= '<div class="alert alert-danger" role="alert"> <i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! select the category </div>';
}
else{
	//------------------set--image-------
	
	    $image = $_FILES["image"];
		//-----print_r($_FILES['image'])------------
		$image_name = $image['name'];
		$image_tmp = $image['tmp_name'];
        $image_size = $image['size'];
        $image_error = $image['error'];
     if($image_name !=''){
        $image_exe = explode('.', $image_name);
        $image_exe = strtolower(end($image_exe));
        $allowd = array('png','gif','jpg','jpeg');
      if(in_array($image_exe, $allowd)){
        	if ($image_error === 0) {
        		if($image_size <= 5000000){
        			$new_name = uniqid('post',false).'.'.$image_exe;
        			$image_dir = '../images/posts/'.$new_name;
        			$image_db ='images/posts/'.$new_name;
        			$filemove=move_uploaded_file($image_tmp, $image_dir);
	                    $new="INSERT INTO posts (title,post,category,image,author,status,post_date)VALUES('$title','$post','$category','$image_db','$author','$status','$date')";     
	            $insert=mysqli_query($conn,$new);
	                  
	                  if(isset($insert)){
	                    	$msg= '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> The article added successfully.</div>';
	                        echo '<meta http-equiv="refresh" content="1 ; posts.php" />';
        			}
        		
        			else{
	                       $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> SORRY!! an unexpected error occurred except uploading the image.  </div>'.'<br/>';
        		}
                  
              }
                 else {
	              $msg= '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> SORRY!! the image size is too large.Enter a smaller of 3MB.  </div>'.'<br/>';
	                 }

        }
            else {
	        $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>'.'<br/>';
	         }
	     }
        else{
	        $msg= '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter  Correct image whith Correct extension (png,gif,jpg,jpeg)  </div>'.'<br/>';
	      }


        

	}
	//------------klaaaaar------set--image-------
	else{
		$new="INSERT INTO posts (title,post,category,author,status,post_date)VALUES('$title','$post','$category','$author','$status','$date')";
       $insert=mysqli_query($conn,$new);
	                  
	                  if(isset($insert)){
	                    	$msg= '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> The article added successfully.</div>';
	                        echo '<meta http-equiv="refresh" content="1 ; posts.php" />';
        			}
	}


}
}
?>
<article class="col-lg-9">
	<div class="col-md-10">
    <div class="row">
      <ol class="breadcrumb" style="margin-bottom: 5px;">
        <li><a href="index.php">home</a></li>
        <li><a href="posts.php">articles</a></li>
        <li>add post</li>
      </ol>
    </div>
  </div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="panel panel-info">

				<div class="panel-heading" style="text-align: center; font-size: 30px;"><i class="fa fa-files-o" aria-hidden="true" style="text-align: center; font-size: 30px;" ></i> <strong>Add a new artcile</strong></div>
				<div class="panel-body">
					<div class="col-sm-12" style="text-align: center;"><?php echo $msg; ?></div>
					<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">Title of artcile</label>
							<div class="col-sm-5">
								<input type="text" value="<?php echo $title; ?>" name="title" class="form-control" id="title" placeholder="Enter the title">
							</div>
						</div>
						<div class="form-group">
							<label for="post" class="col-sm-2 control-label">The artcile</label>
							<div class="col-sm-10">
							<textarea  name="post" rows="8"  class="form-control" id="post" ><?php echo $post;?></textarea> 
							</div>
						</div>
						<div class="form-group">
							<label for="category" class="col-sm-2 control-label">Select category</label>
							<div class="col-sm-5">
								<select name="category"  class="form-control" id="category" >
								<option value="">Select the category</option>
								<?php 
								$query="SELECT * FROM category";
								$sql =mysqli_query($conn ,$query);
								while ($cate = mysqli_fetch_assoc($sql)) {
									echo '<option value="'.$cate['cate_name'].'">'.$cate['cate_name'].'</option>';
								}
								
								?>
								</select>
							</div>
						</div>
						<div class="form-group">
    <label for="image" class="col-sm-2 control-label">Select image</label>
    <div class="col-sm-5">
      <input type="file" name="image" class="form-control"  id="image" >
    </div>
  </div>
						<div class="form-group">
							<label for="status" class="col-sm-2 control-label">Status of article</label>
							<div class="col-sm-5">
								<select name="status"  class="form-control" id="status" >
								<option value="published">published</option>
								<option value="disabled">disabled</option>
								
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input name="add_post" type="submit" value="Add the artcile" class="btn btn-info">
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
                            
	                                              
	                                              
	                                              
	                                              
	                                       
	                                            
	                                             
	                                             
	                                             
	                                             
	                                             
	                                             
	               
	                         

       
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	