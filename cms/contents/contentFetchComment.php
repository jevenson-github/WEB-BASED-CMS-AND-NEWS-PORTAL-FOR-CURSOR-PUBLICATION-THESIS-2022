<?php  
require './../auth/dbConnect.php';
require './../auth/session.php';


// if(isset($_POST['load'])) {

        
//     $slugID = $_GET['slugID']; 

//     $fetchComment = "SELECT * FROM comments LEFT JOIN staffs ON staffs.staffID = comments.authorID 
//     LEFT JOIN contents ON contents.slug = comments.slugID WHERE comments.slugID='$slugID' ORDER BY comments.commentTimestamp DESC ";  



//     $result = mysqli_query($dbConnect , $fetchComment);
//     $output =''; 
//     if(mysqli_num_rows($result)> 0){
//             while($row = mysqli_fetch_assoc($result)) {  

//                     $output .=' 
//                     <ul role="list" class="divide-y divide-gray-200"> 
                                
//                     <li class="py-4">
//                     <div class="flex space-x-3">
//                         <img class="object-cover object-center w-8 h-8 rounded-full" src="./../../resources/uploads/editorial-board/"'.$row['image'].'" alt="">
//                         <div class="flex-1">
//                             <div class="flex items-center justify-between">
//                                 <h3 class="text-sm font-medium text-gray-900">'. $row['fName'].' '.$row['lName'].'"</h3>
                            
//                             </div>
//                             <p class="mt-1 text-sm text-gray-700">'.$row['message'].'"</p> 

//                             <div class="flex items-center justify-between mt-2">

//                                 <p class="text-xs text-gray-500">'.date("F j , Y", strtotime($row["commentTimestamp"])).' / '.date("g:i A", strtotime($row["commentTimestamp"])).'"</p>
//                             </div>
//                         </div>
//                     </div>
//                 </li> 
//                 </ul>'; 

//             }

//         }else {
            
//             $output .='<div class="mx-auto my-12 text-center">No Comments</div>' ;  
//         } 

    
//         echo $output;
//     }



?>