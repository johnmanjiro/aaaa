<?php

namespace MyApp;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterLogin {

  public function login() {

    if ($this->isLoggedIn()) {
      logining();
    }
    //リクエストトークンとverifierがセットされていなかったら
    if (!isset($_GET['oauth_token']) || !isset($_GET['oauth_verifier'])) {
      $this->_redirectFlow();
    }//セットされていたら 
    else {
      $this->_callbackFlow();
    }
  }

  public function isLoggedIn() {
    return isset($_SESSION['me']) && !empty($_SESSION['me']);
  }
  
   private function gettwobj() {
      if ($_GET['oauth_token'] !== $_SESSION['oauth_token']) {
      throw new \Exception('invalid oauth_token');
    }
      $twobj = new TwitterOAuth(
      CONSUMER_KEY,
      CONSUMER_SECRET,
      $_SESSION['oauth_token'],
      $_SESSION['oauth_token_secret']
    );
    return $twobj;
   }
  
  private function _callbackFlow() {
    //リクエストトークンがセッションに保存したものと一致するか
    if ($_GET['oauth_token'] !== $_SESSION['oauth_token']) {
      throw new \Exception('invalid oauth_token');
    }

    $conn = new TwitterOAuth(
      CONSUMER_KEY,
      CONSUMER_SECRET,
      $_SESSION['oauth_token'],
      $_SESSION['oauth_token_secret']
    );
    
    //アクセストークンを取得
    $tokens = $conn->oauth('oauth/access_token', [
      'oauth_verifier' => $_GET['oauth_verifier']
    ]);
    // var_dump($tokens);
    
    //データベースに保存する
    $user = new User();
    $user->saveTokens($tokens);
    // echo "tokens saved";
    // exit;

    session_regenerate_id(true); // session hijack
    //user情報をとってくる
    $_SESSION['me'] = $user->getUser($tokens['user_id']);
    //リクエストトークンはアンセット
    unset($_SESSION['oauth_token']);
    unset($_SESSION['oauth_token_secret']);
    //ログイン中のトップ画面へ
    logining();
  }

  private function _redirectFlow() {
    $conn = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);

    // request token
    $tokens = $conn->oauth('oauth/request_token', [
      'oauth_callback' => CALLBACK_URL
    ]);

    // save token
    $_SESSION['oauth_token'] = $tokens['oauth_token'];
    $_SESSION['oauth_token_secret'] = $tokens['oauth_token_secret'];

    // redirect アカウントの利用を許可しますか？
    $authorizeUrl = $conn->url('oauth/authorize', [
      'oauth_token' => $tokens['oauth_token']
    ]);
    header('Location: ' . $authorizeUrl);
    exit;
  }

}