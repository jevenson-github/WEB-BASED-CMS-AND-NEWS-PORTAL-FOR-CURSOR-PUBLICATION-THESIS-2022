<?php 
require './../auth/session.php';
include './../auth/dbConnect.php';


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
    $query = "SELECT * FROM gallery LEFT JOIN staffs ON gallery.staffID = staffs.staffID ";
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
            $query .= 'GROUP BY title ORDER BY galleryID DESC ';
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
         
        // staff
        $sub_array[] = '
        <div class="px-6 py-4 w-max whitespace-nowrap">
            <div class="flex items-center">
                <div class="flex-shrink-0 w-10 h-10">
                <img class="w-10 h-10 rounded-full" src="./../../resources/uploads/editorial-board/'.($row['image']) . '" alt="">
                </div>
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">' . $row["fName"] . " " . $row["lName"] . '  </div>
                    <div class="text-sm text-gray-500">' . $row["position"] . '</div>
                </div>
            </div>
        </div>
        '; 

        // title 
        $sub_array[] = ' 
        <div class="px-6 py-4 w-max whitespace-nowrap line-clamp-1">
            <div class="block text-sm font-medium text-gray-900 line-clamp-1"> ' . $row["title"] . '  </div>
        
        </div>
        ';

        // filler 
        $sub_array[] = '
    
        ';
        $sub_array[] = '
    
        ';
        $sub_array[] = '
    
        ';
        $sub_array[] = '
    
        ';
        $sub_array[] = ' 
        <a href="viewGallery.php?albumTitle='.$row['title'].'">   
        <div  class="px-2 py-4 text-sm font-medium text-right whitespace-normal" aria-hidden="true">
            <button>
                <svg  width="12" height="12" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.6357 9.89746L13.627 1.07324C13.627 0.458008 13.2227 0.0361328 12.5898 0.0361328H3.75684C3.15918 0.0361328 2.74609 0.484375 2.74609 1.01172C2.74609 1.53027 3.19434 1.96094 3.73047 1.96094H6.88574L10.6123 1.83789L9.0127 3.24414L0.671875 11.5938C0.469727 11.8047 0.355469 12.0508 0.355469 12.2969C0.355469 12.8154 0.830078 13.3076 1.36621 13.3076C1.6123 13.3076 1.8584 13.2021 2.06934 13L10.4189 4.65039L11.8428 3.05078L11.6934 6.61914V9.92383C11.6934 10.4688 12.124 10.9258 12.6602 10.9258C13.1875 10.9258 13.6357 10.4775 13.6357 9.89746Z" fill="#1C1C1E" />
                </svg>
            </button>            
        </div>
        </a>
        ';
      
        $sub_array[] = '
    
        ';

        $data[] = $sub_array;
    }


    $query3 = "SELECT * FROM gallery";
    $result3 = mysqli_num_rows(mysqli_query($dbConnect, $query3));



    $output = array(
        "draw"              => intval($_POST["draw"]),
        "recordsTotal"      => $result3,
        "recordsFiltered"   => $number_filter_row,
        "data"              => $data
    );

    echo json_encode($output);
} 



// // delete specific image 
if(isset($_POST['deleteImageButton'])){
    $imageID = $_POST['imageID'] ;


    $query = "DELETE FROM gallery WHERE galleryID='$imageID' ";
    $execute = mysqli_query($dbConnect,$query);

    if($execute){
        echo "Image removed from Album"; 
    }else{
        echo $dbConnect->error;
    }

}  

// insert on current album one at a time 
else if(isset($_POST['insert_current_album'])){

 
        $image_file = addslashes(file_get_contents($_FILES["image_add"]["tmp_name"]));
        $title = $_POST['current_album']; 
        $query = "INSERT INTO gallery(title, visual) VALUES ('$title','$image_file')";
        $insertImage = mysqli_query($dbConnect,$query);

                
                    if($insertImage){
                        echo "Image Added Successfuly " ;
                    }else {
                    echo $dbConnect->error; 
                    }
    }
// just add an album and add multiple image
else if(isset($_POST['insertButton'])){ 

    for($count = 0; $count < count($_FILES["image"]["name"]); $count++)
    {
     $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
     $title = $_POST['title']; 
     $query = "INSERT INTO gallery(title, visual) VALUES ('$title','$image_file')";
     $insertImage = mysqli_query($dbConnect,$query);

    
    } 
   
               if($insertImage){
                   echo " Album Created Successfuly " ;
               }else {
               echo $dbConnect->error; 
               }

}




?>