
<?php

$sname= "localhost";
$uname="root";
$pass="";
$dbn ="mysystem";
$conn = mysqli_connect($sname,$uname,$pass, $dbn);
if(!$conn){
    die("Connection failed!" . mysqli_error($connection));
}


/*------ Create database
$tb="CREATE TABLE users(
 'id' INT(8) UNSIGNED AUTO_INCREMENT ,
 'username' VARCHAR(25) NOT NULL,
 'usermail' VARCHAR(25) NOT NULL,
 'userpass' text ,
 'gender' text,
 'avatar' text,
 'usercomment' text,
 'linkedin' text,
 'date 'text,
 'role 'text,
 PRIMARY KEY ('id')
)";

if ($conn->query($tb) === TRUE){
	echo "goood";
}
else{
	echo "notnot";
}
---------*/
function close_db(){
	 global $conn;
	mysqli_close($conn);
}
?>