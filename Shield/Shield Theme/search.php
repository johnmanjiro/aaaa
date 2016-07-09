<?php
require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Twitterlogin.php');

$twitterLogin = new MyApp\TwitterLogin();

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
      
// Timelineの取得
$home = $connection->get('statuses/home_timeline', array('count' => 5));
// キーワードによるツイート検索
$tweet = $connection->get("search/tweets", array("q" => "夜景　きれい", 'count' => 10));
// 認証が有効か+ユーザ情報取得
$user = $connection->get('account/verify_credentials');
// つぶやく
$status = $connection->post('statuses/update', ['status' =>'ツイート内容']);
// リツイート
$retweet = $connection->post('statuses/retweet/ツイートID');
// フォロアーを取得
$followers = $connection->get('followers/list');
// フォローしてる人を取得
$follows = $connection->get('friends/list');
//フォローしている人のIDを取得
$followsids = $connection->get('friends/ids',['screen_name'=> '@weatherbot777']);

// ユーザ名でユーザ情報を取得
$userinfo = $connection->get('users/show', ['screen_name'=> '@weatherbot777']);
// ユーザIDでフォローする
$follow = $connection->post('friendships/create', ['user_id'=> 'ユーザID']);


    $username = $userinfo->name;
    $user_id = $userinfo->screen_name;
    $userimg = $userinfo->profile_image_url_https;
    $user_follows = $userinfo->friends_count;
    $user_followers = $userinfo->followers_count;

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
          </ul>
       
        <div class="nav nav-pills" style="float:right;">
		    <li>
			   <img src="<?= h($userimg); ?>" alt="" style="width:50px;height:50px;" />
		    </li>
		    <li class="dropdown">
		  	 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= h($me->tw_screen_name); ?><b class="caret"></b></a>
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
                            <!--<p class="navbar-text">在庫検索</p>-->
                       <form action="" class="navbar-form" method="POST">
                     <div class="form-group" >
                      <input type="text" class="form-control" placeholder="キーワード" name="keyword">
                     </div>
                      <button type="submit" class="btn btn-info">検索</button>
                       </form>
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
	    <div>
        <table id="tweets">
          <?php
        
        $keyword = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $keyword = $_POST['keyword'];
  $keywords = h($keyword, ENT_QUOTES, 'UTF-8'); 
    // var_dump($keywords);
    // ユーザーを検索　
    $search_user = $connection->get("users/search", array("q" => $keywords, 'count' => 20 ));
          for($j=0; $j<20; $j++){
            $search_name[$j] = $search_user[$j]->name;
            $search_id[$j] = $search_user[$j]->screen_name;
            $search_img[$j] = $search_user[$j]->profile_image_url_https;
          if($search_name[$j]&&$search_id[$j]&&$search_img[$j]){
            echo"<tr><td><img src ='".$search_img[$j]."'></td><td>".$search_name[$j]."</td><td>@".$search_id[$j]."</td></tr>";
           }
         }
         

         ?>
        </table>
        　<p id="loading" style="display:none;">loading...</p>
         <input type="button" id="more" value="もっと読む">
        <script>
        $(function() {
             var keywords = '<?php echo $keywords;?>'
            $('#more').click(function() {
                $('#loading').show();
                $.get('more.php', {keywords:keywords
                }, function(rs) {
                    $('#loading').hide();
                    $(rs).appendTo('#tweets');
                });
            });
        
        });
       </script>
    <?php } ?>
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