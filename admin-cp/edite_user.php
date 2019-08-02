<?php
include("inc/hearder.php");
include("inc/aside.php");
if($_SESSION['role'] != 'admin'){
  header("location:index.php");
}
$id= intval($_GET['user']);
$msg='';
$getuser=mysqli_query($conn ,"SELECT * FROM registrars WHERE user_id ='$id'");
$user=mysqli_fetch_assoc($getuser);
if (isset($_POST["submit"])){
  $editeuser=strip_tags($_POST["name"]);
  $editemail=$_POST["email"];
    if(empty($editeuser)){
      $msg='<div class="alert alert-danger" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> Please inter username .</div>';
      }
    elseif (empty($editemail)) {
      $msg='<div class="alert alert-danger" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> Please inter email .</div>';
      }
    elseif (!filter_var($editemail ,FILTER_VALIDATE_EMAIL)) {
      $msg='<div class="alert alert-danger" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> Please inter currect email .</div>';
      }
    else{
       $sql=mysqli_query($conn,"SELECT * FROM registrars WHERE  username='$editeuser' OR useremail ='$editemail'");
        if(mysqli_num_rows($sql) > 0){
if($editeuser==$user['username'] AND $editemail ==$user['useremail']){
             if($_POST['pass'] !='' OR $_POST['con_pass']!=''){
                if($_POST['pass'] !=  $_POST['con_pass']){
                  $msg='<div class="alert alert-danger" role="alert"><i class="fa fa-bell-o" aria-hidden="true"></i> The passwords are not identicals</div>';
                   }

                else{
                    $image=$_FILES['image'];
                    $image_name = $image['name'];
                    $image_tmp = $image['tmp_name'];
                    $image_error = $image['error'];
                    $image_size = $image['size'];
                        if($image_name !=''){
                          $img_exe= explode('.', $image_name );
                          $img_exe=strtolower(end($img_exe));
                          $allowd=array('png','gif','jpg','jpeg');
                          $editname=strtolower($editeuser);
                          $editname = str_split($editname, 3);
                           if(in_array($img_exe,$allowd)){
                              if($image_error === 0){
                                if($image_size <= 3200000){
                                  $new_name = uniqid($editname[0],false).'.'.$img_exe;
                                  $image_dir = '../images/avatar/'.$new_name;
                                  $image_db ='images/avatar/'.$new_name;
                                    if(move_uploaded_file($image_tmp, $image_dir)){
                                      $Password=md5($_POST['pass']);
                                      $role=$_POST["role"];
                                      $gender=$_POST["gender"];
                                      $linkedin= htmlspecialchars($_POST["linkedin"]);
                                      $github =htmlspecialchars($_POST["github"]);
                                      $facebook=htmlspecialchars($_POST["facebook"]);
                                      $about=strip_tags($_POST["about"]);
                                      $update = "UPDATE  registrars SET userpass='$Password', gender='$gender', useercomment='$about',avatar='$image_db',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE   user_id= '$id'";
                                      $sql=mysqli_query($conn,$update);
                                          if (isset($sql)) {
                                          $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
                                           echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                                            }
                                        }
                                      else{
                                       $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                                       }
                                }
                               else {
                                $msg= '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> SORRY!! the image size is too large.Enter a smaller of 3MB.  </div>';
                                 }
                                }
                            else{
                              $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                               }
                            }
                          else{
                            $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter  Correct image whith Correct extension (png,gif,jpg,jpeg)  </div>';
                           }
                      }else{
                        $Password=md5($_POST['pass']);
                        $role=$_POST["role"];
                        $gender=$_POST["gender"];
                        $linkedin= htmlspecialchars($_POST["linkedin"]);
                        $github =htmlspecialchars($_POST["github"]);
                        $facebook=htmlspecialchars($_POST["facebook"]);
                        $about=strip_tags($_POST["about"]);

                       $sql=mysqli_query($conn,"UPDATE  registrars SET userpass='$Password', gender='$gender', useercomment='$about',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE user_id= '$id'");
                           if (isset($sql)) {
                              $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
                                echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                              }
                            }
                        }
             }else{
                 $image=$_FILES['image'];
                 $image_name = $image['name'];
                 $image_tmp = $image['tmp_name'];
                 $image_error = $image['error'];
                 $image_size = $image['size'];
                  if($image_name !=''){
                    $img_exe= explode('.', $image_name );
                    $img_exe=strtolower(end($img_exe));
                    $allowd=array('png','gif','jpg','jpeg');
                    $editname=strtolower($editeuser);
                    $editname = str_split($editname, 3);
                      if(in_array($img_exe,$allowd)){
                        if($image_error === 0){
                          if($image_size <= 3200000){
                            $new_name = uniqid($editname[0],false).'.'.$img_exe;
                            $image_dir = '../images/avatar/'.$new_name;
                            $image_db ='images/avatar/'.$new_name;
                                if(move_uploaded_file($image_tmp, $image_dir)){
                                   $role=$_POST["role"];
                                   $gender=$_POST["gender"];
                                   $linkedin= htmlspecialchars($_POST["linkedin"]);
                                   $github =htmlspecialchars($_POST["github"]);
                                   $facebook=htmlspecialchars($_POST["facebook"]);
                                   $about=strip_tags($_POST["about"]);
                                   $update = "UPDATE  registrars SET  gender='$gender', useercomment='$about',avatar='$image_db',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE   user_id= '$id'";
                                   $sql=mysqli_query($conn,$update);
                                     if (isset($sql)) {
                                        $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
                                        echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                                          }
                                       }
                                else{
                                   $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                                     }
                                     }
                          else {
                             $msg= '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> SORRY!! the image size is too large.Enter a smaller of 3MB.  </div>';
                              }
                            }
                         else{
                            $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                               }
                             }
                      else{
                        $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter  Correct image whith Correct extension (png,gif,jpg,jpeg)  </div>';
                         }
                  }else{
                     $role=$_POST["role"];
                     $gender=$_POST["gender"];
                     $linkedin= htmlspecialchars($_POST["linkedin"]);
                     $github =htmlspecialchars($_POST["github"]);
                     $facebook=htmlspecialchars($_POST["facebook"]);
                     $about=strip_tags($_POST["about"]);

                     $sql=mysqli_query($conn,"UPDATE  registrars SET gender='$gender', useercomment='$about',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE user_id= '$id'");
                     if (isset($sql)) {
                       $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
                       echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                      }
                     }
                   }
}

elseif ($editeuser !=$user['username'] AND $editemail ==$user['useremail']) {
      $sql= mysqli_query($conn,"SELECT * FROM registrars WHERE username='$editeuser'");
        if(mysqli_num_rows($sql)>0){
          $msg='<div class="alert alert-danger" role="alert"> <i class="fa fa-check" aria-hidden="true"></i>username is already exists enter different names</div>';
          }

        else{
           if($_POST['pass'] !='' OR $_POST['con_pass']!=''){
              if($_POST['pass'] !=  $_POST['con_pass']){
                $msg='<div class="alert alert-danger" role="alert"><i class="fa fa-bell-o" aria-hidden="true"></i> The passwords are not identicals</div>';
                }

              else{
                $image=$_FILES['image'];
                $image_name = $image['name'];
                $image_tmp = $image['tmp_name'];
                $image_error = $image['error'];
                $image_size = $image['size'];
                  if($image_name !=''){
                    $img_exe= explode('.', $image_name );
                    $img_exe=strtolower(end($img_exe));
                    $allowd=array('png','gif','jpg','jpeg');
                    $editname=strtolower($editeuser);
                    $editname = str_split($editname, 3);
                      if(in_array($img_exe,$allowd)){
                         if($image_error === 0){
                            if($image_size <= 3200000){
                               $new_name = uniqid($editname[0],false).'.'.$img_exe;
                               $image_dir = '../images/avatar/'.$new_name;
                               $image_db ='images/avatar/'.$new_name;
                              if(move_uploaded_file($image_tmp, $image_dir)){
                                $Password=md5($_POST['pass']);
                                $role=$_POST["role"];
                                $gender=$_POST["gender"];
                                $linkedin= htmlspecialchars($_POST["linkedin"]);
                                $github =htmlspecialchars($_POST["github"]);
                                $facebook=htmlspecialchars($_POST["facebook"]);
                                $about=strip_tags($_POST["about"]);
                                $update = "UPDATE  registrars SET username='$editeuser', userpass='$Password', gender='$gender', useercomment='$about',avatar='$image_db',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE   user_id= '$id'";
                                $sql=mysqli_query($conn,$update);
                                if (isset($sql)) {
                                  $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
                                  echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                                 }
                                }
                              else{
                               $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                                  }
                              }
                            else {
                              $msg= '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> SORRY!! the image size is too large.Enter a smaller of 3MB.  </div>';
                               }
                          }
                          else{
                             $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                              }
                             }
                      else{
                         $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter  Correct image whith Correct extension (png,gif,jpg,jpeg)  </div>';
                           }
                }else{
                  $Password=md5($_POST['pass']);
                  $role=$_POST["role"];
                  $gender=$_POST["gender"];
                  $linkedin= htmlspecialchars($_POST["linkedin"]);
                  $github =htmlspecialchars($_POST["github"]);
                  $facebook=htmlspecialchars($_POST["facebook"]);
                  $about=strip_tags($_POST["about"]);

                  $sql=mysqli_query($conn,"UPDATE registrars SET username='$editeuser',  userpass='$Password', gender='$gender', useercomment='$about',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE user_id= '$id'");
                    if (isset($sql)) {
                     $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
                     echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                    }
                     }
                  }
     }else{
           $image=$_FILES['image'];
           $image_name = $image['name'];
           $image_tmp = $image['tmp_name'];
           $image_error = $image['error'];
           $image_size = $image['size'];
     if($image_name !=''){
              $img_exe= explode('.', $image_name );
              $img_exe=strtolower(end($img_exe));
              $allowd=array('png','gif','jpg','jpeg');
              $editname=strtolower($editeuser);
              $editname = str_split($editname, 3);
                if(in_array($img_exe,$allowd)){
                  if($image_error === 0){
                    if($image_size <= 3200000){
                      $new_name = uniqid($editname[0],false).'.'.$img_exe;
                      $image_dir = '../images/avatar/'.$new_name;
                      $image_db ='images/avatar/'.$new_name;
                      if(move_uploaded_file($image_tmp, $image_dir)){
                        $role=$_POST["role"];
                        $gender=$_POST["gender"];
                        $linkedin= htmlspecialchars($_POST["linkedin"]);
                        $github =htmlspecialchars($_POST["github"]);
                        $facebook=htmlspecialchars($_POST["facebook"]);
                        $about=strip_tags($_POST["about"]);
                        $update = "UPDATE  registrars SET username='$editeuser', gender='$gender', useercomment='$about',avatar='$image_db',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE   user_id= '$id'";
                        $sql=mysqli_query($conn,$update);
                          if (isset($sql)) {
                            $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
                            echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                             }
                          }
                          else{
                            $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                               }
                           }
                      else {
                        $msg= '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> SORRY!! the image size is too large.Enter a smaller of 3MB.  </div>';
                          }
                         }
                    else{
                     $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                       }
                    }
                 else{
                   $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter  Correct image whith Correct extension (png,gif,jpg,jpeg)  </div>';
                   }
      }else{
             $role=$_POST["role"];
             $gender=$_POST["gender"];
             $linkedin= htmlspecialchars($_POST["linkedin"]);
             $github =htmlspecialchars($_POST["github"]);
             $facebook=htmlspecialchars($_POST["facebook"]);
             $about=strip_tags($_POST["about"]);

             $sql=mysqli_query($conn,"UPDATE  registrars SET username='$editeuser', gender='$gender', useercomment='$about',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE user_id= '$id'");
               if (isset($sql)) {
                  $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
                  echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                }
                }
              }
             }

}
elseif ($editeuser ==$user['username'] AND $editemail !=$user['useremail']) {
       $sql= mysqli_query($conn,"SELECT * FROM registrars WHERE useremail ='$editemail'");
   if(mysqli_num_rows($sql)>0){
           $msg='<div class="alert alert-danger" role="alert"> <i class="fa fa-check" aria-hidden="true"></i>email is already exists enter different names</div>';
          }

   else{
    if($_POST['pass'] !='' OR $_POST['con_pass']!=''){
              if($_POST['pass'] !=  $_POST['con_pass']){
                 $msg='<div class="alert alert-danger" role="alert"><i class="fa fa-bell-o" aria-hidden="true"></i> The passwords are not identicals</div>';
               }

              else{
                $image=$_FILES['image'];
                $image_name = $image['name'];
                $image_tmp = $image['tmp_name'];
                $image_error = $image['error'];
                $image_size = $image['size'];
        if($image_name !=''){
                    $img_exe= explode('.', $image_name );
                    $img_exe=strtolower(end($img_exe));
                    $allowd=array('png','gif','jpg','jpeg');
                    $editname=strtolower($editeuser);
                    $editname = str_split($editname, 3);
                  if(in_array($img_exe,$allowd)){
                    if($image_error === 0){
                      if($image_size <= 3200000){
                        $new_name = uniqid($editname[0],false).'.'.$img_exe;
                        $image_dir = '../images/avatar/'.$new_name;
                        $image_db ='images/avatar/'.$new_name;
                       if(move_uploaded_file($image_tmp, $image_dir)){
                          $Password=md5($_POST['pass']);
                          $role=$_POST["role"];
                          $gender=$_POST["gender"];
                          $linkedin= htmlspecialchars($_POST["linkedin"]);
                          $github =htmlspecialchars($_POST["github"]);
                          $facebook=htmlspecialchars($_POST["facebook"]);
                          $about=strip_tags($_POST["about"]);
                          $update = "UPDATE  registrars SET useremail ='$editemail', userpass='$Password', gender='$gender', useercomment='$about',avatar='$image_db',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE   user_id= '$id'";
                          $sql=mysqli_query($conn,$update);
                         if (isset($sql)) {
                           $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
                           echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                           }
                        }
                        else{
                         $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                        }
                      }
                     else {
                        $msg= '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> SORRY!! the image size is too large.Enter a smaller of 3MB.  </div>';
                         }
                    }
                    else{
                     $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                         }
                    }
                 else{
                   $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter  Correct image whith Correct extension (png,gif,jpg,jpeg)  </div>';
                   }
      }else{
              $Password=md5($_POST['pass']);
              $role=$_POST["role"];
              $gender=$_POST["gender"];
              $linkedin= htmlspecialchars($_POST["linkedin"]);
              $github =htmlspecialchars($_POST["github"]);
              $facebook=htmlspecialchars($_POST["facebook"]);
              $about=strip_tags($_POST["about"]);

              $sql=mysqli_query($conn,"UPDATE  registrars SET useremail ='$editemail', userpass='$Password', gender='$gender', useercomment='$about',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE user_id= '$id'");
               if (isset($sql)) {
                 $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
                  echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                 }
            }
   }
   }else{
      $image=$_FILES['image'];
      $image_name = $image['name'];
      $image_tmp = $image['tmp_name'];
      $image_error = $image['error'];
      $image_size = $image['size'];
        if($image_name !=''){
          $img_exe= explode('.', $image_name );
          $img_exe=strtolower(end($img_exe));
          $allowd=array('png','gif','jpg','jpeg');
          $editname=strtolower($editeuser);
          $editname = str_split($editname, 3);
          if(in_array($img_exe,$allowd)){
             if($image_error === 0){
               if($image_size <= 3200000){
                  $new_name = uniqid($editname[0],false).'.'.$img_exe;
                  $image_dir = '../images/avatar/'.$new_name;
                  $image_db ='images/avatar/'.$new_name;
                  if(move_uploaded_file($image_tmp, $image_dir)){
                    $role=$_POST["role"];
                    $gender=$_POST["gender"];
                    $linkedin= htmlspecialchars($_POST["linkedin"]);
                    $github =htmlspecialchars($_POST["github"]);
                    $facebook=htmlspecialchars($_POST["facebook"]);
                    $about=strip_tags($_POST["about"]);
                    $update = "UPDATE  registrars SET useremail ='$editemail', gender='$gender', useercomment='$about',avatar='$image_db',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE   user_id= '$id'";
                    $sql=mysqli_query($conn,$update);
                    if (isset($sql)) {
                       $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
                       echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                       }
                    }
                    else{
                    $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                       }
                  }
                  else {
                    $msg= '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> SORRY!! the image size is too large.Enter a smaller of 3MB.  </div>';
                       }
                }
                else{
                  $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                      }
          }
          else{
            $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter  Correct image whith Correct extension (png,gif,jpg,jpeg)  </div>';
              }
        }else{
           $role=$_POST["role"];
           $gender=$_POST["gender"];
           $linkedin= htmlspecialchars($_POST["linkedin"]);
           $github =htmlspecialchars($_POST["github"]);
           $facebook=htmlspecialchars($_POST["facebook"]);
           $about=strip_tags($_POST["about"]);

           $sql=mysqli_query($conn,"UPDATE  registrars SET useremail ='$editemail', gender='$gender', useercomment='$about',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE user_id= '$id'");
            if (isset($sql)) {
             $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
             echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                              }
            }
       }
    }
  }
  else{
     $msg='<div class="alert alert-danger" role="alert"> <i class="fa fa-check" aria-hidden="true"></i>username or email is already exists enter different names</div>';
      }
}
//---------chang email and user name---------
else{
  if($_POST['pass'] !='' OR $_POST['con_pass']!=''){
      if($_POST['pass'] !=  $_POST['con_pass']){
        $msg='<div class="alert alert-danger" role="alert"><i class="fa fa-bell-o" aria-hidden="true"></i> The passwords are not identicals</div>';
        }
//-------------
      else{
        $image=$_FILES['image'];
        $image_name = $image['name'];
        $image_tmp = $image['tmp_name'];
        $image_error = $image['error'];
        $image_size = $image['size'];
         if($image_name !=''){
            $img_exe= explode('.', $image_name );
            $img_exe=strtolower(end($img_exe));
            $allowd=array('png','gif','jpg','jpeg');
            $editname=strtolower($editeuser);
            $editname = str_split($editname, 3);
            if(in_array($img_exe,$allowd)){
              if($image_error === 0){
                if($image_size <= 3200000){
                  $new_name = uniqid($editname[0],false).'.'.$img_exe;
                  $image_dir = '../images/avatar/'.$new_name;
                  $image_db ='images/avatar/'.$new_name;
                  if(move_uploaded_file($image_tmp, $image_dir)){
                      $Password=md5($_POST['pass']);
                      $role=$_POST["role"];
                      $gender=$_POST["gender"];
                      $linkedin= htmlspecialchars($_POST["linkedin"]);
                      $github =htmlspecialchars($_POST["github"]);
                      $facebook=htmlspecialchars($_POST["facebook"]);
                      $about=strip_tags($_POST["about"]);
                      $update = "UPDATE  registrars SET username='$editeuser', useremail ='$editemail', userpass='$Password', gender='$gender', useercomment='$about',avatar='$image_db',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE   user_id= '$id'";
                      $sql=mysqli_query($conn,$update);
                      if (isset($sql)) {
                         $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
                          echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                         }
                      }
                      else{
                         $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                         }
                  }
                  else {
                  $msg= '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> SORRY!! the image size is too large.Enter a smaller of 3MB.  </div>';
                      }
                }
                else{
                   $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                     }
            }
            else{
               $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter  Correct image whith Correct extension (png,gif,jpg,jpeg)  </div>';
              }
        }else{
            $Password=md5($_POST['pass']);
            $role=$_POST["role"];
            $gender=$_POST["gender"];
            $linkedin= htmlspecialchars($_POST["linkedin"]);
            $github =htmlspecialchars($_POST["github"]);
            $facebook=htmlspecialchars($_POST["facebook"]);
            $about=strip_tags($_POST["about"]);

            $sql=mysqli_query($conn,"UPDATE  registrars SET username='$editeuser', useremail ='$editemail', userpass='$Password', gender='$gender', useercomment='$about',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE user_id= '$id'");
             if (isset($sql)) {
                $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
                echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                        }
              }
          }
}else{
   $image=$_FILES['image'];
   $image_name = $image['name'];
   $image_tmp = $image['tmp_name'];
   $image_error = $image['error'];
   $image_size = $image['size'];
   if($image_name !=''){
     $img_exe= explode('.', $image_name );
     $img_exe=strtolower(end($img_exe));
     $allowd=array('png','gif','jpg','jpeg');
     $editname=strtolower($editeuser);
     $editname = str_split($editname, 3);
     if(in_array($img_exe,$allowd)){
        if($image_error === 0){
          if($image_size <= 3200000){
             $new_name = uniqid($editname[0],false).'.'.$img_exe;
            $image_dir = '../images/avatar/'.$new_name;
            $image_db ='images/avatar/'.$new_name;
            if(move_uploaded_file($image_tmp, $image_dir)){
                $role=$_POST["role"];
                $gender=$_POST["gender"];
                $linkedin= htmlspecialchars($_POST["linkedin"]);
                $github =htmlspecialchars($_POST["github"]);
                $facebook=htmlspecialchars($_POST["facebook"]);
                $about=strip_tags($_POST["about"]);
                $update = "UPDATE  registrars SET username='$editeuser', useremail ='$editemail', gender='$gender', useercomment='$about',avatar='$image_db',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE   user_id= '$id'";
                $sql=mysqli_query($conn,$update);
              if (isset($sql)) {
                 $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
                 echo '<meta http-equiv="refresh" content="3 ;users.php" />';
                 }
                }
              else{
                 $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
                 }
            }
            else {
               $msg= '<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> SORRY!! the image size is too large.Enter a smaller of 3MB.  </div>';
                 }
          }
          else{
            $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i>  SORRY!! an unexpected error occurred except loading the image.  </div>';
             }
       }
      else{
          $msg='<div class="alert alert-danger" role="alert" ><i class="fa fa-bell-o" aria-hidden="true"></i> PLEASE!! enter  Correct image whith Correct extension (png,gif,jpg,jpeg)  </div>';
        }
}else{
    $role=$_POST["role"];
    $gender=$_POST["gender"];
    $linkedin= htmlspecialchars($_POST["linkedin"]);
    $github =htmlspecialchars($_POST["github"]);
    $facebook=htmlspecialchars($_POST["facebook"]);
    $about=strip_tags($_POST["about"]);

    $sql=mysqli_query($conn,"UPDATE  registrars SET username='$editeuser', useremail ='$editemail', gender='$gender', useercomment='$about',linkedin='$linkedin', github='$github', facebook='$facebook', role='$role' WHERE user_id= '$id'");
     if (isset($sql)) {
       $msg='<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> eddited  successfully.</div>';
       echo '<meta http-equiv="refresh" content="3 ;users.php" />';
      }
    }
 }
 }
}
}
$getuser=mysqli_query($conn ,"SELECT * FROM registrars WHERE user_id ='$id'");
$user=mysqli_fetch_assoc($getuser);
?>
<article class="col-lg-9">
  <div class="col-lg-12">
    <div class="row">
      <ol class="breadcrumb" style="margin-bottom: 5px;">
        <li><a href="index.php">home</a></li>
        <li><a href="users.php">users</a></li>
        <li>edit user </li>
        
        
      </ol>
    </div>
  </div>
  <div  style="text-align: center;"><?php echo $msg; ?>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading" style="text-align: center; font-size:160%;"><strong>Edit user <?php echo ucwords($user['username']);?></strong></div>
    <div class="panel-body">
      <form  action="" method="post"  class="form-horizontal col-md-9"  enctype="multipart/form-data">
        <div class="form-group">
          <label for="username" class="col-sm-2 control-label">new name </label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="username"  name="name" value="<?php echo $user['username'];?>" >
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">new email </label>
          <div class="col-sm-6">
            <input type="email" class="form-control" value="<?php echo $user['useremail'];?>"  name="email" id="email" >
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-sm-2 control-label">new password </label>
          <div class="col-sm-6">
            <input type="password"  class="form-control" name="pass"  id="password" placeholder="inter new your Password" >
          </div>
        </div>
        <div class="form-group">
          <label for="con-pass" class="col-sm-2 control-label">Confirm password </label>
          <div class="col-sm-6">
            <input type="password" class="form-control" name="con_pass" id="con-pass" placeholder="confirm new Password" >
          </div>
        </div>
        <div class="form-group">
          <label for="gender" class="col-sm-2 control-label">edite gender </label>
          <div class="col-sm-6">
            <select   name="gender" class="form-control" id="gender" >
              <option value="">Gender</option>
              <option value="female" <?php echo ($user['gender']=="female" ?'selected':'');?>>Female</option>
              <option value="male" <?php echo ($user['gender']=="male" ?'selected':'');?>>Male</option>
              <option value="other" <?php echo  ($user['gender']=="other" ?'selected':'');?> >Other</option>
            </select>
          </div>
        </div>
        <!-----FILES---INPUT------------------->
        <div class="form-group">
          <label for="image" class="col-sm-2 control-label">new image</label>
          <div class="col-sm-9">
            <input type="file" name="image" class="form-control"  id="image" >
          </div>
        </div>
        <div class="form-group">
          <label for="linkedin" class="col-sm-2 control-label"><i class="fa fa-linkedin fa-lg" aria-hidden="true" style="margin: 0px 5px;
          color:hsl(201, 100%, 35%);"></i></label>
          <div class="col-sm-9">
            <input type="text" name="linkedin" class="form-control" value="<?php echo $user['linkedin'];?>" id="linkedin" >
          </div>
        </div>
        <div class="form-group">
          <label for="github" class="col-sm-2 control-label"><i class="fa fa-github fa-lg" aria-hidden="true" style="margin: 0px 5px;
          color:#24292e;" ></i></label>
          <div class="col-sm-9">
            <input type="text" name="github" class="form-control" value="<?php echo $user['github'];?>"  id="github"  >
          </div>
        </div>
        <div class="form-group">
          <label for="facebook" class="col-sm-2 control-label"><i class="fa fa-facebook fa-lg" aria-hidden="true" style="margin: 0px 5px;
          color:#3d5b99;" ></i></label>
          <div class="col-sm-9">
            <input type="text" name="facebook" class="form-control" value="<?php echo $user['facebook'];?>"  id="facebook"  >
          </div>
        </div>
        <div class="form-group ">
          <label for="comment" class="col-sm-2 control-label" >new comment</label>
          <div class="col-sm-9">
          <textarea name="about" class="form-control" id="comment" rows="4"><?php echo $user['useercomment'];?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="role" class="col-sm-2 control-label">edite role </label>
          <div class="col-sm-6">
            <select   name="role" class="form-control" id="role" >
              <option value="">role</option>
              <option value="user" <?php echo ($user['role']=="user" ?'selected':'');?>>user</option>
              <option value="admin" <?php echo ($user['role']=="admin" ?'selected':'');?>>admin</option>
              <option value="
              writer" <?php echo  ($user['role']=="writer" ?'selected':'');?> >writer</option>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-9">
            <button  name="submit" type="submit" class="btn btn-danger btn-block"><i class="fa fa-floppy-o" aria-hidden="true"></i> Seve edits </button>
          </div>
        </div>
      </form>
      <div class="panel panel-default col-md-3" style="border-radius: 50%;">
        <div class="panel-body ">
          <img src="../<?php echo $user['avatar'];?>" width="100%" class="img-circle"  />
        </div>
      </div>      </div>
    </div>
  </article>
  <?php
  include("inc/footer.php");
  ?>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->