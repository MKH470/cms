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
	$insert = "INSERT INTO comments1
	(post_id,
	user_id,
	com,
	com_date
	)
	VALUES
	('$post',
	'$user_id',
	'$com',
	'$date')";
	$insert_sql=mysqli_query($conn, $insert);

	if(isset($insert_sql)){
		header("location: ../post.php?id=$post");
			                        }
	                        else{
	                        	echo '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except added the comment.  </div>'.'<br/>';
	                        }
		
	}
}


?>