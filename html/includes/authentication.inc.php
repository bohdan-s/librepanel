<?php
if(!isset($_POST['request']) || empty($_POST['request'])){
  echo ucwords('Error: Unknown Request: '.$_POST['request']);
} else {
  $request=$_POST['request'];
  if($request == "logout") {
    session_start();
    session_destroy();
  }
  if($request == "login") {
    session_start();

    if(isset($_POST['username']) && !empty($_POST['username'])){
      $username=$_POST['username'];
    } else {
      $username = "";
    }

    if(isset($_POST['password']) && !empty($_POST['password'])){
      $password=$_POST['password'];
    } else {
      $password="";
    }

    if($username == "admin"){
      if(md5($password) == "5f4dcc3b5aa765d61d8327deb882cf99"){
        $_SESSION['LOGIN_STATUS']=true;
        $_SESSION['USERNAME']=$username;
        echo('sucsess');
      } else {
        echo('Incorrect Logon');
      }
    } else {
      echo('Incorrect Logon');
    }
  }
}
?>
