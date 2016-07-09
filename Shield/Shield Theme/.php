<?php

namespace MyApp;

class User {
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
  
  //user情報を取得
  public function getUser($twUserId) {
    $sql = sprintf("select * from users where tw_user_id=%d", $twUserId);
    $stmt = $this->_db->query($sql);
    $res = $stmt->fetch(\PDO::FETCH_OBJ);
    return $res;
  }
  
  //userの存在を確認
  private function _exists($twUserId) {
    $sql = sprintf("select count(*) from users where tw_user_id=%d", $twUserId);
    $res = $this->_db->query($sql);
    return $res->fetchColumn() === '1';
  }
  
  //データベースに情報を保存
  public function saveTokens($tokens) {
    if ($this->_exists($tokens['user_id'])) {
      $this->_update($tokens);
    } else {
      $this->_insert($tokens);
    }
  }

  private function _insert($tokens) {
    $sql = "insert into users (
      tw_user_id,
      tw_screen_name,
      tw_access_token,
      tw_access_token_secret,
      created,
      modified
      ) values (
      :tw_user_id,
      :tw_screen_name,
      :tw_access_token,
      :tw_access_token_secret,
      now(),
      now()
      )";
    $stmt = $this->_db->prepare($sql);

    $stmt->bindValue(':tw_user_id', (int)$tokens['user_id'], \PDO::PARAM_INT);
    $stmt->bindValue(':tw_screen_name', $tokens['screen_name'], \PDO::PARAM_STR);
    $stmt->bindValue(':tw_access_token', $tokens['oauth_token'], \PDO::PARAM_STR);
    $stmt->bindValue(':tw_access_token_secret', $tokens['oauth_token_secret'], \PDO::PARAM_STR);

    try {
      $stmt->execute();
    } catch (\PDOException $e) {
      throw new \Exception('Failed to insert user!');
    }
  }

  private function _update($tokens) {
    $sql = "update users set
    tw_screen_name = :tw_screen_name,
    tw_access_token = :tw_access_token,
    tw_access_token_secret = :tw_access_token_secret,
    modified = now()
    where tw_user_id = :tw_user_id";

    $stmt = $this->_db->prepare($sql);

    $stmt->bindValue(':tw_screen_name', $tokens['screen_name'], \PDO::PARAM_STR);
    $stmt->bindValue(':tw_access_token', $tokens['oauth_token'], \PDO::PARAM_STR);
    $stmt->bindValue(':tw_access_token_secret', $tokens['oauth_token_secret'], \PDO::PARAM_STR);
    $stmt->bindValue(':tw_user_id', (int)$tokens['user_id'], \PDO::PARAM_INT);

    try {
      $stmt->execute();
    } catch (\PDOException $e) {
      throw new \Exception('Failed to update user!');
    }
  }
  
  
  //あの子のidを登録する
  function register(){
      if ($this->your_exists($tokens['user_id'])) {
        if($this->check_registered($tokens)){
           $this->love_id_is_registered($tokens);
         }else{
           $this->love_insert($tokens);
         }
    } else {
      $this->no_exists($tokens);
    }
  }
  
   //あの子のIDをツイッター上で探す
  private function your_exists(){
    
  }
  
  //すでに登録しているかチェック
  private function check_registered(){
  }
  
  //すでに登録されていたのでエラーメッセージを表示
  private function love_id_is_registered(){
  }
  
  //あの子のIDをデータベースに保存する
  private function love_insert(){
  }
  
  //あの子のIDはなかったのでエラーメッセージを表示
  private function no_exists(){
  }
  
  
  
  
  

}