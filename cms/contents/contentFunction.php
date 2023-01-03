<?php 

require './../auth/dbConnect.php';
require './../auth/session.php';


$id = uniqid(true); 
$logID  = "CURSOR-LOG-2223-".$id;

// ADD CONTENT
if (isset($_POST['addContent'])) {

    $section = $dbConnect->real_escape_string($_POST['section']);
    $title = $dbConnect->real_escape_string($_POST['title']);
    $slug = $dbConnect->real_escape_string($_POST['slug']);
    $author = $_SESSION['staffID'];
    $leadText = $dbConnect->real_escape_string($_POST['leadText']);
    $leadVisualFileName = uniqid(true);
    $content = $dbConnect->real_escape_string($_POST['content']);

    $targetPath = "./../../resources/uploads/contents/";
    $yearFolder = $targetPath . date("Y");
    $monthFolder = $yearFolder . '/' . date("m");


    !file_exists($yearFolder) && mkdir($yearFolder, 0777);
    !file_exists($monthFolder) && mkdir($monthFolder, 0777);
    

    $targetFile = $monthFolder . basename($_FILES["leadVisual"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $leadVisual = $monthFolder . '/' . $leadVisualFileName . "." . $fileType;

    move_uploaded_file($_FILES["leadVisual"]["tmp_name"], $leadVisual);

    $leadVisual = str_replace($targetPath, "", $leadVisual); 


    $stage  = ""; 
    //STAGE DEPENDING ON THE STATUS 
    if($_SESSION['position'] == 'Editor-in-Chief' || $_SESSION['position'] == 'Associate Editor' ){

        $stage  = "Published"; 
    }
    //fetch data for Literary Editor 
    if($_SESSION['position'] == 'Literary Editor'){

        $stage  = "Upon Approval"; 
    }   
    // fetch data for News Editor 
     if($_SESSION['position'] == 'News and Current Affairs Editor'){

        $stage  = "Upon Approval"; 
    }
    // fetch data for Feature and Sports Editor
    if($_SESSION['position'] == 'Feature Editor'){
        
        $stage  = "Upon Approval"; 
    }
    // fetch data for Members and Staffs Who creates their own articles | and higher editorial board 
    if($_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff'){ 
        $stage  = "Under Review"; 
    }
    
    // for special positions 
    if($_SESSION['position'] == 'Managing Editor for Administrations' || $_SESSION['position'] == 'Senior Managing Editor for Finance' || 
        $_SESSION['position'] == 'Junior Managing Editor for Finance' || $_SESSION['position'] == 'Managing Editor for Research and Development' ||
        $_SESSION['position'] == 'Managing Editor for Community Involvement'){
            
        $stage  = "Under Review"; 

    }


    $query = "INSERT INTO contents (slug, section, author, title, leadVisual, leadText, content, coverage, stage, views, draftTimestamp, reviewTimestamp, publishTimestamp, archiveTimestamp, reviewedBy, publishedBy, archivedBy) VALUES ('$slug', '$section', '$author', '$title', '$leadVisual', '$leadText', '$content', NULL,'$stage', 0, current_timestamp(), NULL, current_timestamp(), NULL, NULL, NULL, NULL)";
    $execute = mysqli_query($dbConnect, $query); 

    // logs
    $currentUser = $_SESSION['staffID'];    
    $logs = mysqli_query($dbConnect,"INSERT INTO activitylog(logID,staffID,action,type,description) VALUES('$logID','$currentUser','Add','Content','Add an Article') "); 
    

        // receiver 
        if($_SESSION['position'] != 'Editor-in-Chief' || $_SESSION['position'] != 'Associate Editor'){ 
            $editorReceiver_Position = "";  
                if($section == 'Literary'){
                    $editorReceiver_Position = 'Literary Editor'; 
                }   
                
                if($section == 'News' || $section == 'Editorial' || $section == 'Announcement'){
                    $editorReceiver_Position = 'News and Current Affairs Editor'; 
                }

                if($section == 'Feature' || $section == 'Sports'){
                    $editorReceiver_Position = 'Feature Editor'; 
                }
             // notification 
            $notifcation = "INSERT INTO notification(sender,receiver,message) VALUES ('$currentUser','$editorReceiver_Position','Add an Article.') "; 
            $executeNotification = mysqli_query($dbConnect, $notifcation);  

        }


   
    echo "Content Successfuly Added . ";
}




// DRAFT CONTENT 
else if(isset($_POST['draftContent'])){
        
    $section = $dbConnect->real_escape_string($_POST['section']);
    $title = $dbConnect->real_escape_string($_POST['title']);
    $slug = $dbConnect->real_escape_string($_POST['slug']);
    $author = $_SESSION['staffID'];
    $leadText = $dbConnect->real_escape_string($_POST['leadText']);
    $leadVisualFileName = uniqid(true);
    $content = $dbConnect->real_escape_string($_POST['content']);

    $targetPath = "./../../resources/uploads/contents/";
    $yearFolder = $targetPath . date("Y");
    $monthFolder = $yearFolder . '/' . date("m");


    !file_exists($yearFolder) && mkdir($yearFolder, 0777);
    !file_exists($monthFolder) && mkdir($monthFolder, 0777);
    

    $targetFile = $monthFolder . basename($_FILES["leadVisual"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $leadVisual = $monthFolder . '/' . $leadVisualFileName . "." . $fileType;

    move_uploaded_file($_FILES["leadVisual"]["tmp_name"], $leadVisual);

    $leadVisual = str_replace($targetPath, "", $leadVisual); 

    $query = "INSERT INTO contents (slug, section, author, title, leadVisual, leadText, content, coverage, stage, views, draftTimestamp, reviewTimestamp, publishTimestamp, archiveTimestamp, reviewedBy, publishedBy, archivedBy) VALUES ('$slug', '$section', '$author', '$title', '$leadVisual', '$leadText', '$content', NULL,'Draft', 0, current_timestamp(), NULL, current_timestamp(), NULL, NULL, NULL, NULL)";
    $execute = mysqli_query($dbConnect, $query);

    $currentUser = $_SESSION['staffID'];    
    $logs = mysqli_query($dbConnect,"INSERT INTO activitylog(logID,staffID,action,type,description) VALUES('$logID','$currentUser','Draft','Content','Draft an Article') "); 
    

    echo "Content Succesfuly save as draft . "; 
} 

// SAVE CHANGES FROM DRAFT ARTICLE
else if(isset($_POST['saveChanges'])){


    $slugID   =   $_POST['slugID']; 
    $leadText = $_POST['leadText'];
    $content   = $_POST['content']; 

  // if image is change 
  if(!empty($_FILES['visual']['tmp_name'])){ 
      
      $leadVisualFileName = uniqid(true);
      $targetPath = "./../../resources/uploads/contents/";
      $yearFolder = $targetPath . date("Y");
      $monthFolder = $yearFolder . '/' . date("m");
  

      !file_exists($yearFolder) && mkdir($yearFolder, 0777);
      !file_exists($monthFolder) && mkdir($monthFolder, 0777);
      
     
      $targetFile = $monthFolder . basename($_FILES["visual"]["name"]);
      $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
      $leadVisual = $monthFolder . '/' . $leadVisualFileName . "." . $fileType;
  
      move_uploaded_file($_FILES["visual"]["tmp_name"], $leadVisual);
    
      $leadVisual = str_replace($targetPath, "", $leadVisual); 

      $update = mysqli_query($dbConnect, "UPDATE contents SET leadVisual='$leadVisual' , leadText='$leadText', content='$content' WHERE slug='$slugID' ");
    
  }
  // not change 
    else {

      $update = mysqli_query($dbConnect, "UPDATE contents SET  leadText='$leadText', content='$content' WHERE slug='$slugID' ");
  }
  
  //echo json_encode($update); 
  echo "Changes save successfuly. "; 

}


// UPDATE BUTTON 
else if(isset($_POST['updateContent'])){

        $updateStage = ''; 

        $currentUser = $_SESSION['staffID'];    
        $slugID = $_POST['slugID'];
        $contentStage = $_POST['contentStage']; 
        $contentAuthor  = $_POST['articleAuthor']; 

        // HIGHER EB (STATUS : APPROVAL OF ARTICLES UPON APPROVAL ) 
        if( ($_SESSION['position'] == 'Editor-in-Chief' || $_SESSION['position'] == 'Associate Editor') && $contentStage =='Upon Approval'  ){

                    $update = mysqli_query($dbConnect, "UPDATE contents SET stage='Published' , publishedBy='$currentUser' WHERE slug='$slugID' ");

                    //logs 
                    $activity = "INSERT INTO activitylog(logID,staffID,action,type,description) VALUES('$logID','$currentUser','Approve','Content','Approve an Article') "; 
                    $logs = mysqli_query($dbConnect,$activity); 

                    //notification 
                    $notifcation = "INSERT INTO notification(sender,receiver,message) VALUES ('$currentUser','$contentAuthor','Your article is now Published') "; 
                    $executeNotification = mysqli_query($dbConnect, $notifcation);    
                    
                    echo "Content Published Successful. "; 
                    


        } 

            // editing content published article    
            if(($_SESSION['position'] == 'Editor-in-Chief' || $_SESSION['position'] == 'Associate Editor') && $contentStage =='Published' ){

                            $slugID   =   $_POST['slugID']; 
                            $leadText = $_POST['leadText'];
                            $content   = $_POST['content']; 

                        // if image is change 
                        if(!empty($_FILES['visual']['tmp_name'])){ 
                            
                            $leadVisualFileName = uniqid(true);
                            $targetPath = "./../../resources/uploads/contents/";
                            $yearFolder = $targetPath . date("Y");
                            $monthFolder = $yearFolder . '/' . date("m");
                        
                                
                            !file_exists($yearFolder) && mkdir($yearFolder, 0777);
                            !file_exists($monthFolder) && mkdir($monthFolder, 0777);
                            
                            $targetFile = $monthFolder . basename($_FILES["visual"]["name"]);
                            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                            $leadVisual = $monthFolder . '/' . $leadVisualFileName . "." . $fileType;

                            move_uploaded_file($_FILES["visual"]["tmp_name"], $leadVisual);
                        
                            $leadVisual = str_replace($targetPath, "", $leadVisual); 
            
                            $update = mysqli_query($dbConnect, "UPDATE contents SET leadVisual='$leadVisual' , leadText='$leadText', content='$content' WHERE slug='$slugID' ");
                            //logs 
                        }
                        // not change 
                        else {

                            $update = mysqli_query($dbConnect, "UPDATE contents SET  leadText='$leadText', content='$content' WHERE slug='$slugID' ");
                        }
                        $logs = mysqli_query($dbConnect,"INSERT INTO activitylog(logID,staffID,action,type,description) VALUES('$logID','$currentUser','Edit','Content','Edit an Article') "); 
                        //echo json_encode($update); 

                        echo "Content Successfuly Updated. "; 
            }
            
            //Literary Editor // News Editor // Feature and Sports Editor (STATUS : UPON APPROVAL OR UNDER REVIEW )
            if( ($_SESSION['position'] == 'Literary Editor' || $_SESSION['position'] == 'News and Current Affairs Editor'||$_SESSION['position'] == 'Feature Editor')
                    && $contentStage =='Under Review'){


                        $update = mysqli_query($dbConnect, "UPDATE contents SET stage='Upon Approval' , reviewedBy='$currentUser' WHERE slug='$slugID' ");

                        //logs 
                        $logs = mysqli_query($dbConnect,"INSERT INTO activitylog(logID,staffID,action,type,description) VALUES('$logID','$currentUser','Review','Content','Review an Article') "); 
                         

                        // Notifications
                        
                        $notifcation = "INSERT INTO notification(sender,receiver,message) VALUES ('$currentUser','$contentAuthor','Your article is now Upon Approval') "; 
                        $executeNotification = mysqli_query($dbConnect, $notifcation);    
                        
                        $notifcation2 = "INSERT INTO notification(sender,receiver,message) VALUES ('$currentUser','Editor-in-Chief','Reviewed an Article') "; 
                        $executeNotification2 = mysqli_query($dbConnect, $notifcation2);  

                        $notifcation3 = "INSERT INTO notification(sender,receiver,message) VALUES ('$currentUser','Associate Editor','Reviewed an Article') "; 
                        $executeNotification3 = mysqli_query($dbConnect, $notifcation3); 

                        echo "Content Successfuly Updated. "; 
            }   

            // changing of upon approval article
            if(($_SESSION['position'] == 'Literary Editor' || $_SESSION['position'] == 'News and Current Affairs Editor'||$_SESSION['position'] == 'Feature Editor')
                && $contentStage =='Upon Approval' ){

                $slugID   =   $_POST['slugID']; 
                $leadText = $_POST['leadText'];
                $content   = $_POST['content']; 

            // if image is change 
            if(!empty($_FILES['visual']['tmp_name'])){ 
                
                $leadVisualFileName = uniqid(true);
                $targetPath = "./../../resources/uploads/contents/";
                $yearFolder = $targetPath . date("Y");
                $monthFolder = $yearFolder . '/' . date("m");
            

                !file_exists($yearFolder) && mkdir($yearFolder, 0777);
                !file_exists($monthFolder) && mkdir($monthFolder, 0777);
                
                $targetFile = $monthFolder . basename($_FILES["visual"]["name"]);
                $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                $leadVisual = $monthFolder . '/' . $leadVisualFileName . "." . $fileType;

                move_uploaded_file($_FILES["visual"]["tmp_name"], $leadVisual);
            
                $leadVisual = str_replace($targetPath, "", $leadVisual); 

                $update = mysqli_query($dbConnect, "UPDATE contents SET leadVisual='$leadVisual' , leadText='$leadText', content='$content' WHERE slug='$slugID' ");
                //logs 
            }
        // not change 
        else {

            $update = mysqli_query($dbConnect, "UPDATE contents SET  leadText='$leadText', content='$content' WHERE slug='$slugID' ");
        }
        $logs = mysqli_query($dbConnect,"INSERT INTO activitylog(logID,staffID,action,type,description) VALUES('$logID','$currentUser','Edit','Content','Edit an Article') "); 
        //echo json_encode($update); 

        echo "Content Successfuly Updated. "; 
        }



                // STAFF MEMBERS  (STATUS : UNDER REVIEW ) ALSO CHANGING THE CONTENT  
                if($_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff' ){ 

                                if($contentStage =='Draft'){
                                    $updateStage = 'Under Review'; 
                                }else {
                                    $updateStage = $contentStage ; 
                                }

                                $slugID   =   $_POST['slugID']; 
                                $leadText = $_POST['leadText'];
                                $content   = $_POST['content']; 

                                // if image is change 
                            if(!empty($_FILES['visual']['tmp_name'])){ 
                                
                                $leadVisualFileName = uniqid(true);
                                $targetPath = "./../../resources/uploads/contents/";
                                $yearFolder = $targetPath . date("Y");
                                $monthFolder = $yearFolder . '/' . date("m");
                            
                            
                                !file_exists($yearFolder) && mkdir($yearFolder, 0777);
                                !file_exists($monthFolder) && mkdir($monthFolder, 0777);
                                
                            
                                $targetFile = $monthFolder . basename($_FILES["visual"]["name"]);
                                $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                                $leadVisual = $monthFolder . '/' . $leadVisualFileName . "." . $fileType;
                            
                                move_uploaded_file($_FILES["visual"]["tmp_name"], $leadVisual);
                                
                                $leadVisual = str_replace($targetPath, "", $leadVisual); 

                                $update = mysqli_query($dbConnect, "UPDATE contents SET leadVisual='$leadVisual' , leadText='$leadText', content='$content', stage='$updateStage' WHERE slug='$slugID' ");
                                //logs 
                            }
                            // not change 
                            else {

                                $update = mysqli_query($dbConnect, "UPDATE contents SET  leadText='$leadText', content='$content' , stage='$updateStage' WHERE slug='$slugID' ");
                            }
                            $logs = mysqli_query($dbConnect,"INSERT INTO activitylog(logID,staffID,action,type,description) VALUES('$logID','$currentUser','Edit','Content','Edit an Article') "); 
                            //echo json_encode($update); 

                            echo "Content Successfuly Updated. "; 


                }

                // STAFF MEMBERS  (STATUS : UNDER REVIEW ) ALSO CHANGING THE CONTENT 
                if($_SESSION['position'] == 'Managing Editor for Administrations' || $_SESSION['position'] == 'Senior Managing Editor for Finance' || 
                    $_SESSION['position'] == 'Junior Managing Editor for Finance' || $_SESSION['position'] == 'Managing Editor for Research and Development' ||
                    $_SESSION['position'] == 'Managing Editor for Community Involvement'){
                                    


                                    if($contentStage =='Draft'){
                                        $updateStage = 'Under Review'; 
                                    }else {
                                        $updateStage = $contentStage ; 
                                    }

                                    $slugID   =   $_POST['slugID']; 
                                    $leadText = $_POST['leadText'];
                                    $content   = $_POST['content']; 
                                    
                                // if image is change 
                                if(!empty($_FILES['visual']['tmp_name'])){ 
                                    
                                    $leadVisualFileName = uniqid(true);
                                    $targetPath = "./../../resources/uploads/contents/";
                                    $yearFolder = $targetPath . date("Y");
                                    $monthFolder = $yearFolder . '/' . date("m");
                                    
                                            
                                    !file_exists($yearFolder) && mkdir($yearFolder, 0777);
                                    !file_exists($monthFolder) && mkdir($monthFolder, 0777);
                                    

                                    $targetFile = $monthFolder . basename($_FILES["visual"]["name"]);
                                    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                                    $leadVisual = $monthFolder . '/' . $leadVisualFileName . "." . $fileType;
                                
                                    move_uploaded_file($_FILES["visual"]["tmp_name"], $leadVisual);
                                
                                    $leadVisual = str_replace($targetPath, "", $leadVisual); 
                    
                                    $update = mysqli_query($dbConnect, "UPDATE contents SET leadVisual='$leadVisual' , leadText='$leadText', content='$content' , stage='$updateStage' WHERE slug='$slugID' ");
                                    //logs 
                                }
                                // not change 
                                else {
                                    
                                    $update = mysqli_query($dbConnect, "UPDATE contents SET  leadText='$leadText', content='$content' , stage='$updateStage' WHERE slug='$slugID' ");
                                }
                                $logs = mysqli_query($dbConnect,"INSERT INTO activitylog(logID,staffID,action,type,description) VALUES('$logID','$currentUser','Edit','Content','Edit an Article') "); 
                                //echo json_encode($update);
                                
                                echo "Content Successfuly Updated. "; 
                }

}

// ARCHIVE BUTTON 
else if(isset($_POST['archiveContent'])){
    $currentUser = $_SESSION['staffID'];    
    $slugID = $_POST['slugID']; 
     
    $update = mysqli_query($dbConnect, "UPDATE contents SET stage='Archive' , archivedBy='$currentUser' WHERE slug='$slugID' ");
    $logs = mysqli_query($dbConnect,"INSERT INTO activitylog(logID,staffID,action,type,description) VALUES('$logID','$currentUser','Archive','Content','Archive an Article') "); 

    //echo json_encode($update);
    echo "Content Successfuly Archive. "; 
}

// COMMENT UPLOADING
else if(isset($_POST['commentButton'])){
    $slugID = $_POST['slugID'];
    $message = $_POST['message']; 
    $authorID = $_SESSION['staffID']; 
    $section  = $_POST['section'];  
    $authorUsername = $_POST['authorUsername']; 
    $insertComment = mysqli_query($dbConnect, "INSERT INTO comments(slugID,authorID,message) VALUES('$slugID','$authorID','$message')"); 


    $sender = '';
    $receiver = '' ; 
    // notification 
    if($_SESSION['position'] == 'Editor-in-Chief' || $_SESSION['position'] == 'Associate Editor' ){

        $sender = $_SESSION['staffID']; 
        $receiver = $authorUsername; 
        $message = 'Added comment on your article'; 
    }
    //fetch data for Literary Editor 
    if($_SESSION['position'] == 'Literary Editor'){
        $sender =  $_SESSION['staffID']; 
        $receiver = $authorUsername; 
        $message = 'Added comment on your article'; 
    }   
    // fetch data for News Editor 
     if($_SESSION['position'] == 'News and Current Affairs Editor'){
        $sender = $_SESSION['staffID']; 
        $receiver = $authorUsername; 
        $message = 'Added comment on your article'; 
    }
    // fetch data for Feature and Sports Editor
    if($_SESSION['position'] == 'Feature Editor'){
        $sender =  $_SESSION['staffID']; 
        $receiver = $authorUsername; 
        $message = 'Added comment on your article'; 
    }   
    // fetch data for Members and Staffs Who creates their own articles | and higher editorial board 
    if($_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff'){ 


                if($section == 'Literary'){
                    $receiver = 'Literary Editor'; 

                }else if($section == 'Feature' || $section == 'Sports'){

                    $receiver = 'Feature Editor'; 
                }else if($section == 'News' || $section == 'Announcement' || $section == 'Editorial' ){

                    $receiver = 'News and Current Affairs Editor'; 
                }

                 $sender =  $_SESSION['staffID'];   
                 $message = 'Added comment on article'; 
    }

    if($_SESSION['position'] == 'Managing Editor for Administrations' || $_SESSION['position'] == 'Senior Managing Editor for Finance' || 
       $_SESSION['position'] == 'Junior Managing Editor for Finance' || $_SESSION['position'] == 'Managing Editor for Research and Development' ||
       $_SESSION['position'] == 'Managing Editor for Community Involvement'){

                      if($section == 'Literary'){
                            $receiver = 'Literary Editor'; 

                        }else if($section == 'Feature' || $section == 'Sports'){

                            $receiver = 'Feature Editor'; 
                        }else if($section == 'News' || $section == 'Announcement' || $section == 'Editorial' ){

                            $receiver = 'News and Current Affairs Editor'; 
                        }

                        $sender =  $_SESSION['staffID'];   
                        $message = 'Added comment on article'; 

    }
    // notify  
    $notifcation = "INSERT INTO notification(sender,receiver,message) VALUES ('$sender','$receiver','$message.') "; 
    $executeNotification = mysqli_query($dbConnect, $notifcation);
    echo "Comment Added"; 
}
?>