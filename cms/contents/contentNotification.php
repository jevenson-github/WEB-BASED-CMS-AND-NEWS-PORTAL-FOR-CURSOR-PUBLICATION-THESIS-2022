
<?php  
require './../auth/dbConnect.php';
require './../auth/session.php';

$current_role = $_SESSION['position'] ;
//members and stafss ; 
$receiver = $_SESSION['username']; 


// Loading of notification 
if(isset($_POST['view'])){ 
    
    $status_query = "SELECT * FROM notification WHERE status=0  AND  (receiver='$current_role' OR receiver='$receiver')  ";



    $result_query = mysqli_query($dbConnect, $status_query);
    $count = mysqli_num_rows($result_query);


     // reset notification
     

      // reset notification
    if($_POST["view"] != '' )
    {       
            

            $update_query = "UPDATE notification SET status =1 WHERE  (receiver='$current_role' OR receiver='$receiver') AND status=0  ";
            mysqli_query($dbConnect, $update_query);
            

    }   


    
      // Notif for News | Editorial | Announcement 
    if($_SESSION['position'] =='Editor-in-Chief' ){

        $query = "SELECT * FROM notification LEFT JOIN staffs ON notification.sender = staffs.staffID WHERE notification.status=1 AND notification.receiver='Editor-in-Chief'  ORDER BY notification.notifID DESC"; 
    }   

    else if($_SESSION['position'] == 'Associate Editor'  ){
        $query = "SELECT * FROM notification LEFT JOIN staffs ON notification.sender = staffs.staffID WHERE notification.status=1 AND notification.receiver='Associate Editor' ORDER BY notification.notifID DESC"; 
    }

     //fetch data for Literary Editor 
   else  if($_SESSION['position'] == 'Literary Editor'){

        $query = "SELECT * FROM notification LEFT JOIN staffs ON notification.sender = staffs.staffID WHERE notification.status=1 AND notification.receiver='Literary Editor' ORDER BY notification.notifID DESC "; 
    }   
    // fetch data for News Editor 
    else if($_SESSION['position'] == 'News and Current Affairs Editor'){

        $query = "SELECT * FROM notification LEFT JOIN staffs ON notification.sender = staffs.staffID WHERE notification.status=1 AND notification.receiver='News and Current Affairs Editor' ORDER BY notification.notifID DESC "; 
    }
    // fetch data for Feature and Sports Editor
  else if($_SESSION['position'] == 'Feature Editor'){

        $query = "SELECT * FROM notification LEFT JOIN staffs ON notification.sender = staffs.staffID WHERE notification.status=1 AND notification.receiver='Feature Editor' ORDER BY notification.notifID DESC "; 

    }
    // fetch data for Members and Staffs Who creates their own articles 
   else if($_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff'){ 
        $receiver = $_SESSION['username']; 

        $query = "SELECT * FROM notification LEFT JOIN staffs ON notification.sender = staffs.staffID WHERE notification.status=1 AND notification.receiver='$receiver' ORDER BY notification.notifID DESC "; 
        
    } 
    // for special positions 
   else if($_SESSION['position'] == 'Managing Editor for Administrations' || $_SESSION['position'] == 'Senior Managing Editor for Finance' || 
    $_SESSION['position'] == 'Junior Managing Editor for Finance' || $_SESSION['position'] == 'Managing Editor for Research and Development' ||
    $_SESSION['position'] == 'Managing Editor for Community Involvement'){
        
        $receiver = $_SESSION['username']; 

        $query = "SELECT * FROM notification LEFT JOIN staffs ON notification.sender = staffs.staffID WHERE notification.status=1 AND notification.receiver='$receiver' ORDER BY notification.notifID DESC "; 

    } 


    // fetch result 
    $result = mysqli_query($dbConnect,$query);
    $output = '';   



    if(mysqli_num_rows($result) > 0)
    {
     while($row = mysqli_fetch_array($result))
     { 
       $output .='  
        <div class=" inline-flex items-center  justify-between w-full">
                <div class="inline-flex items-center">
                <img class="h-8 w-8 rounded-full" src="./../../resources/uploads/editorial-board/'.$row['image'].'" alt="">
                 <h3 class="font-bold text-xs  text-gray-800 ml-2">'.$row['fName'].' '.$row['lName'].'</h3>
                </div>
                <p class="text-xs text-gray-500">'.date("F j, Y", strtotime($row["timestamp"])).' '.date("g:i A", strtotime($row["timestamp"])).' </p>
            </div>
            <p class="mt-1 text-sm pl-10 mb-8">'.$row['message'].'</p>
            </div> 
       ';
     }
    }
    else{
        $output .= ' 
        <div class=" inline-flex items-center justify-between w-full">
        <p class="mt-1 text-sm ">No notification found .</p>
        </div> ';
     
    } 

    $data = array(
        'notification' => $output,
        'unseen_notification'  => $count
    );
    
    echo json_encode($data);
}

?>