<?php
function registor(){
  if (isset($_SESSION['user'])) {
    echo '<div class="alert alert-danger" role="alert" style="text-align: center; "><i class="fa fa-bell-o" aria-hidden="true"></i> '.'<strong>'.$_SESSION['user'].'</strong>' .' you are already registered </div>'.'<br/>';

  }
  else{
    echo '<form id="account"  action="include/registor.php" method="post"  class="form-horizontal"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">User Name <span style="color: red;"> *</span></label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="username"  name="name" placeholder="Enter your User Name" >
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email <span style="color: red;"> *</span></label>
    <div class="col-sm-6">
      <input type="email" class="form-control"  name="email" id="email" placeholder="Exzample@domain.com" >
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password <span style="color: red;"> *</span></label>
    <div class="col-sm-6">
      <input type="password" class="form-control" name="pass" id="password" placeholder="Enter your Password" >
    </div>
  </div>
  <div class="form-group">
    <label for="con-pass" class="col-sm-2 control-label">Confirm Password <span style="color: red;"> *</span></label>
    <div class="col-sm-6">
      <input type="password" class="form-control" name="con_pass" id="con-pass" placeholder="Enter confirm Password" >
    </div>
  </div>
  <div class="form-group">
    <label for="gender" class="col-sm-2 control-label">Gender <span style="color: red;"> *</span></label>
    <div class="col-sm-6">
      <select   name="gender" class="form-control" id="gender" >
        <option value="">Gender</option>
          <option value="female">Female</option>
        <option value="male">Male</option>
        <option value="other">Other</option>
      </select>
    </div>
  </div>
  <!-----FILES---INPUT------------------->
  <div class="form-group">
    <label for="image" class="col-sm-2 control-label">Youre image</label>
    <div class="col-sm-6">
      <input type="file" name="image" class="form-control"  id="image" >
    </div>
  </div>
  <div class="form-group">
    <label for="linkedin" class="col-sm-2 control-label"><i class="fa fa-linkedin fa-lg" aria-hidden="true" style="margin: 0px 5px;
          color:hsl(201, 100%, 35%);"></i></label>
    <div class="col-sm-6">
      <input type="text" name="linkedin" class="form-control"  id="linkedin" placeholder="Enter your linkedIn" >
    </div>
  </div>
  <div class="form-group">
    <label for="github" class="col-sm-2 control-label"><i class="fa fa-github fa-lg" aria-hidden="true" style="margin: 0px 5px;
          color:#fff;" ></i></label>
    <div class="col-sm-6">
      <input type="text" name="github" class="form-control"  id="github" placeholder="Enter your github" >
    </div>
  </div>
  <div class="form-group">
    <label for="facebook" class="col-sm-2 control-label"><i class="fa fa-facebook fa-lg" aria-hidden="true" style="margin: 0px 5px;
          color:#3d5b99;" ></i></label>
    <div class="col-sm-6">
      <input type="text" name="facebook" class="form-control"  id="facebook" placeholder="Enter your facebook" >
    </div>
  </div>
  <div class="form-group">
    <label for="comment" class="col-sm-2 control-label" >Comment</label>
    <div class="col-sm-6">
      <textarea name="about" class="form-control" id="comment" rows="4"></textarea>
    </div>
  </div>
  <!------------------------------->
  <div class="col-md-2"></div>
  <div class="col-md-6 text-center" >
    <div id="result" >
      
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
      <button  name="submit" type="submit" class="btn btn-danger btn-block"><i class="fa fa-pencil" aria-hidden="true"></i> Create an accont </button>
    </div>
  </div>
</form>';
}
}
function inlog_are(){

if(isset($_SESSION['id'])){
echo '
<div class="panel panel-default" style="background-color:#3a0310;" >
  <div class="panel-heading text-center"><i class="fa fa-handshake-o" aria-hidden="true"></i> <strong>Welcome! </strong> '.ucwords($_SESSION['user']).'</div>
  <div class="panel-body">
    <div class="text-center" style="margin-bottom: 20px;">
      <hr/>
      <img src="'.$_SESSION['avatar'].'" width="85px" />
      <p style="text-align: center; margin-top: 10px; "> <strong>'.ucwords($_SESSION['user']).'</strong><br/>
        '.$_SESSION['mail'].'
      </p>
      
    </div>
    <hr/>
    <div class="col-md-12">
      <div class="row">
        
        <p style="text-align: center; margin:0px 5px ;  ">
          <a href="'.$_SESSION['linkedin'].'"   target="_blank" style="margin: 0px 5px;
          color:hsl(201, 100%, 35%);" >  <i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
          <a href="'.$_SESSION['github'].'"  target="_blank" style="margin: 0px 5px;
          color:#24292e;">  <i class="fa fa-github-square fa-3x" aria-hidden="true"></i></a>
          <a href="'.$_SESSION['facebook'].'"  target="_blank" style="margin: 0px 5px;
          color:#3d5b99;">  <i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
        </p>
      </div>
    </div>
  </div>
    <div class="clearfix"></div>
  
</div>
';
}
else{
echo '<div class="panel panel-default"  >
  <div class="panel-heading text-center"><strong>Sing_In</strong></div>
  <div class="panel-body">
    <form action="include/inlog.php" method="post" id="inlog">
      <div class="form-group row">
        <label for="inlogname" class="col-sm-2 col-form-label text-center"><i class="fa fa-user fa-2x" aria-hidden="true"></i></label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="inlognam" id="inlogname" placeholder="Enter your email">
        </div>
      </div>
      <div class="form-group row">
        <label for="inlogpassw" class="col-sm-2 col-form-label text-center"><i class="fa fa-lock fa-2x" aria-hidden="true"></i></label>
        <div class="col-sm-10">
          <input type="password" name="inlogpass" class="form-control" id="inlogpassw" placeholder="Enter your password">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1"> Remambur me
            <label class="form-check-label text-center" for="gridCheck1">
            </label>
          </div>
        </div>
      </div>
      <div id="inlog_result" style="text-align:center;">
        
      </div>
      <div class="form-group row">
        <div class="col-sm-10 pull-left">
          <button type="submit" name="inlogsubmit" class="btn btn-info">Sign in</button>
        </div>
      </div>
    </form>
  </div>
  <div class="panel-footer"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: red;"></i>  if you are not registered <a href="inloging.php">click here</a></div>
</div>';
}
}
function comments_aria(){
  global $_SESSION;
  global $id;
   if (!isset($_SESSION['id'])) {
    echo "<div style='text-align:center;'><h3>To add comments,please sing in first <small><a href='signin.php' target='_blank'> click here</a></small></h3><p><i class='fa fa-exclamation-triangle' aria-hidden='true' style='color: red;'></i> If you do not already have a registered account<small><a href='inloging.php' target='_blank'> click here</a></small></div>";
    
   }
   else{
    /*-----whith approval---action="comment.php"------whith out approval use-action="comments1.php"--then go to aside.php and edit the href from the Comments---------------comment.php-------whith approval-------*/
     echo '<form action="include/comment.php" method="post" class="form-horizontal" id="comments">
              <div class="form-group" >
                <label for="comment" class="col-sm-2 control-label"></label>
                <div class="col-sm-10" >
                  <textarea  class="form-control" id="comment" name="comment" rows="2"  placeholder="Whrite youe comment."></textarea>
                </div>
              </div>
              <input type="hidden" value="'.$id.'" name="id" />
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div id="com_result"></div>
                  <button type="submit" name="submit" class="btn btn-default  btn-success btn-block "><i class="fa fa-paper-plane" aria-hidden="true"></i> Add the comment</button>
                   
                </div>
              </div>
            </form>'
            ;
   }
}
?>
