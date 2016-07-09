<?php

namespace MyApp;

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Twitterlogin.php');


$twitterLogin = new TwitterLogin();

use Abraham\TwitterOAuth\TwitterOAuth;

if ($twitterLogin->isLoggedIn()) {
  $me = $_SESSION['me'];
}

$screen_name = $me->tw_screen_name;

$connection = new TwitterOAuth(
      CONSUMER_KEY,
      CONSUMER_SECRET,
      $me -> tw_access_token,
      $me -> tw_access_token_secret
      );
  // ユーザ名でユーザ情報を取得
 $user_info = $connection->get('users/show', ['screen_name'=> $screen_name]);    
 
    $user_name = $user_info->name;
    $user_id = $user_info->screen_name;
    $user_img = $user_info->profile_image_url_https;
    $user_follows = $user_info->friends_count;
    $user_followers = $user_info->followers_count;
    // $my_id_str = $userinfo->id;
    
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
          $register = new Register();
          $register ->register($user_id,$connection);
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
		      	<li> <a href="register_page.php" class="smoothScroll">Register</a></li>
		      	<li> <a href="edit.php" class="smoothScroll">Edit</a></li>
          </ul>
       
        <div class="nav nav-pills" style="float:right;">
		    <li>
			   <img src="<?= h($user_img); ?>" alt="" style="width:50px;height:50px;" />
		    </li>
		    <li class="dropdown">
		  	 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= h($screen_name); ?><b class="caret"></b></a>
			   <ul class="dropdown-menu pull-right">
				 <li><a href="/dashboard">ダッシュボード</a></li>
				 <li><a href="/reports/add">新規作成</a></li>
				 <li class="divider">&nbsp;</li>
				 <li><a href="./logout.php">ログアウト</a></li>
			   </ul>
		    </li>
	      </div>
	      
	     </div><!--/.nav-collapse -->
      </div>
    </div>
    </div>
    
     <div id="headerwrap" id="home" name="home">
			<header class="clearfix">
	  		 		<!--<h1><span class="icon icon-shield"></span></h1>-->
	  		 		<!--<p>もう一度話しませんか</p>-->
	  		 		<!--<p>Exclusive for BlackTie.co.</p>-->
	  		 		<div id="login">
	  		 			<div id="container">
	  		 				<?php if ($twitterLogin->isLoggedIn()) : ?>
                <form action="logout.php" method="post" id="logout">
                 <input type="submit" value="Log Out">
                 <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
                </form>
                <h2>@<?= h($me->tw_screen_name); ?>'s Timeline</h2>
                <a href="follows.php">フォローしている人から見つける　<?php echo $user_follows?>人</a>
                &nbsp;
                <a href="followers.php">フォロワーから見つける　<?php echo $user_followers?>人</a>
                &nbsp;
                <a href="search.php">話したい人を検索する</a>
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
	    
	   <div class="container">
    <form action="" method="POST">
        <div class="form-group">
            <label>twitterIDを入力</label>
            <input type="text" name="lover_id" class="form-control">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name='tweet_registered'>気になる人を登録したことをつぶやく
            </label>
        </div>
        <button type="submit" onclick="document.getElementById('signup').submit();">登録</button>
         <?php
         if(!empty($error['id'])){
           echo $error['id'];
         }
       ?>
    </form>
</div> 

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
		
    
    
    <div id="footerwrap">
			<div class="container">
				<h4>Created by <a href="http://blacktie.co">BlackTie.co</a> - Copyright 2014</h4>
			</div>
		</div>
    
    
    	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/retina.js"></script>
	<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="assets/js/jquery-func.js"></script>
  </body>
</html>