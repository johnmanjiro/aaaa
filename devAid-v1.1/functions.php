<?php

function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

function goHome() {
  header('Location: http://' . $_SERVER['HTTP_HOST'].'/devAid-v1.1/index.php');
  exit;
}

function logining() {
  header('Location: http://' . $_SERVER['HTTP_HOST'].'/devAid-v1.1/mypage.php');
  exit;
}

  //complete.phpにリダイレクトする
  function complete() {
  header('Location: http://' . $_SERVER['HTTP_HOST'].'/devAid-v1.1/complete.php');
  exit;
}
