<?php 
    include_once('../auth/dbConnect.php');
    require './../auth/session.php';

    $username = $_POST['signUp_username'];

    $checkUsername = "SELECT COUNT(*) FROM staffs WHERE username='$username'";
    $executeCheckUsername = mysqli_query($dbConnect, $checkUsername);
    $rowCheckUsername= mysqli_fetch_array($executeCheckUsername);

    if ($rowCheckUsername[0] == 0) {
        echo json_encode("available");
    }
    else {
        echo json_encode("unavailable");
    }
?>  