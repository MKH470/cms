<?PHP
	include 'config.php';
	session_start();
	if (isset($_POST["submit"])){
	$name=strip_tags($_POST["name"]);
	$email=$_POST["email"];
	$gender=$_POST["gender"];
	$about=strip_tags($_POST["about"]);
	$linkedin= htmlspecialchars($_POST["linkedin"]);
	$github =htmlspecialchars($_POST["github"]);
	$facebook=htmlspecialchars($_POST["facebook"]);
	$date= date("d-m-Y");
	if(empty($name)){
	echo '<div class="alert alert-danger" role="alert"> <i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter your NAME </div>'.'<br/>';
	}
	elseif (strlen($name) <= 3) {
	echo '<div class="alert alert-danger" role="alert"> <i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! The name  must be greater than three characters. </div>'.'<br/>';
	}
	elseif(empty($email)){
	echo '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter your EMAIL</div>'.'<br/>';
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter the Correct EMAIL as like the example</div>'.'<br/>';
	}
	elseif(empty($_POST["pass"])){
	echo '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter your psaword</div>'.'<br/>';
	}
	elseif(empty($_POST["con_pass"])){
	echo '<div class="alert alert-danger" role="alert"><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! Confirm Password</div>'.'<br/>';
	}
	elseif($_POST["con_pass"] !== $_POST["pass"]){
	echo '<div class="alert alert-danger" role="alert"><i class="fa fa-bell-o" aria-hidden="true"></i> The passwords are not identicals</div>'.'<br/>';
	}
	elseif(empty($gender)){
	echo '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter your gender</div>'.'<br/>';
	}
	else {
	$querynam="SELECT username FROM registrars WHERE username ='$name'";
	$querymail="SELECT useremail FROM registrars WHERE useremail = '$email'";
	$sqlname=mysqli_query($conn, $querynam);
	$sqlemail=mysqli_query($conn, $querymail);
	$row1= mysqli_num_rows($sqlname);
	$row2= mysqli_num_rows($sqlemail);
	if($row1 > 0 ){
	echo '<div class="alert alert-danger" role="alert"> <i class="fa fa-bell-o" aria-hidden="true"></i> sorry!! username already exists choose a different name</div>'.'<br/>';
	}
	elseif ($row2 > 0) {
	echo '<div class="alert alert-danger" role="alert"> <i class="fa fa-bell-o" aria-hidden="true"></i> sorry!! user email already exists choose a different email</div>'.'<br/>';
	}
	else{
	//-----------image---------cood--------------
	if(isset($_FILES["image"])){
	$image = $_FILES["image"];
	$image_name = $image['name'];
	$image_tmp = $image['tmp_name'];
	$image_error = $image['error'];
	$image_size = $image['size'];
	$image_exe = explode('.', $image_name);
	$image_exe = strtolower(end($image_exe));
	$alloud = array('png','gif','jpg','jpeg');
	$editname=strtolower($name);
	$editname = str_split($editname, 3);
	if(in_array($image_exe, $alloud)){
	if ($image_error === 0) {
	if($image_size <= 3200000){
	$new_name = uniqid($editname[0],false).'.'.$image_exe ;
	$image_dir = '../images/avatar/'.$new_name ;
	$image_db ='images/avatar/'.$new_name ;
	if(move_uploaded_file($image_tmp, $image_dir)){
	$Password=md5($_POST['pass']);
	$insert = "INSERT INTO registrars
	(username,
	useremail,
	userpass,
	gender,
	useercomment,
	avatar,
	linkedin,
	github,
	facebook,
	reg_date,
	role)
	VALUES
	( '$name',
	'$email',
	'$Password',
	'$gender',
	'$about',
	'$image_db',
	'$linkedin',
	'$github',
	'$facebook',
	'$date',
	'user')";
	$insert_sql=mysqli_query($conn, $insert);
	if(isset($insert_sql)){
	$query="SELECT * FROM registrars WHERE username='$name'";
	$user_ifo =mysqli_query($conn, $query);
	$user =mysqli_fetch_assoc($user_ifo);
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
	echo '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> your membership has been successfully registered.</div>';
	echo '<meta http-equiv="refresh" content="3 ;index.php" />';
	}
	}
	else{
	echo '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> SORRY!! an unexpected error occurred except uploading the image.  </div>'.'<br/>';
	}
	}
	else {
	echo '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> SORRY!! the image size is too large.Enter a smaller of 3MB.  </div>'.'<br/>';
	}
	}
	else {
	echo '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>'.'<br/>';
	}
	}
	else{
	echo '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter  Correct image whith Correct extension (png,gif,jpg,jpeg)  </div>'.'<br/>';
	}
		}
	//-----not set-------
else{
		$Password=md5($_POST['pass']);
if(isset($gender) ){
	if($gender == 'female'){
$insert = "INSERT INTO registrars
	(username,
	useremail,
	userpass,
	gender,
	useercomment,
	avatar,
	linkedin,
	github,
	facebook,
	reg_date,
	role)
	VALUES
	( '$name',
	'$email',
	'$Password',
	'$gender',
	'$about',
	'images/gavatar.png',
	'$linkedin',
	'$github',
	'$facebook',
	'$date',
	'user')";
	$insert_sql=mysqli_query($conn, $insert);
	if(isset($insert_sql)){
	$query="SELECT * FROM registrars WHERE username='$name'";
	$user_ifo =mysqli_query($conn, $query);
	$user =mysqli_fetch_assoc($user_ifo);
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
	echo '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> your membership has been successfully registered.</div>';
	echo '<meta http-equiv="refresh" content="2 ;index.php" />';
	}
	}
	elseif ($gender == 'male') {
	$insert = "INSERT INTO registrars
	(username,
	useremail,
	userpass,
	gender,
	useercomment,
	avatar,
	linkedin,
	github,
	facebook,
	reg_date,
	role)
	VALUES
	( '$name',
	'$email',
	'$Password',
	'$gender',
	'$about',
	'images/user.png',
	'$linkedin',
	'$github',
	'$facebook',
	'$date',
	'user')";
	$insert_sql=mysqli_query($conn, $insert);
	if(isset($insert_sql)){
	$query="SELECT * FROM registrars WHERE username='$name'";
	$user_ifo =mysqli_query($conn, $query);
	$user =mysqli_fetch_assoc($user_ifo);
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
	echo '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> your membership has been successfully registered.</div>';
	echo '<meta http-equiv="refresh" content="2 ;index.php" />';
	}
}
else{
	$insert = "INSERT INTO registrars
	(username,
	useremail,
	userpass,
	gender,
	useercomment,
	avatar,
	linkedin,
	github,
	facebook,
	reg_date,
	role)
	VALUES
	( '$name',
	'$email',
	'$Password',
	'$gender',
	'$about',
	'images/unknow.png',
	'$linkedin',
	'$github',
	'$facebook',
	'$date',
	'user')";
	$insert_sql=mysqli_query($conn, $insert);
	if(isset($insert_sql)){
	$query="SELECT * FROM registrars WHERE username='$name'";
	$user_ifo =mysqli_query($conn, $query);
	$user =mysqli_fetch_assoc($user_ifo);
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
	echo '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> your membership has been successfully registered.</div>';
	echo '<meta http-equiv="refresh" content="2 ;index.php" />';
	}
}
}
	
	
	}
	}
	//-------
	}
	}
?>