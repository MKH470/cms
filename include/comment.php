<?php
session_start();
include 'config.php';
if (isset($_POST['submit'])) {
	$com=strip_tags($_POST['comment']);
	$post=(int)$_POST['id'];
	$date=date("d-M-Y _ h:i:sa");
	$user_id=$_SESSION['id'];
	if (empty($com)) {
		echo "No comment was written to add.";
	}
	else{
		$insert = "INSERT INTO comments
	(post_id,
	user_id,
	com,
	status,
	com_date
	)
	VALUES
	( '$post',
	'$user_id',
	'$com',
	'dreft',
	'$date')";
	$insert_sql=mysqli_query($conn, $insert);
	if(isset($insert_sql)){
		echo '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> comment added successfully and will be displayed upon approval.</div>';
			                        }
	                        else{
	                        	echo '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except added the comment.  </div>'.'<br/>';
	                        }
		
	}
}


?>