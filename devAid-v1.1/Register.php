<?php

namespace MyApp;

class Register {
  private $_db;

  public function __construct() {
    $this->_connectDB();
  }
  
  //データベースに接続
  private function _connectDB() {
    try {
      $this->_db = new \PDO(DSN, DB_USERNAME, DB_PASSWORD);
      $this->_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $e) {
      throw new \Exception('Failed to connect DB!');
    }
  }
  
  // public function run() {
  //   if ($_SERVER[  'REQUEST_METHOD'] === 'POST') {
  //     $this->register($user_id,$connection);
  //   }
  // }
  
 
  //あの子のidを登録する
  function register($user_id,$connection){
      //あの子のIDをツイッター上で探す
      $lover_id = $_POST['lover_id'];
      $lover_id = h($lover_id, ENT_QUOTES, 'UTF-8'); 
      global $error;
      if(!empty($lover_id)){
      $search_lover = $connection->get("users/search", array("q" => $lover_id));
      $lover_twitter_id = $search_lover[0]->screen_name;
      $lover_img = $search_lover[0]->profile_image_url_https;
      if(isset($lover_twitter_id)){
        if($this->check_registered($user_id,$lover_twitter_id)){
           $error['id'] = 'そのIDはすでに登録されています。';
         }else{
           //５人までの制限をかける
           if($this->check_lovers_number($user_id)>=5){
             $error['id'] = '登録人数を超えています。５人までしか登録できません。';
           }else{
           //登録する
           $this->love_insert($user_id,$lover_twitter_id,$lover_img);
           //登録したことをつぶやく
          if(!empty($_POST["tweet_registered"])){
           $this->tweet_registered($user_id,$connection);
          }
           //両思いかチェックする
           $this->direct_messages($user_id,$lover_twitter_id,$connection);
           //search_loverをregister_page.phpに渡す
           session_start();
           $_SESSION['search_lover'] = $search_lover;
           header('Location: http://' . $_SERVER['HTTP_HOST'].'/devAid-v1.1/complete.php');
           exit;
           }
         }
       }else {
         $error['id'] = 'twitter上にそのIDは存在しません。';
       }
      }else{
        $error['id'] =  '入力されていません。';
      }
  }
  
  //すでに登録しているかチェック
  private function check_registered($user_id,$lover_twitter_id){
    $stmt = sprintf("select count(*) from loveres where user_id = '$user_id' AND lover_twitter_id = '$lover_twitter_id'"); 
    $res = $this->_db->query($stmt);
    return $res->fetchColumn() === '1';
  }

  //あの子のIDをデータベースに保存する
  private function love_insert($user_id,$lover_twitter_id,$lover_img){
     $sql = "insert into loveres (
      user_id,
      lover_twitter_id,
      img,
      created,
      modified
      ) values (
      '$user_id',
      '$lover_twitter_id',
      '$lover_img',
      now(),
      now()
      )";
    $stmt = $this->_db->prepare($sql);
    try {
      $stmt->execute();
    } catch (\PDOException $e) {
      throw new \Exception('登録に失敗しました');
    }
  }

  //両思いかチェックする
  private function direct_messages($user_id,$lover_twitter_id,$connection){
  $stmt = sprintf("select count(*) from loveres where user_id = '$lover_twitter_id' AND lover_twitter_id = '$user_id'"); 
  $res = $this->_db->query($stmt);
  $lover_exists = $res->fetchColumn();
  if($lover_exists>0){
    $text1 = $lover_twitter_id.'さん、おめでとうございます！'.$user_id.'さんもあなたを登録しています。連絡をとってみましょう！';
    $connection->post('direct_messages/new',array('screen_name' =>$lover_twitter_id, 'text' => $text1));
    $text2 = $user_id.'さん、おめでとうございます！'.$lover_twitter_id.'さんもあなたを登録しています。連絡をとってみましょう！';
    $connection->post('direct_messages/new',array('screen_name' =>$user_id, 'text' => $text2));
   }
  }
  //登録したことをつぶやく
  private function tweet_registered($user_id,$connection){
     $text = '@'.$user_id.'さんが話したい人を登録しました。誰かが@'.$user_id.'さんを登録した場合、お二人にダイレクトメッセージをお送りします。';
     $status = $connection->post('statuses/update', ['status' => $text]);
  }
  
  //５人までに制限をかける
  private function check_lovers_number($user_id){
    $stmt = sprintf("select count(*) from loveres where user_id = '$user_id'"); 
    $res = $this->_db->query($stmt);
    return $res->fetchColumn();
  }
  
}