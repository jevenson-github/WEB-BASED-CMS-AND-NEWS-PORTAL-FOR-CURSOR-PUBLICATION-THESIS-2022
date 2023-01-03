<?php
   // include './session.php';
    include 'session.php';  
    require 'dbConnect.php';
    // logs 
    $currentUser = $_SESSION['staffID']; 
    $id = uniqid(true); 
    $logID  = "CURSOR-LOG-2223-".$id; 

    $logs = mysqli_query($dbConnect,"INSERT INTO activitylog(logID,staffID,action,type,description) VALUES('$logID','$currentUser','Logout','Authentication','Logged Out') "); 


    session_destroy();
    session_unset(); 
    
    header('Location: index.php'); 
?>