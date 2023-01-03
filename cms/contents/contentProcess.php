<?php

require './../auth/dbConnect.php';
require './../auth/session.php';


if (isset($_POST['operation']))
    $operation = $_POST['operation'];

switch ($operation) {
    case 'fetchContentTable':
        fetchContentTable();
        break;
}

// FETCHING TABLE 
function fetchContentTable()
{    

    require './../auth/dbConnect.php';
    $query = "SELECT * FROM contents LEFT JOIN staffs ON contents.author = staffs.staffID ";

    
    // if specific search value
    //  if(isset($_POST["search"]["value"]))
    // {   

    //  $searchByInput = $_POST["search"]["value"]; 
    //  $query .= '
    //  WHERE contents.title LIKE "%'.$searchByInput.'%" OR contents.author LIKE "%'.$searchByInput.'%" OR contents.stage LIKE "%'.$searchByInput.'%" OR contents.draftTimestamp LIKE "%'.$searchByInput.'%" ';
    // }
        
    // custom search bar and while input 
    if (isset($_POST['search_category']) && $_POST['search_category'] != '') {
        $search_value = $_POST['search_category']; 
                
                //fetch all data for Higher EB
                if($_SESSION['role'] == 'Editor-in-Chief' || $_SESSION['role'] == 'Associate Editor' ){
                    $query .= ' WHERE  section="'.$search_value.'"  OR title LIKE"%'.$search_value.'%" OR author="%'.$search_value.'%" '; 
                }
                //fetch data for Literary Editor 
                if($_SESSION['position'] == 'Literary Editor'){
                    $query .= ' WHERE   (section="'.$search_value.'"  OR title LIKE"%'.$search_value.'%" OR author="%'.$search_value.'%") AND section="Literary" '; 
                }   
                // fetch data for News Editor 
                if($_SESSION['position'] == 'News and Current Affairs Editor'){
                    $query .= ' WHERE (section="'.$search_value.'"  OR title LIKE"%'.$search_value.'%" OR author="%'.$search_value.'%") AND (section="News" OR section="Editorial")  '; 
                }
                // fetch data for Feature and Sports Editor
                if($_SESSION['position'] == 'Feature Editor'){

                    $query .= ' WHERE (section="'.$search_value.'"  OR title LIKE"%'.$search_value.'%" OR author="%'. $search_value.'%") AND (section="Feature" OR section="Sports") '; 
                }
                // fetch data for Members and Staffs Who creates their own articles 
                if($_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff'  ){ 

                    $staffID = $_SESSION['staffID']; 
                    $query .= '     
                    WHERE author="'.$staffID.'" AND (section="'.$search_value.'"  OR title LIKE"%'.$search_value.'%" OR author="%'. $search_value.'%")  '; 
                
                } 
                // for special positions 
                if($_SESSION['position'] ==  'Managing Editor for Administrations' || $_SESSION['position'] == 'Senior Managing Editor for Finance' || 
                    $_SESSION['position'] == 'Junior Managing Editor for Finance'  || $_SESSION['position'] == 'Managing Editor for Research and Development' ||
                    $_SESSION['position'] == 'Managing Editor for Community Involvement'){

                    $staffID = $_SESSION['staffID']; 
                    $query .= '     
                    WHERE author="'.$staffID.'" AND (section="'.$search_value.'"  OR title LIKE"%'.$search_value.'%" OR author="%'.$search_value.'%")  '; 
        
                } 
                
    } 

     // category search value and category is set 
     else if (isset($_POST['filter_category']) && $_POST['filter_category'] != '') {

        $category = $_POST['filter_category'];
        // $query .= ' WHERE section="'.$category.'" ';

         //fetch all data for Higher EB
         if($_SESSION['role'] == 'Editor-in-Chief' || $_SESSION['role'] == 'Associate Editor'){
            $query .= ' WHERE section="'.$category.'" ';
        }
         //fetch data for Literary Editor 
         if($_SESSION['position'] == 'Literary Editor'){
            $query .= ' WHERE section="'.$category.'" ';
        }   
        // fetch data for News Editor 
         if($_SESSION['position'] == 'News and Current Affairs Editor'){
            $query .= ' WHERE section="'.$category.'" ';
        }
        // fetch data for Feature and Sports Editor
        if($_SESSION['position'] == 'Feature Editor'){

            $query .= ' WHERE section="'.$category.'" ';
        }
        // fetch data for Members and Staffs Who creates their own articles 
        if($_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff'){ 

            $staffID = $_SESSION['staffID']; 
            $query .= ' WHERE section="'.$category.'" AND author="'.$staffID.'"';
           
        } 
        // for special positions 
        if($_SESSION['position'] == 'Managing Editor for Administrations' || $_SESSION['position'] == 'Senior Managing Editor for Finance' || 
        $_SESSION['position'] == 'Junior Managing Editor for Finance' || $_SESSION['position'] == 'Managing Editor for Research and Development' ||
        $_SESSION['position'] == 'Managing Editor for Community Involvement'){
            
            $staffID = $_SESSION['staffID']; 
            $query .= ' WHERE section="'.$category.'" AND author="'.$staffID.'"';

        }
        

    } 
    // status category 
    else if(isset($_POST['status_category']) && $_POST['status_category'] != ''){

        
        $stage = $_POST['status_category']; 

        //fetch all data for Higher EB
        if($_SESSION['role'] == 'Editor-in-Chief' || $_SESSION['role'] == 'Associate Editor'){
            $query .= ' WHERE stage="'.$stage.'" ';
        }
         //fetch data for Literary Editor 
         if($_SESSION['position'] == 'Literary Editor'){
            $query .= ' WHERE stage="'.$stage.'" AND section="Literary" ';
        }   
        // fetch data for News Editor 
         if($_SESSION['position'] == 'News and Current Affairs Editor'){
            $query .= ' WHERE stage="'.$stage.'" AND (section="News" OR section="Editorial" OR section="Announcement") ';
        }
        // fetch data for Feature and Sports Editor
        if($_SESSION['position'] == 'Feature Editor'){
            
            $query .= ' WHERE stage="'.$stage.'"  AND (section="Feature" OR section="Sports") ';
        }   
        // fetch data for Members and Staffs Who creates their own articles 
        if($_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff' ){ 

            $staffID = $_SESSION['staffID']; 
            $query .= ' WHERE stage="'.$stage.'" AND author="'.$staffID.'"';
           
        }  
        // for special positions 
        if($_SESSION['position'] == 'Managing Editor for Administrations' || $_SESSION['position'] == 'Senior Managing Editor for Finance' || 
            $_SESSION['position'] == 'Junior Managing Editor for Finance' || $_SESSION['position'] == 'Managing Editor for Research and Development' ||
            $_SESSION['position'] == 'Managing Editor for Community Involvement'){
                
            $staffID = $_SESSION['staffID']; 
            $query .= ' WHERE stage="'.$stage.'" AND author="'.$staffID.'"';

        }
        

    }

    // NOT SEARCHING AND CURRENT ROLE FETCHING 
    else { 
        $staffID = $_SESSION['staffID']; 
        //fetch all data for Higher EB
        if($_SESSION['role'] == 'Editor-in-Chief' || $_SESSION['role'] == 'Associate Editor' ){
            $query .= ' WHERE stage="Published" OR stage="Upon Approval" ORDER BY draftTimestamp DESC ';
        }
        //fetch data for Literary Editor 
        if($_SESSION['position'] == 'Literary Editor'){
            $query .= ' WHERE section="Literary" AND (stage="Published" OR stage="Under Review" OR stage="Upon Approval" OR stage="Archive" ) ORDER BY draftTimestamp DESC ';
        }   
        // fetch data for News Editor 
        if($_SESSION['position'] == 'News and Current Affairs Editor' ){
            $query .= ' WHERE (section="News" OR section="Editorial" OR section="Announcement")  AND (stage="Published" OR stage="Under Review" OR stage="Upon Approval" OR stage="Archive") ORDER BY draftTimestamp DESC ';
        }
        // fetch data for Feature and Sports Editor
        if($_SESSION['position'] == 'Feature Editor'){
            $query .= ' WHERE (section="Feature" OR section="Sports") AND (stage="Published" OR stage="Under Review" OR stage="Upon Approval" OR stage="Archive") ORDER BY draftTimestamp DESC ';
        }
        // fetch data for Members and Staffs Who creates their own articles | and higher editorial board 
        if($_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff'){ 
            $staffID = $_SESSION['staffID']; 
            $query .= ' WHERE author="'.$staffID.'"  ORDER BY draftTimestamp DESC ';
        }
        
        // for special positions 
        if($_SESSION['position'] == 'Managing Editor for Administrations' || $_SESSION['position'] == 'Senior Managing Editor for Finance' || 
            $_SESSION['position'] == 'Junior Managing Editor for Finance' || $_SESSION['position'] == 'Managing Editor for Research and Development' ||
            $_SESSION['position'] == 'Managing Editor for Community Involvement'){
                
            $staffID = $_SESSION['staffID']; 
            $query .= ' WHERE author="'.$staffID.'"  ORDER BY draftTimestamp DESC ';

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
        <div class="px-6 py-4 whitespace-normal w-max">
            <div class="text-sm text-gray-900">' . date("F j Y", strtotime($row["draftTimestamp"])) . '</div>
            <div class="text-sm text-gray-900">' . date("g:i A", strtotime($row["draftTimestamp"])) . '</div>
        </div>
        ';
        
        $sub_array[] = '
        <div class="px-6 py-4 w-max whitespace-nowrap line-clamp-1">
            <div class="block text-sm font-medium text-gray-900 line-clamp-1"> ' . $row["title"] . '  </div>
            <div class="block text-sm text-gray-500">' . $row["section"] . ' </div>
        </div>
        ';

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
        <div class="px-6 py-4 w-max whitespace-nowrap">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ' . ($row["stage"] == "Published" ? " text-green-900 bg-green-100 " : ($row["stage"] == "Revisions requested" ? " text-red-900 bg-red-100 " : ($row["stage"] == "Under review" ? " text-orange-900 bg-orange-100 " : ($row["stage"] == "Upon approval" ? " text-yellow-900 bg-yellow-100 " : "text-gray-800 bg-gray-100 rounded-full")))) . '">' . $row["stage"] . '</span>
        </div>
        ';

        $sub_array[] = ' 
        <a href="contentEdit.php?slugID='.$row['slug'].'&stage='.$row["stage"].' " >
        <div  class="px-6 py-4 text-sm font-medium text-right whitespace-normal" aria-hidden="true">
            <button id="btn_viewArticle"  value="'.$row['slug'] .'" >
                <svg  width="12" height="12" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.6357 9.89746L13.627 1.07324C13.627 0.458008 13.2227 0.0361328 12.5898 0.0361328H3.75684C3.15918 0.0361328 2.74609 0.484375 2.74609 1.01172C2.74609 1.53027 3.19434 1.96094 3.73047 1.96094H6.88574L10.6123 1.83789L9.0127 3.24414L0.671875 11.5938C0.469727 11.8047 0.355469 12.0508 0.355469 12.2969C0.355469 12.8154 0.830078 13.3076 1.36621 13.3076C1.6123 13.3076 1.8584 13.2021 2.06934 13L10.4189 4.65039L11.8428 3.05078L11.6934 6.61914V9.92383C11.6934 10.4688 12.124 10.9258 12.6602 10.9258C13.1875 10.9258 13.6357 10.4775 13.6357 9.89746Z" fill="#1C1C1E" />
                </svg>
            </button>            
        </div>
        </a>
        ';

        $data[] = $sub_array;
    }


    $query3 = "SELECT * FROM contents";
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


?>