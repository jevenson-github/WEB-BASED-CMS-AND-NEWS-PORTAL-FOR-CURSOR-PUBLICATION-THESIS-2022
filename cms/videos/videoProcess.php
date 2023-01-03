<?php
require './../auth/dbConnect.php';
require './../auth/session.php';

if (isset($_POST['operation']))
    $operation = $_POST['operation'];

switch ($operation) {
    case 'fetchContentTable2':
        fetchContentTable();
        break;
}

// FETCHING TABLE 
function fetchContentTable()
{    

    require './../auth/dbConnect.php';
    $query = "SELECT * FROM videos LEFT JOIN staffs ON videos.staffID = staffs.staffID ";
    $staffID  = $_SESSION['staffID'];

    // if specific search value
    //  if(isset($_POST["search"]["value"]))
    // {   

    //  $searchByInput = $_POST["search"]["value"]; 
    //  $query .= '
    //  WHERE contents.title LIKE "%'.$searchByInput.'%" OR contents.author LIKE "%'.$searchByInput.'%" OR contents.stage LIKE "%'.$searchByInput.'%" OR contents.draftTimestamp LIKE "%'.$searchByInput.'%" ';
    // }

    // custom search bar and while input 
    if (isset($_POST['search_category']) && $_POST['search_category'] != '') {
        // $search_value = $_POST['search_category']; 

        //         //fetch all data for Higher EB
        //         if($_SESSION['role'] == 'Editor-in-Chief' || $_SESSION['role'] == 'Associate Editor' ){
        //             $query .= ' WHERE  activitylog.type="'.$search_value.'" '; 
        //         }
        //         //fetch data for Literary Editor 
        //         if($_SESSION['position'] == 'Literary Editor'){
        //             $query .= ' WHERE  activitylog.type="'.$search_value.'" AND activitylog.staffID="'.$staffID.'" '; 
        //         }   
        //         // fetch data for News Editor 
        //         if($_SESSION['position'] == 'News and Current Affairs Editor'){
        //             $query .= ' WHERE  activitylog.type="'.$search_value.'" AND activitylog.staffID="'.$staffID.'" '; 
        //         }
        //         // fetch data for Feature and Sports Editor
        //         if($_SESSION['position'] == 'Feature Editor'){

        //             $query .= ' WHERE  activitylog.type="'.$search_value.'" AND activitylog.staffID="'.$staffID.'" '; 
        //         }
        //         // fetch data for Members and Staffs Who creates their own articles 
        //         if($_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff'  ){ 

        //             $query .= ' WHERE  activitylog.type="'.$search_value.'" AND activitylog.staffID="'.$staffID.'" '; 
                
        //         } 
        //         // for special positions 
        //         if($_SESSION['position'] ==  'Managing Editor for Administrations' || $_SESSION['position'] == 'Senior Managing Editor for Finance' || 
        //             $_SESSION['position'] == 'Junior Managing Editor for Finance'  || $_SESSION['position'] == 'Managing Editor for Research and Development' ||
        //             $_SESSION['position'] == 'Managing Editor for Community Involvement'){

        //                 $query .= ' WHERE  activitylog.type="'.$search_value.'" AND activitylog.staffID="'.$staffID.'" '; 
        //         } 

    } 

     // category search value and category is set 
     else if (isset($_POST['filter_category']) && $_POST['filter_category'] != '') {
        
        // $category = $_POST['filter_category'];
        // // $query .= ' WHERE section="'.$category.'" ';

        //  //fetch all data for Higher EB
        //  if($_SESSION['role'] == 'Editor-in-Chief' || $_SESSION['role'] == 'Associate Editor'){
        //     $query .= ' WHERE activitylog.action="'.$category.'" ';
        // }
        //  //fetch data for Literary Editor 
        //  if($_SESSION['position'] == 'Literary Editor'){
        //     $query .= ' WHERE activitylog.action="'.$category.'"  AND staffID="'.$staffID.'" ';
        // }   
        // // fetch data for News Editor 
        //  if($_SESSION['position'] == 'News and Current Affairs Editor'){
        //     $query .= ' WHERE activitylog.action="'.$category.'"  AND staffID="'.$staffID.'" ';
        // }
        // // fetch data for Feature and Sports Editor
        // if($_SESSION['position'] == 'Feature Editor'){

        //     $query .= ' WHERE activitylog.action="'.$category.'"  AND staffID="'.$staffID.'" ';
        // }
        // // fetch data for Members and Staffs Who creates their own articles 
        // if($_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff'){ 

        //     $query .= ' WHERE activitylog.action="'.$category.'"  AND staffID="'.$staffID.'" ';
           
        // } 
        // // for special positions 
        // if($_SESSION['position'] == 'Managing Editor for Administrations' || $_SESSION['position'] == 'Senior Managing Editor for Finance' || 
        // $_SESSION['position'] == 'Junior Managing Editor for Finance' || $_SESSION['position'] == 'Managing Editor for Research and Development' ||
        // $_SESSION['position'] == 'Managing Editor for Community Involvement'){
            
        //     $query .= ' WHERE activitylog.action="'.$category.'"  AND  staffID="'.$staffID.'" ';

        // }
        

    } 
    // status category 
   

    // NOT SEARCHING AND CURRENT ROLE FETCHING 
    else { 
        $staffID = $_SESSION['staffID']; 
        //fetch all data for Higher EB
        if($_SESSION['role'] == 'Editor-in-Chief' || $_SESSION['role'] == 'Associate Editor' ){
            $query .= 'ORDER BY videoID DESC ';
        }
       

    }


    $query1 = '';

    if ($_POST["length"] != -1) {
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    $number_filter_row = mysqli_num_rows(mysqli_query($dbConnect, $query));

    $result = mysqli_query($dbConnect, $query . $query1);

    $data = array();

    while ($row = mysqli_fetch_array($result)) {
        $sub_array = array();
         
        $sub_array[] = '
        <div class="px-6 py-4 w-max whitespace-nowrap">
            <div class="flex items-center">
                <div class="flex-shrink-0 w-10 h-10">
                    <img class="w-10 h-10 rounded-full" src="./../../resources/uploads/editorial-board/' . ($row['image']) . '" alt="">
                </div>
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">' . $row["fName"] . " " . $row["lName"] . '  </div>
                    <div class="text-sm text-gray-500">' . $row["position"] . '</div>
                </div>
            </div>
        </div>
        '; 

       
        
      

        $sub_array[] = '
        <div class="px-6 py-4 w-max whitespace-nowrap line-clamp-1">
            <div class="block text-sm font-medium text-gray-900 line-clamp-1"> ' . $row["video_title"] . '  </div>
        
        </div>
        ';

        
        $sub_array[] = '
        <div class="px-6 py-4 w-max whitespace-nowrap line-clamp-1">
            <div class="block text-sm font-medium text-gray-900 line-clamp-1"> ' . $row["video_url"] . '  </div>
        
        </div>
        ';

      
      

        $data[] = $sub_array;
    }


    $query3 = "SELECT * FROM videos";
    $result3 = mysqli_num_rows(mysqli_query($dbConnect, $query3));



    $output = array(
        "draw"              => intval($_POST["draw"]),
        "recordsTotal"      => $result3,
        "recordsFiltered"   => $number_filter_row,
        "data"              => $data
    );

    echo json_encode($output);
} 



// ADDING CONTENT 
// if (isset($_POST['addContent'])) {

//     $section = $dbConnect->real_escape_string($_POST['section']);
//     $title = $dbConnect->real_escape_string($_POST['title']);
//     $slug = $dbConnect->real_escape_string($_POST['slug']);
//     $author = $_SESSION['staffID'];
//     $leadText = $dbConnect->real_escape_string($_POST['leadText']);
//     $leadVisualFileName = uniqid(true);
//     $content = $dbConnect->real_escape_string($_POST['content']);

//     $targetPath = "./../../resources/uploads/contents/";
//     $yearFolder = $targetPath . date("Y");
//     $monthFolder = $yearFolder . '/' . date("m");


//     !file_exists($yearFolder) && mkdir($yearFolder, 0777);
//     !file_exists($monthFolder) && mkdir($monthFolder, 0777);
    

//     $targetFile = $monthFolder . basename($_FILES["leadVisual"]["name"]);
//     $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
//     $leadVisual = $monthFolder . '/' . $leadVisualFileName . "." . $fileType;

//     move_uploaded_file($_FILES["leadVisual"]["tmp_name"], $leadVisual);

//     $leadVisual = str_replace($targetPath, "", $leadVisual); 


//     $stage  = ""; 
//     //STAGE DEPENDING ON THE STATUS 
//     if($_SESSION['position'] == 'Editor-in-Chief' || $_SESSION['position'] == 'Associate Editor' ){

//         $stage  = "Published"; 
//     }
//     //fetch data for Literary Editor 
//     if($_SESSION['position'] == 'Literary Editor'){

//         $stage  = "Upon Approval"; 
//     }   
//     // fetch data for News Editor 
//      if($_SESSION['position'] == 'News and Current Affairs Editor'){

//         $stage  = "Upon Approval"; 
//     }
//     // fetch data for Feature and Sports Editor
//     if($_SESSION['position'] == 'Feature Editor'){

//         $stage  = "Upon Approval"; 
//     }
//     // fetch data for Members and Staffs Who creates their own articles | and higher editorial board 
//     if($_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff'){ 
//         $stage  = "Under Review"; 
//     }

//     // for special positions 
//     if($_SESSION['position'] == 'Managing Editor for Administrations' || $_SESSION['position'] == 'Senior Managing Editor for Finance' || 
//         $_SESSION['position'] == 'Junior Managing Editor for Finance' || $_SESSION['position'] == 'Managing Editor for Research and Development' ||
//         $_SESSION['position'] == 'Managing Editor for Community Involvement'){
            
//         $stage  = "Under Review"; 

//     }

//     $query = "INSERT INTO contents (slug, section, author, title, leadVisual, leadText, content, coverage, stage, views, draftTimestamp, reviewTimestamp, publishTimestamp, archiveTimestamp, reviewedBy, publishedBy, archivedBy) VALUES ('$slug', '$section', '$author', '$title', '$leadVisual', '$leadText', '$content', NULL,'$stage', 0, current_timestamp(), NULL, current_timestamp(), NULL, NULL, NULL, NULL)";
//     $execute = mysqli_query($dbConnect, $query);


//     //echo json_encode($execute);
// }


// add video 
if(isset($_POST['addVideo'])){
    $video_title  = $_POST['videoTitle'];
    $video_url = $_POST['videoUrl']; 
    
    $query = "INSERT INTO videos (video_title,video_url) VALUES('$video_title','$video_url' )"; 
    $result = mysqli_query($dbConnect,$query); 

}
?>




