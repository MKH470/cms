<?php
include("include/header.php");
$msg='';

$id=$_GET['user'];
$getuser=mysqli_query($conn ,"SELECT * FROM registrars WHERE user_id ='$id'");

if(mysqli_num_rows($getuser) !=1 AND $_SESSION['id'] !=
$id){
header("location: index.php");
}
$user=mysqli_fetch_assoc($getuser);
?>
          
<section class="container-fluid cotainer" >
      <article class="col-md-9 col-lg-9 " style="margin-top: 30px;" >
    <div class="col-md-10">
      <div class="row">
          <ol class="breadcrumb" >
            <li><a href="index.php">home</a></li>
           
              <li>profile<?php echo ' '.ucwords($user['username']);?></li>
          </ol>
        </div>
    </div>
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="row">
           <div class="panel panel-info">
            <div class="col-sm-12" style="text-align: center;"><?php echo $msg; ?></div>
          <div class="panel-heading" style="text-align: center; font-size:200%;" ><h2>Hallo! <?php echo ' '.ucwords($user['username']);?></h2></div>
            <div class="panel-body">
                <div class="col-md-6">
                  
                  <p style="font-size:150%; "><strong><span style="color:#2f5a77;"> Username:</span> </strong> <?php echo $user['username'] ; ?></p><br/>
                  <p style="font-size:150%; "><strong><span style="color:#2f5a77;">Email:</span></strong> </strong><?php echo $user['useremail'] ; ?></p><br/>
                  <p style="font-size:150%; "><strong><span style="color:#2f5a77;">Gender:</span></strong> <?php echo $user['gender'] ; ?></p><br/>
                  
                  <p style="font-size:150%; "><strong><span style="color:#2f5a77;">Registor date:</span></strong><?php echo $user['reg_date'] ; ?></p><br/>
                  <br/>
                  
                  <br/>
                    
                  <div class="col-md-12"><p style="font-size:200%; color:#2f5a77;"><strong>your profile:</strong></p>
                  <p><?php echo $user['useercomment'] ; ?></p></div>
                  
                  <br/>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                  <img src="<?php echo $user['avatar'] ; ?>" width="100%"  class="img-thumbnail"/>
                  <br/>
                  <br/>
                  
                    
                </div>
                <div class="col-md-12">
                  <hr/>
                   <p style="float: left; ">
                    <a href="<?php echo $user['linkedin'] ; ?>"   target="_blank" style="margin: 0px 20px;
                      color:hsl(201, 100%, 35%);" >  <i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
                    <a href="<?php echo $user['github'] ; ?>"  target="_blank" style="margin: 0px 20px;
                      color:#24292e;">  <i class="fa fa-github-square fa-3x" aria-hidden="true"></i></a>
                    <a href="<?php echo $user['facebook'] ; ?>"  target="_blank" style="margin: 0px 20px;
                      color:#3d5b99;">  <i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                  </p>
                  <?php
                if(isset($_SESSION['id'])){
                if ($user['user_id']==$_SESSION['id']) {
                echo '<a href="edite_user.php?user='.$user['user_id'].'" class="btn btn-danger pull-right btn-lg active ">Edit profile data</a>';
                }}
               
                ?>
                  
                </div>
            </div>
      </div>

        </div>
        
      </div>
      
  </article>
  </section>
      <?php
        include("include/footer.php");
      ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        
    
           