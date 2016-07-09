 <?php
 require_once(__DIR__ . '/config.php');
 require_once(__DIR__ . '/twitteroauth/autoload.php');
 
 $twitterLogin = new MyApp\TwitterLogin();
 
 use Abraham\TwitterOAuth\TwitterOAuth;
 
 if ($twitterLogin->isLoggedIn()) {
  $me = $_SESSION['me'];
}

$connection = new TwitterOAuth(
      CONSUMER_KEY,
      CONSUMER_SECRET,
      $me -> tw_access_token,
      $me -> tw_access_token_secret
      );  
          if( isset( $_GET[ 'keywords' ] ) ){
            $keywords  = $_GET[ 'keywords' ] ;
          
          $search_user = $connection->get("users/search", array("q" => $keywords, 'count' => 20,'page'=>2));
          for($j=0; $j<20; $j++){
            $search_name[$j] = $search_user[$j]->name;
            $search_id[$j] = $search_user[$j]->screen_name;
            $search_img[$j] = $search_user[$j]->profile_image_url_https;
            if($search_name[$j]&&$search_id[$j]&&$search_img[$j]){
            echo"<tr><td><img src ='".$search_img[$j]."'></td><td>".$search_name[$j]."</td><td>@".$search_id[$j]."</td></tr>";
             }
           }
          }
           
      

    
    