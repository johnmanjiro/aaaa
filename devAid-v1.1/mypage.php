<?php

// require_once(__DIR__ . '/config.php');
// require_once(__DIR__ . '/Twitterlogin.php');

// $twitterLogin = new MyApp\TwitterLogin();

// use Abraham\TwitterOAuth\TwitterOAuth;

// if ($twitterLogin->isLoggedIn()) {
//   $me = $_SESSION['me'];
// }

// $screen_name = $me->tw_screen_name;

// $connection = new TwitterOAuth(
//       CONSUMER_KEY,
//       CONSUMER_SECRET,
//       $me -> tw_access_token,
//       $me -> tw_access_token_secret
//       );
//   // ユーザ名でユーザ情報を取得
// $user_info = $connection->get('users/show', ['screen_name'=> $screen_name]);    
 
//     $user_name = $user_info->name;
//     $user_id = $user_info->screen_name;
//     $user_img = $user_info->profile_image_url_https;
//     $user_follows = $user_info->friends_count;
//     $user_followers = $user_info->followers_count;
      

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]--> 
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]--> 
<!--[if !IE]><!--> 
<html lang="en"> 
    <!--<![endif]-->     
    <head>
        <title>Free Bootstrap Theme for Developers</title>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content=""> 
        <link rel="shortcut icon" href="favicon.ico"> 
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
        <!-- Global CSS -->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <!-- Plugins CSS -->         
        <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="assets/plugins/prism/prism.css">
        <!-- Theme CSS -->         
        <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>     
    <body data-spy="scroll">
        <!---//Facebook button code-->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
        <!-- ******HEADER****** -->         
        <header id="header" class="header"> 
            <div class="container"> 
                <h1 class="logo pull-left"><a class="scrollto" href="#promo"><span class="logo-title">両思いったー</span></a></h1>
                <!--//logo-->                 
                <nav id="main-nav" class="main-nav navbar-right" role="navigation">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--//nav-toggle-->
                    </div>
                    <!--//navbar-header-->                     
                    <div class="navbar-collapse collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active nav-item sr-only">
                                <a class="scrollto" href="mypage.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="scrollto" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="scrollto" href="#features">Features</a>
                            </li>
                            <li class="nav-item">
</li>
                            <li class="nav-item"></li>                             
                            <li class="nav-item last"></li>
                        </ul>
                        <!--//nav-->
                    </div>
                    <!--//navabr-collapse-->
                </nav>
                <!--//main-nav-->
            </div>
        </header>
        <!--//header-->
        <!-- ******PROMO****** -->
        <section id="promo" class="promo section offset-header">
            <div class="container text-center">
                <h2 class="title"><span class="highlight"><font color="#074f66">両思いったー</font></span></h2>
                <p class="intro">A free mobile-friendly Bootstrap theme designed to help developers
promote their personal projects</p>
                <div class="btns">
                    <a class="btn btn-cta-secondary" href="http://themes.3rdwavemedia.com/" target="_blank">Demo</a>
                    <a class="btn btn-cta-primary" href="http://themes.3rdwavemedia.com/website-templates/devaid-free-bootstrap-theme-developers/" target="_blank">Download</a>
                </div>
                <ul class="meta list-inline">
                    <li>
</li>
                    <li>
</li>
                </ul>
                <!--//meta-->
            </div>
            <!--//container-->
            <div class="social-media">
                <div class="social-media-inner container text-center">
                    <ul class="list-inline">
                        <li class="twitter-follow">
                            <a href="https://twitter.com/3rdwave_themes" class="twitter-follow-button" data-show-count="false">Follow @3rdwave_themes</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                        </li>
                        <!--//twitter-follow-->
                        <li class="twitter-tweet">
                            <a href="https://twitter.com/share" class="twitter-share-button" data-via="3rdwave_themes" data-hashtags="bootstrap">Tweet</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                        </li>
                        <!--//twitter-tweet-->
                        <li class="facebook-like">
                            <div class="fb-like" data-href="http://themes.3rdwavemedia.com/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                        </li>
                        <!--//facebook-like-->
                        <!--// Generate github buttons: https://github.com/mdo/github-buttons -->
                        <li class="github-star">
                            <iframe src="http://ghbtns.com/github-btn.html?user=mdo&repo=github-buttons&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="110" height="20"></iframe>
                        </li>
                        <li class="github-fork">
                            <iframe src="http://ghbtns.com/github-btn.html?user=mdo&repo=github-buttons&type=fork" allowtransparency="true" frameborder="0" scrolling="0" width="53" height="20"></iframe>
                        </li>
                        <!--//
                    <li class="github-follow"><iframe src="http://ghbtns.com/github-btn.html?user=mdo&type=follow&count=true"
  allowtransparency="true" frameborder="0" scrolling="0" width="165" height="20"></iframe></li>
                    -->
                    </ul>
                </div>
            </div>
        </section>
        <!--//promo-->
        <!-- ******ABOUT****** -->         
        <section id="about" class="about section">
            <div class="container">
                <h2 class="title text-center">両思いったーって何？</h2>
                <p class="intro text-center">Explain your project in detail. Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
                <div class="row">
                    <div class="item col-md-4 col-sm-6 col-xs-12">
                        <div class="icon-holder">
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="content">
                            <h3 class="sub-title">Designed for developers</h3>
                            <p>Outline a benefit here. Tell users what your plugin/software can do for them. You can change the icon above to any of the 400+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a> icons available.</p>
                        </div>
                        <!--//content-->
                    </div>
                    <!--//item-->
                    <div class="item col-md-4 col-sm-6 col-xs-12">
                        <div class="icon-holder">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <div class="content">
                            <h3 class="sub-title">Time saver</h3>
                            <p>Outline a benefit here. Tell users what your plugin/software can do for them. You can change the icon above to any of the 400+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a> icons available.</p>
                        </div>
                        <!--//content-->
                    </div>
                    <!--//item-->
                    <div class="item col-md-4 col-sm-6 col-xs-12">
                        <div class="icon-holder">
                            <i class="fa fa-crosshairs"></i>
                        </div>
                        <div class="content">
                            <h3 class="sub-title">UX-centred</h3>
                            <p>Outline a benefit here. Tell users what your plugin/software can do for them. You can change the icon above to any of the 400+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a> icons available.</p>
                        </div>
                        <!--//content-->
                    </div>
                </div>
                <!--//row-->                 
            </div>
            <!--//container-->
        </section>
        <!--//about-->
        <!-- ******LICENSE****** -->         
        <!--//how-->
       
        <!-- ******FOOTER****** -->         
        <footer class="footer">
            <div class="container text-center">
                <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
                <small class="copyright">Designed with <i class="fa fa-heart"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
            </div>
            <!--//container-->
        </footer>
        <!--//footer-->
        <!-- Javascript -->         
        <script type="text/javascript" src="assets/plugins/jquery-1.11.3.min.js"></script>         
        <script type="text/javascript" src="assets/plugins/jquery.easing.1.3.js"></script>         
        <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>         
        <script type="text/javascript" src="assets/plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script>         
        <script type="text/javascript" src="assets/plugins/prism/prism.js"></script>         
        <script type="text/javascript" src="assets/js/main.js"></script>         
    </body>
</html>
