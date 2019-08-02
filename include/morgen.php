<?Php


header("location: ../post.php?id=$post");

<div class="panel panel-default"  >
                <div class="panel-heading text-center"><i class="fa fa-handshake-o" aria-hidden="true"></i> <strong>Welcome! </strong><?php echo $_SESSION['user'] ;?></div>
                <div class="panel-body">
                  <div class="text-center" style="margin-bottom: 20px;">
                    <hr/>
                    <img src="<?php echo $_SESSION['avatar'];?>" width="85px" />
                    <p style="text-align: center; margin-top: 10px; ">  <?php echo'<strong>'. $_SESSION['user'].'</strong>';?><br/>
                       <?php echo $_SESSION['mail'];?>
                    </p>
                    
                  </div>
                  <hr/>
                  <div class="col-md-12">
                    <div class="row">
                      
                      <p style="text-align: center; margin:0px 5px ;  ">
                        <a href=""   target="_blank" style="margin: 0px 5px;
                        color:hsl(201, 100%, 35%);" >  <i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
                        <a href=""  target="_blank" style="margin: 0px 5px;
                        color:#24292e;">  <i class="fa fa-github-square fa-3x" aria-hidden="true"></i></a>
                        <a href=""  target="_blank" style="margin: 0px 5px;
                        color:#3d5b99;">  <i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="panel-footer">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-6">
                       
                        <a href="" class="btn btn-success btn-sm pull-left"> <i class="fa fa-user-md" aria-hidden="true"></i> my profil</a>
                      </div>
                      <div class="col-md-6">
                        
                        <a href="" class="btn btn-danger btn-sm pull-right"> <i class="fa fa-cog" aria-hidden="true"></i> settings</a>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>

?>



<!-----------------form ------------- register--------------

	echo '<form id="account"  action="include/registor.php" method="post"  class="form-horizontal"  enctype="multipart/form-data">
      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">User Name<span style="color: red;">*</span></label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="username"  name="name" placeholder="Enter your User Name" >
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email<span style="color: red;">*</span></label>
        <div class="col-sm-6">
          <input type="email" class="form-control"  name="email" id="email" placeholder="Exzample@domain.com" >
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password<span style="color: red;">*</span></label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="pass" id="password" placeholder="Enter your Password" >
        </div>
      </div>
      <div class="form-group">
        <label for="con-pass" class="col-sm-2 control-label">Confirm Password<span style="color: red;">*</span></label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="con_pass" id="con-pass" placeholder="Enter confirm Password" >
        </div>
      </div>
      <div class="form-group">
        <label for="gender" class="col-sm-2 control-label">Gender</label>
        <div class="col-sm-6">
          <select   name="gender" class="form-control" id="gender" >
            <option value="">Gender</option>
          	 <option value="female"v>Female</option>
             <option value="male"v>Male</option>
             <option value="other"v>Other</option>
          </select>
        </div>  
      </div>
      ---FILES---INPUT-----------
      <div class="form-group">
        <label for="image" class="col-sm-2 control-label">Youre image</label>
        <div class="col-sm-6">
          <input type="file" name="image" class="form-control"  id="image" >

        </div>
      </div>

      <div class="form-group">
        <label for="linkedin" class="col-sm-2 control-label"><i class="fa fa-linkedin " aria-hidden="true" ></i></label>
        <div class="col-sm-6">
          <input type="text" name="linkedin" class="form-control"  id="linkedin" placeholder="Enter your linkedIn" >
        </div>
      </div>
      
      
      
      <div class="form-group">
        <label for="github" class="col-sm-2 control-label"><i class="fa fa-github " aria-hidden="true" ></i></label>
        <div class="col-sm-6">
          <input type="text" name="github" class="form-control"  id="github" placeholder="Enter your github" >
        </div>
      </div>
      <div class="form-group">
        <label for="facebook" class="col-sm-2 control-label"><i class="fa fa-facebook " aria-hidden="true" ></i></label>
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

      ---------------------------
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
---------------------------رابط الصىرلايت
      http://placehold.it/1200x400/dddddd/333333
	---------------------------->
