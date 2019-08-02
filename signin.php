<?php
session_start();
include ("include/config.php");
include ("include/fonction.php");
$sel_setting=mysqli_query($conn,"SELECT * FROM setting");
$setting=mysqli_fetch_assoc($sel_setting);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $setting['title']?></title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
    <style >
      .carousel-caption{
  position:absolute;
  z-index:10;
  margin:100px 150px 100px -50px;
  padding:5px;
  color:#fff;
  text-shadow:0px 1px 2px rbga(0,0,0,0.6);
  right:0px;
text-align:justify;
background:rbga(0,0,0,0.6);
}
.carousel_h3{
  position:absolute;
  top:-100px;
  text-align: center;
  width:100%;
  padding:0px;
  font-size:50px;
  font-weight: bold;
  color:#eee;
  text-shadow:0px 1px 2px rbga(0,0,0,0.6);
  
}
.carousel_h3 a{
  color:#f5f5f5;}

.carousel_h3 a:hover{
  text-decoration:none;
  color:#f18458;
   
}




    </style>
  </head>
  <body style="background-color:#3a0310;">
    <nav class="navbar navbar-inverse" id='logo' style="  background: #881c34; height: 60px; padding: 5px; color: #FFFAFA; font-weight: bold;">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a href="index.php">
            <img src="<?php echo $setting['logo']?>" width="50px" lang="50px" />
          </a>
        </div>
        <!----------->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <?php
          if(isset($_SESSION['id'])){?>
          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars fa-lg" aria-hidden="true"></i>&nbsp; <span class="caret"></span></a>
              <ul class="dropdown-menu" style=" text-align: left;">
                <li><a href="profile.php?user=<?php echo $_SESSION['id'];?>"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a></li>
                <?php
                if ($_SESSION['role']=='admin' OR $_SESSION['role']== 'writer') {
                echo '<li><a href="admin-cp/index.php"><li class="glyphicon glyphicon-dashboard"></li> Control panel</a></li>';
                }
                ?>
                <li><a href="logout.php?id=<?php echo $_SESSION['id'];?>"><i class="fa fa-sign-out" aria-hidden="true"></i> sign out</a></li>
              </ul>
            </li>
          </ul>
          <?php }
          else {?>
          <ul class="nav navbar-nav navbar-left" style ="font-size: 18px;">
            <li><a href="signin.php"> Signin</a>
          </li>
        </ul>
        <?php }?>
        <ul class="nav navbar-nav" style ="font-size: 18px;">
          <li ><a href="index.php"><i class="fa fa-home fa-fw fa-lg" aria-hidden="true"></i>&nbsp; Home<span class="sr-only">(current)</span></a></li>
          <?php
           $query="SELECT *FROM category";
           $sql=mysqli_query($conn,$query);
           
           while ($cate=mysqli_fetch_assoc($sql)) {
             echo '<li><a href="category.php?cate='.$cate['cate_name'].'">'.$cate['cate_name'].'</a></li>';
            $cate++;
           }

          ?>
          
        </ul>
        
        
        <form class="form-inline my-2 my-lg-0" style="float: right;padding: 10px;">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success my-2 my-sm-0 " type="submit">Search</button>
        </form>
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      
      <aside class="col-md-3 clo-lg-3 sid_bg" style='margin-top:30px; background-color:#3a0310;' >
        
         <div class="col-md-12  mediadiv" >
          <div class="row">
            <a href="https://redevelop.online/" target="_blank"> <img src="images/redevelop.jpg" width="100%"  style="margin-left: -10px; padding: 15px;" /></a>
            <p class="mediap" >We are a local group of dedicated teachers and ambassadors from Groningen. We help refugees and minorities get ready for a future as developer. Its our mission to help refugees and minorities get ready for a great future in the tech industry of Groningen. We envision a future of opportunity where every refugee can be of great value to the tech industry of Groningen.</p>
          </div>
          
        </div>
        
        
        <!--------------------------media----------------------------------->
        <div class="col-md-12  mediadiv" >
          <div class="row">
            <a href="https://redevelop.online/" target="_blank"> <img src="images/redevelop.jpg" width="100%"  style="margin-left: -10px; padding: 15px;" /></a>
            <p class="mediap" >We are a local group of dedicated teachers and ambassadors from Groningen. We help refugees and minorities get ready for a future as developer. Its our mission to help refugees and minorities get ready for a great future in the tech industry of Groningen. We envision a future of opportunity where every refugee can be of great value to the tech industry of Groningen.</p>
          </div>
          
        </div>
        <div class="col-md-12 mediadiv" >
          <div class="row">
           <a href="https://redevelop.online/" target="_blank"> <img src="images/redevelop.jpg" width="100%"  style="margin-left: -10px; padding: 15px;" /></a>
            <p class="mediap" >We are a local group of dedicated teachers and ambassadors from Groningen. We help refugees and minorities get ready for a future as developer. Its our mission to help refugees and minorities get ready for a great future in the tech industry of Groningen. We envision a future of opportunity where every refugee can be of great value to the tech industry of Groningen.</p>
          </div>
          
        
          
        </div>
        
        
        <!--------------------------media----------------------------------->
      </aside>
      <section class="container-fluid cotainer" style='margin-top:30px;'>
      <article class="col-md-9 col-lg-9 art_bg" style='margin-top:30px; background-color:#3a0310;'>
        <div class="col-lg-12">
          <div class="row">

            <ol class="breadcrumb" style="background: #c2babc;">
        <li><a href="index.php"><strong>Home</strong></a></li>
        
        <li><stong>login</stong></li>
        
        </ol>
          </div>
        </div>
      
      <div class="col-md-12"></div>
      <div class="col-md-12"></div>
      <div class="col-md-12" >
          <div class="row">
            
            <?php 

            inlog_are();

            ?>
          </div>
          
        </div>
        
     

      
        <div class="col-md-10 " style="text-align: center;">
           <a href='index.php'>
            <img src="images/logo.png" width='300px' lang='300px' style=' margin-top:50px; '/>
          </a>
        </div>
  
      </article>
      
      </section>


      <?php

      include("include/footer.php");

      ?>
