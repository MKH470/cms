<?php
include("session.php");
?>
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>admin page</title>
    <!-- Bootstrap -->
    
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    
  </head>
  <body>
    <nav class=" navbar navbar-inverse" style="  background: #881c34; height: 60px; padding: 5px; color: #FFF; font-weight: bold; ">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          
          <a  class="navbar-brand" href="../index.php" ><i class="fa fa-home" aria-hidden="true" style="color: #fff;"></i> Home</a>
          <a class="navbar-brand" href="index.php" ><li class="glyphicon glyphicon-dashboard" style="color: #fff;"></li> Control</a>
          
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown" >
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true" style="color: #fff;"></i> Settings <span class="caret"></span></a>
              <ul class="dropdown-menu" style=" text-align: center;">
                <li><a href="profile.php">profile</a></li>
                <li><a href="../logout.php?id=<?php echo $_SESSION['id'];?>"><i class="fa fa-sign-out" aria-hidden="true"></i> sign out</a></li>
                
                
              </ul>
            </li>
          </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        <?php echo " <a href='../index.php'>
            <img src='../images/logo.png' width='80px' lang='80px' style='margin-top:20px;margin-left:20px;'/>
          </a>
         
        <h1 style='color:#fff;text-align:center; margin-top:-50px;'><i class='fa fa-handshake-o' aria-hidden='true'></i> Hello ". ucwords($_SESSION['user']).' !!'."</h1> ";?>
        <section class="container-fluid" style="margin-top: 30px;">
          <div class="row">