<?php
include("inc/hearder.php");
include("inc/aside.php");
$msg='';
if($_SESSION['role'] != 'admin'){
  header("location:index.php");
}
if(isset($_POST['submit'])){
                $title=$_POST['title'];
                $slide=$_POST['slide'];
                $slide_value=$_POST['slide_value'];
                $chaptera=$_POST['chaptera'];
                $chaptera_value=$_POST['chaptera_value'];
                $chapterb=$_POST['chapterb'];
                $chapterb_value=$_POST['chapterb_value'];
                $taba=$_POST['taba'];
                $taba_value=$_POST['taba_value'];
                $tabb=$_POST['tabb'];
                $tabb_value=$_POST['tabb_value'];
                $tabc=$_POST['tabc'];
                $tabc_value=$_POST['tabc_value'];
                $facebook=$_POST['facebook'];
                $google=$_POST['google'];      
                $twitter=$_POST['twitter'];
                $instagram=$_POST['instagram'];
  $sql=mysqli_query($conn,"SELECT * FROM setting");
    if(mysqli_num_rows($sql) !=1){
        $image = $_FILES["logo"];
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
                 $new_name = uniqid('logo',false).'.'.$image_exe;
                 $image_dir = '../images/logo/'.$new_name;
                 $image_db ='images/logo/'.$new_name;
               if(move_uploaded_file($image_tmp, $image_dir)){
    
           $insert="INSERT INTO setting (
                      title,
                      logo,
                      slide,
                      slide_value,
                      chaptera,
                      chaptera_value,
                      chapterb,
                      chapterb_value,
                      taba,
                      taba_value,
                      tabb,
                      tabb_value,
                      tabc,
                      tabc_value,
                      facebook,
                      google,
                      twitter,
                      instagram)
                      VALUES(
                      '$title',
                      '$image_db',
                      '$slide',
                      '$slide_value',
                      '$chaptera',
                      '$chaptera_value',
                      '$chapterb',
                      '$chapterb_value',
                      '$taba',
                      '$taba_value',
                      '$tabb',
                      '$tabb_value',
                      '$tabc',
                      '$tabc_value',
                      '$facebook',
                      '$google',
                      '$twitter',
                      '$instagram'
                    )";   
                    $query=mysqli_query($conn,$insert);
                    if(isset($query)){
                        $msg= '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> Settings successfully updated.</div>';
                         echo '<meta http-equiv="refresh" content="2 ;setting.php" />';
                     } 

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
   else{
      //---------logo===''------------
                

           $insert="INSERT INTO setting (
                      title,
                      slide,
                      slide_value,
                      chaptera,
                      chaptera_value,
                      chapterb,
                      chapterb_value,
                      taba,
                      taba_value,
                      tabb,
                      tabb_value,
                      tabc,
                      tabc_value,
                      facebook,
                      google,
                      twitter,
                      instagram)
                      VALUES(
                      '$title',
                      '$slide',
                      '$slide_value',
                      '$chaptera',
                      '$chaptera_value',
                      '$chapterb',
                      '$chapterb_value',
                      '$taba',
                      '$taba_value',
                      '$tabb',
                      '$tabb_value',
                      '$tabc',
                      '$tabc_value',
                      '$facebook',
                      '$google',
                      '$twitter',
                      '$instagram'
                    )";   
                    $query=mysqli_query($conn,$insert);
                    if(isset($query)){
                        $msg= '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> Settings successfully updated.</div>';
                         echo '<meta http-equiv="refresh" content="2 ;setting.php" />';
              }
   }



  }
  else{
    //update
     $image = $_FILES["logo"];
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
                 $new_name = uniqid('logo',false).'.'.$image_exe;
                 $image_dir = '../images/logo/'.$new_name;
                 $image_db ='images/logo/'.$new_name;
               if(move_uploaded_file($image_tmp, $image_dir)){
    
           $insert="UPDATE setting SET 
                      title='$title',
                      logo='$image_db',
                      slide='$slide',
                      slide_value='$slide_value',
                      chaptera='$chaptera',
                      chaptera_value='$chaptera_value',
                      chapterb='$chapterb',
                      chapterb_value='$chapterb_value',
                      taba='$taba',
                      taba_value='$taba_value',
                      tabb='$tabb',
                      tabb_value='$tabb_value',
                      tabc='$tabc',
                      tabc_value='$tabc_value',
                      facebook='$facebook',
                      google='$google',
                      twitter='$twitter',
                      instagram='$instagram'
                      ";   
                    $query=mysqli_query($conn,$insert);
                    if(isset($query)){
                        $msg= '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> Settings successfully updated.</div>';
                          echo '<meta http-equiv="refresh" content="2 ;setting.php" />';
                     } 

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
   else{
      //---------logo===''------------
                

           $insert="UPDATE setting SET 
                      title='$title',
                      slide='$slide',
                      slide_value='$slide_value',
                      chaptera='$chaptera',
                      chaptera_value='$chaptera_value',
                      chapterb='$chapterb',
                      chapterb_value='$chapterb_value',
                      taba='$taba',
                      taba_value='$taba_value',
                      tabb='$tabb',
                      tabb_value='$tabb_value',
                      tabc='$tabc',
                      tabc_value='$tabc_value',
                      facebook='$facebook',
                      google='$google',
                      twitter='$twitter',
                      instagram='$instagram'
                      ";   
                    $query=mysqli_query($conn,$insert);
                    if(isset($query)){
                        $msg= '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> Settings successfully updated.</div>';
                         echo '<meta http-equiv="refresh" content="2 ;setting.php" />';
              }
   }

  }
  }
$select=mysqli_query($conn,"SELECT * FROM setting");
$setting=mysqli_fetch_assoc($select);

function category($x){
  global $conn;
  $select="SELECT * FROM category";
  $category=mysqli_query($conn,$select);         
    while ( $cate = mysqli_fetch_assoc($category)) {
      echo '<option value="'.$cate['cate_name'].'"'.($x==$cate['cate_name']?'selected' : '').'>'.$cate['cate_name'].'</option>' ;
    }               

}
?>

<article class="col-lg-9">
  <div class="col-lg-12">
    <div class="row">
      <ol class="breadcrumb" style="margin-bottom: 5px;">
        <li><a href="index.php">home</a></li>
        <li>setting</li>
      </ol>
    </div>
  </div>
  <div  style="text-align: center;"><?php echo $msg; ?>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading" style="text-align: center; font-size: 30px;"><i class="fa fa-cog" aria-hidden="true"></i> <strong> Site setting</strong></div>
    <div class="panel-body">
      <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">title</label>
          <div class="col-sm-6">
            <input type="text" name="title" class="form-control" id="title" value="<?php echo ($setting['title']==''?'' : $setting['title']); ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="logo" class="col-sm-2 control-label">logo</label>
          <div class="col-sm-6">
            <input type="file" name="logo" class="form-control" id="logo">
          </div>
        </div>
         <div class="form-group">
          <label for="slide" class="col-sm-2 control-label">slide</label>
          <div class="col-sm-3">
            <select class="form-control" name="slide" id="slide" >
              <option value="">select category</option>
              <?php category($setting['slide']); ?>
 
            </select>
          </div>
          <label for="slide_value" class="col-sm-2 control-label">the number</label>
          <div class="col-sm-1">
            <input type="number" name="slide_value" class="form-control" id="slide_value" min="3" max="9" value="<?php echo ($setting['slide_value']==''?'3' : $setting['slide_value']); ?>">
          </div>
        </div>
        
        <div class="form-group">
          <label for="chaptera" class="col-sm-2 control-label">chapter_1</label>
          <div class="col-sm-3">
            <select class="form-control" name="chaptera" id="chaptera">
              <option value="">select category</option>
              <?php category($setting['chaptera']); ?>
 
            </select>
          </div>
          <label for="chaptera_value" class="col-sm-2 control-label">the number</label>
          <div class="col-sm-1">
            <input type="number" name="chaptera_value" class="form-control" id="chaptera_value" min="3" max="9" value="<?php echo ($setting['chaptera_value']==''?'3' : $setting['chaptera_value']); ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="chapterb" class="col-sm-2 control-label">chapter_2</label>
          <div class="col-sm-3">
            <select class="form-control" name="chapterb" id="chapterb">
              <option value="">select category</option>
              <?php category($setting['chapterb']); ?>
 
            </select>
          </div>
          <label for="chapterb_value" class="col-sm-2 control-label">the number</label>
          <div class="col-sm-1">
            <input type="number" name="chapterb_value" class="form-control" id="chapterb_value" min="3" max="9" value="<?php echo ($setting['chaptera_value']==''?'3' : $setting['chapterb_value']); ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="taba" class="col-sm-2 control-label">tab_1</label>
          <div class="col-sm-3">
            <select class="form-control" name="taba" id="taba">
              <option value="">select category</option>
              <?php category($setting['taba']); ?>
 
            </select>
          </div>
          <label for="taba_value" class="col-sm-2 control-label">the number</label>
          <div class="col-sm-1">
            <input type="number" name="taba_value" class="form-control" id="taba_value" min="3" max="9" value="<?php echo ($setting['taba_value']==''?'3' : $setting['taba_value']);?>">
          </div>
        </div>
        <div class="form-group">
          <label for="tabb" class="col-sm-2 control-label">tab_2</label>
          <div class="col-sm-3">
            <select class="form-control" name="tabb" id="tabb">
              <option value="">select category</option>
              <?php category($setting['tabb']); ?>
 
            </select>
          </div>
          <label for="tabb_value" class="col-sm-2 control-label">the number</label>
          <div class="col-sm-1">
            <input type="number" name="tabb_value" class="form-control" id="tabb_value" min="3" max="9"  value="<?php echo ($setting['tabb_value']==''?'3' : $setting['tabb_value']);?>">
          </div>
        </div>
        <div class="form-group">
          <label for="tabc" class="col-sm-2 control-label">tab_3</label>
          <div class="col-sm-3">
            <select class="form-control" name="tabc" id="tabc">
              <option value="">select category</option>
              <?php category($setting['tabc']); ?>
 
            </select>
          </div>
          <label for="tabc_value" class="col-sm-2 control-label">the number</label>
          <div class="col-sm-1">
            <input type="number" name="tabc_value" class="form-control" id="tabc_value" min="3" max="9" value="<?php echo ($setting['tabc_value']==''?'3' : $setting['tabc_value']);?>">
          </div>
        </div>
        
        
        <div class="form-group">
          <label for="facebook" class="col-sm-2 control-label">facebook</label>
          <div class="col-sm-6">
            <input type="text" name="facebook" class="form-control" id="facebook" value="<?php echo ($setting['facebook']==''?'' : $setting['facebook']);?>">
          </div>
        </div>
       <div class="form-group">
          <label for="google" class="col-sm-2 control-label">+google</label>
          <div class="col-sm-6">
            <input type="text" name="google" class="form-control" id="google" value="<?php echo ($setting['google']==''?'' : $setting['google']);?>">
          </div>
        </div>
        <div class="form-group">
          <label for="twitter" class="col-sm-2 control-label">twitter</label>
          <div class="col-sm-6">
            <input type="twitter" name="twitter" class="form-control" id="twitter" value="<?php echo ($setting['twitter']==''?'' : $setting['twitter']);?>">
          </div>
        </div>
        <div class="form-group">
          <label for="instagram" class="col-sm-2 control-label">instagram</label>
          <div class="col-sm-6">
            <input type="text" name="instagram" class="form-control" id="instagram" value="<?php echo ($setting['instagram']==''?'' : $setting['instagram']);?>">
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-6  ">
            <button class="btn btn-primary btn-block" name="submit" type="submit" class="btn btn-default">Update settings</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</article>
<?php
include("inc/footer.php");
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->