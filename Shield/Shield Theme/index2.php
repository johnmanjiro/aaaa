<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Twitterlogin.php');

$twitterLogin = new MyApp\TwitterLogin();

if ($twitterLogin->isLoggedIn()) {
  $me = $_SESSION['me'];
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SHIELD - Free Bootstrap 3 Theme">
    <meta name="author" content="Carlos Alvarez - Alvarez.is - blacktie.co">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title> SHIELD - Free Bootstrap 3 Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link href="assets/css/animate-custom.css" rel="stylesheet">


    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    
    <script src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">
  
  
  	<div id="navbar-main">
      <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href="#home"><span class="icon icon-shield" style="font-size:18px; color:#3498db;"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#home" class="smoothScroll">Home</a></li>
			<li> <a href="#about" class="smoothScroll"> About</a></li>
			<!--<li> <a href="#services" class="smoothScroll"> Services</a></li>-->
			<!--<li> <a href="#team" class="smoothScroll"> Team</a></li>-->
			<!--<li> <a href="#portfolio" class="smoothScroll"> Portfolio</a></li>-->
			<!--<li> <a href="#blog" class="smoothScroll"> Blog</a></li>-->
			<!--<li> <a href="#contact" class="smoothScroll"> Contact</a></li>-->
        </div><!--/.nav-collapse -->
      </div>
    </div>
    </div>

  
  
		<!-- ==== HEADERWRAP ==== -->
	    <div id="headerwrap" id="home" name="home">
			<header class="clearfix">
	  		 		<h1><span class="icon icon-shield"></span></h1>
	  		 		<p>もう一度話しませんか</p>
	  		 		<p>Exclusive for BlackTie.co.</p>
	  		 		<div id="login">
	  		 			<div id="container">
	  		 				<?php if ($twitterLogin->isLoggedIn()) : ?>
                                <form action="logout.php" method="post" id="logout">
      <input type="submit" value="Log Out">
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    </form>
                           <h2>@<?= h($me->tw_screen_name); ?>'s Timeline</h2>
	  		 		   <?php else : ?>
                       <h2>ログイン</h2>
                      <a href="login.php"><img src="signin_button.png"></a>
                      <style>
  /* #container {*/
  /*  width: 500px;*/
  /*  margin: 0 auto;*/
  /*}*/
  /*h2 {*/
  /*  font-size: 18px;*/
  /*  border-bottom: 1px solid #ccc;*/
  /*  padding: 3px 0;*/
  /*}*/
  #login {
    text-align: center;
    margin: 70px auto;
  }
  #logout {
    float: right;
  }
  </style>
  <?php endif; ?>
                    </div>
                    </div>
	  		</header>	    
	    </div><!-- /headerwrap -->

		<!-- ==== GREYWRAP ==== -->
		<div id="greywrap">
			<div class="row">
				<div class="col-lg-4 callout">
					<span class="icon icon-stack"></span>
					<h2>Bootstrap 3</h2>
					<p>Shield Theme is powered by Bootstrap 3. The incredible Mobile First Framework is the best option to run your website. </p>
				</div><!-- col-lg-4 -->
					
				<div class="col-lg-4 callout">
					<span class="icon icon-eye"></span>
					<h2>Retina Ready</h2>
					<p>You can use this theme with your iPhone, iPad or MacBook Pro. This theme is retina ready and that is awesome. </p>
				</div><!-- col-lg-4 -->	
				
				<div class="col-lg-4 callout">
					<span class="icon icon-heart"></span>
					<h2>Crafted with Love</h2>
					<p>We don't make sites, we craft themes with love & passion. That is our most valued secret. We only do thing that we love.   </p>
				</div><!-- col-lg-4 -->	
			</div><!-- row -->
		</div><!-- greywrap -->
		
	
		
		<!--<div class="container" id="contact" name="contact">-->
		<!--	<div class="row">-->
		<!--	<br>-->
		<!--		<h1 class="centered">THANKS FOR VISITING US</h1>-->
		<!--		<hr>-->
		<!--		<br>-->
		<!--		<br>-->
		<!--		<div class="col-lg-4">-->
		<!--			<h3>Contact Information</h3>-->
		<!--			<p><span class="icon icon-home"></span> Some Address 987, NY<br/>-->
		<!--				<span class="icon icon-phone"></span> +34 9884 4893 <br/>-->
		<!--				<span class="icon icon-mobile"></span> +34 59855 9853 <br/>-->
		<!--				<span class="icon icon-envelop"></span> <a href="#"> agency@blacktie.co</a> <br/>-->
		<!--				<span class="icon icon-twitter"></span> <a href="#"> @blacktie_co </a> <br/>-->
		<!--				<span class="icon icon-facebook"></span> <a href="#"> BlackTie Agency </a> <br/>-->
		<!--			</p>-->
		<!--		</div><!-- col -->
				
		<!--		<div class="col-lg-4">-->
		<!--			<h3>Newsletter</h3>-->
		<!--			<p>Register to our newsletter and be updated with the latests information regarding our services, offers and much more.</p>-->
		<!--			<p>-->
		<!--				<form class="form-horizontal" role="form">-->
		<!--				  <div class="form-group">-->
		<!--				    <label for="inputEmail1" class="col-lg-4 control-label"></label>-->
		<!--				    <div class="col-lg-10">-->
		<!--				      <input type="email" class="form-control" id="inputEmail1" placeholder="Email">-->
		<!--				    </div>-->
		<!--				  </div>-->
		<!--				  <div class="form-group">-->
		<!--				    <label for="text1" class="col-lg-4 control-label"></label>-->
		<!--				    <div class="col-lg-10">-->
		<!--				      <input type="text" class="form-control" id="text1" placeholder="Your Name">-->
		<!--				    </div>-->
		<!--				  </div>-->
		<!--				  <div class="form-group">-->
		<!--				    <div class="col-lg-10">-->
		<!--				      <button type="submit" class="btn btn-success">Sign in</button>-->
		<!--				    </div>-->
		<!--				  </div>-->
		<!--			   </form><!-- form -->
		<!--			</p>-->
		<!--		</div><!-- col -->
				
		<!--		<div class="col-lg-4">-->
		<!--			<h3>Support Us</h3>-->
		<!--			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>-->
		<!--		</div><!-- col -->

		<!--	</div><!-- row -->
		
		<!--</div><!-- container -->

		<div id="footerwrap">
			<div class="container">
				<h4>Created by <a href="http://blacktie.co">BlackTie.co</a> - Copyright 2014</h4>
			</div>
		</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		

	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/retina.js"></script>
	<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="assets/js/jquery-func.js"></script>
  </body>
</html>
