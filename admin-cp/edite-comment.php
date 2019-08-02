<?php
include("inc/hearder.php");
include("inc/aside.php");

$msg='';
$title='';
$post='';
if(isset($_POST['eddit'])){
$post=$_POST['com'];
$status=$_POST['status'];
$author=$_SESSION['id'];

if (empty($post)) {
	 $msg= '<div class="alert alert-danger" role="alert"> <i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter comment content</div>';
}

else{
	//------------------set--image-------  
	         $insert=mysqli_query($conn,"UPDATE comments SET  post='$post',status='$status' WHERE com_id= '$id'");
	                  
	                  if(isset($insert)){
	                    	$msg= '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> comment edited successfully.</div>';
	                        echo '<meta http-equiv="refresh" content="1 ; comments.php" />';
        			}
        		
        			else{
	                       $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> SORRY!! an unexpected error occurred except.  </div>'.'<br/>';
        		}
                  
              }
                
	//------------klaaaaar------set--image-------
	


}

?>
<article class="col-lg-9">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<?php
			   $getid=$_GET['com'];
               $getguery=mysqli_query($conn, "SELECT * FROM comments WHERE com_id ='$getid'");
               $get=mysqli_fetch_assoc($getguery);


			?>
			<div class="panel panel-info">
				<div class="panel-heading"><i class="fa fa-files-o" aria-hidden="true"></i> <strong>Eidte comments </strong></div>
				<div class="panel-body">
					<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
						
						<div class="form-group">
							<label for="com" class="col-sm-2 control-label">comment</label>
							<div class="col-sm-10">
							<textarea  name="com" rows="8"  class="form-control" id="com" ><?php echo $get['com'];?></textarea> 
							</div>
						</div>
						<div class="form-group">
							<label for="status" class="col-sm-2 control-label">Status of comment</label>
							<div class="col-sm-5">
								<select name="status"  class="form-control" id="status" >
								<option value="published" <?php if($get['status'] == "published"){echo 'selected'; }?>>published</option>
								<option value="dreft" <?php if($get['status'] == "dreft"){echo 'selected'; }?>>dreft</option>
								
								</select>
							</div>
						</div>
						<div class="col-sm-12" style="text-align: center;"><?php echo $msg; ?></div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input name="eddit" type="submit" value="Save edits" class="btn btn-info">
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
                            
	                                              
	                                              
	                                              
	                                              
	                                       
	                                            
	                                             
	                                             
	                                             
	                                             
	                                             
	                                             
	               
	                         

       
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	