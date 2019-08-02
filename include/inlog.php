<?Php

include 'config.php';
session_start();
if (isset ($_POST['inlogsubmit'])){
    
    $inlognam=$_POST['inlognam'];
	$inlognam = mysqli_real_escape_string($conn, $inlognam);
	$inlognam = stripcslashes($inlognam);
	$inlogpass = md5($_POST['inlogpass']);
	if (empty ($inlognam)) {
		echo '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> pless! Enter your email or username...</div>'.'<br/>';
	}
	elseif (empty ($_POST['inlogpass'])) {
		echo '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> pless! Enter your psaword...</div>'.'<br/>';
	}
	else{
		$inlogselect = "SELECT * FROM registrars WHERE(username ='$inlognam' OR useremail ='$inlognam') AND userpass ='$inlogpass'" ;
		$inlogsql = mysqli_query($conn , $inlogselect);
		$inlogrow =mysqli_num_rows($inlogsql);
		if($inlogrow != 1){
			echo '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> username or password is incorrect.</div>'.'<br/>';
		}
		else{
			$user = mysqli_fetch_assoc($inlogsql);
			$_SESSION['id']=$user['user_id'];

	        $_SESSION['user']=$user['username'];
	        $_SESSION['mail']=$user['useremail'];
	        $_SESSION['pass']=$user['userpass'];
	        $_SESSION['gender']=$user['gender'];
	        $_SESSION['about']=$user['useercomment'];
	        $_SESSION['avatar']=$user['avatar'];
	        $_SESSION['linkedin']=$user['linkedin'];
	        $_SESSION['github']=$user['github'];
	        $_SESSION['facebook']=$user['facebook'];
	        $_SESSION['date']=$user['reg_date'];
	        $_SESSION['role']=$user['role'];
	echo '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> success! signing in .</div>';
	echo '<meta http-equiv="refresh" content="3 ;index.php" />';
		}
	}
	
}
?>