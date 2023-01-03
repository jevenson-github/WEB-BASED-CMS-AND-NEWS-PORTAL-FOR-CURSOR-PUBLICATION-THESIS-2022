<?php


/*
session_start();

if (session_status() == 'invalid' || empty($_SESSION['status'])) {
  $_SESSION['status'] = 'invalid';
}

if ($_SESSION['status'] == 'invalid') {
  if ($_SESSION['page'] == 'dashboard') {
    header("location: ./auth/signIn");
  }
  else {
    header("location: ./../auth/signIn");
  }
  
}

if ($_SESSION['status'] == 'valid') {

}
*/



if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

function checkSession()
{

  // GET HTTP HOST AND REQUEST URI //
  $r = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

  // CHECK IF SESSION IS VALID - USING LOCALHOST //
  if (strpos($_SERVER['HTTP_HOST'], "localhost") !== false) {
    $root = 'http://' . explode('/', $r)[0] . '/' . explode('/', $r)[1];

    // SESSION IS INVALID //
    if (!isset($_SESSION['staffID']) && !(str_contains(dirname($_SERVER['SCRIPT_NAME']), "auth"))) {
      header('location:' . $root . '/cms/auth');
      exit();
    }
    
    // SESSION IS VALID //
    else if (isset($_SESSION['staffID']) && str_contains(dirname($_SERVER['SCRIPT_NAME']), "auth")) {
      $r = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      $root = 'http://' . explode('/', $r)[0] . '/' . explode('/', $r)[1];
      echo $root . '/module';
      header('location:' . $root . '/cms');
      exit();
    }
  }

  /*
  // CHECK IF SESSION IS VALID - HOSTED SERVER //
  else {

    // SESSION IS INVALID //
    if (!isset($_SESSION['staffID']) && !(strpos($_SERVER['REQUEST_URI'], "authenticate") !== false)) {
      header('location: https://cms.cursorpub.me/auth/signIn');
      exit();
    }

    // SESSION IS VALID//
    else if (isset($_SESSION['staffID']) && strpos($_SERVER['REQUEST_URI'], "authenticate") !== false) {
      header('location: https://cms.cursorpub.me/');
      exit();
    }
  }  */

}

if (isset($_POST['signinSubmit'])) {
  $username = trim($_POST['signIn_username']);
  $password = trim($_POST['signIn_password']);
  $password = md5($password);
  $auth_validateCredentials = "SELECT * FROM staffs WHERE staffs.username = '$username' AND password = '$password'";
  $execute_auth_validateCredentials = mysqli_query($dbConnect, $auth_validateCredentials);
  $getAccountInfo = mysqli_fetch_array($execute_auth_validateCredentials);



  if (mysqli_num_rows($execute_auth_validateCredentials) > 0) {
    //$_SESSION['status'] = "valid";
    $_SESSION['staffID'] = $getAccountInfo['staffID'];
    $_SESSION['username'] = $getAccountInfo['username'];
    $_SESSION['position'] = $getAccountInfo['position'];
    $_SESSION['role'] = $getAccountInfo['role'];
    $_SESSION['fName'] = $getAccountInfo['fName'];
    $_SESSION['lName'] = $getAccountInfo['lName'];
    $_SESSION['mName'] = $getAccountInfo['mName'];
    $_SESSION['image'] = $getAccountInfo['image']; 
    
    //header("Location: ./.."); 


      // logs 
  $currentUser = $_SESSION['staffID']; 
  $id = uniqid(true); 
  $logID  = "CURSOR-LOG-2223-".$id; 
  $logs = mysqli_query($dbConnect, "INSERT INTO activitylog(logID,staffID,action,type,description) VALUES('$logID','$currentUser','Login','Authentication','Logged In') "); 


  } else {
    //$_SESSION['status'] = "invalid";
  }
}

if(isset($_POST['logout'])) {
    session_destroy();
}