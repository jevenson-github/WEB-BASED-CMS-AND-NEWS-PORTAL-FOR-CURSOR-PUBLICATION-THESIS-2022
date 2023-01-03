<?php

$title = 'Content';
$page = 'content';

require './../auth/dbConnect.php';
require './../auth/session.php';

$stage  =  $_GET['stage'];
$slugID = $_GET['slugID']; 

$query = mysqli_query($dbConnect,"SELECT * FROM contents LEFT JOIN staffs ON contents.author = staffs.staffID WHERE slug='$slugID' "); 

while($row = mysqli_fetch_array($query)){
    
    $title = $row["title"];
    $section = $row["section"];
    $visual = $row["leadVisual"];
    $fname = $row["fName"];
    $lname = $row["lName"];
    $position = $row["position"];
    $leadText =  $row["leadText"];
    $content = $row['content']; 
    $status =$row["stage"]; 

    // for username in staffs 
    $author = $row['username']; 
}


checkSession();
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CURSOR CMS Sign In page">
    <link rel="stylesheet" href="../styles/tailwind.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="resources/favicon.svg"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" defer></script>
    <script type="text/javascript" src="./../plugins/jquery.min.js" defer></script>
    <script type="text/javascript" src="./../plugins/datatables.min.js" defer></script>
    <script src="./../scripts/public/tinymce/tinymce.min.js" defer></script>
    <script src="./../scripts/public/tinymce-jquery/tinymce-jquery.min.js" defer></script>
    <script type="text/javascript" src="./../scripts/contents.js" defer></script>
    <!-- sweet alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.all.min.js"></script>
    <title><?php echo $title ?> - CURSOR CMS</title>
</head>
<body class="flex-row lg:flex lg:flex-none">
    <?php include './../ui/navigation.php'; ?>
    
   
    <main id="page-contents_addContent" class="flex-1 ">
<!-- to echo role or staff id  -->
<?php //echo "Role : ".$_SESSION['role'].' | '.'Position : '. $_SESSION['position'];  ?>
     
<div class="flex flex-row w-full">
    <!-- status determination  -->
    <input type="hidden" name="stage" id="contentStage" value="<?php echo $_GET['stage'];  ?>">
     <!-- determine the role  -->
     <input type="hidden" name="role" id="currentRole"  value="<?php echo $_SESSION['position']; ?>">
    <!-- determine the author -->
    <input type="hidden" name="role" id="articleAuthor" value="<?php echo $author; ?>">
    <!-- determine staff id -->
    <input type="hidden" name="role" id="staffID"  value="<?php echo $_SESSION['staffID']; ?>">

    <div class="w-full p-8">
        <div class="flex-1 min-w-0">
            <h5 id="wysiwyg_section" class="font-bold uppercase text-md text-amber-600">SECTION</h5>
            <h2 id="wysiwyg_title" class="mt-2 text-3xl font-medium leading-snug text-gray-900 sm:text-3xl sm:tracking-tight"><?php echo $title;?></h2>
            <h5 class="mt-2 text-sm font-medium text-gray-700">by <a id="wysiwyg_author" class="text-amber-600"><?php echo $fname . ' ' .$lname ?></a></h5>
            <h5 id="wysiwyg_timestamp" class="mt-1 text-sm text-gray-500">Published MMMM DD y at HH:mm A</h5>
        </div>

        <!-- visual  -->
        <div class="flex items-center justify-center w-full mt-8"> 

            <?php if($_SESSION['role']=='Associate Editor' || $_SESSION['role']=='Editor-in-Chief')?>
            <label id="ekekEdit" for="wysiwyg_leadVisual" class="hidden flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-96">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>  

                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> your lead visual</p>
                    <p class="text-xs text-gray-300">SVG, PNG, JPG or GIF</p>
                </div>
                <!-- image file  -->
                <input id="wysiwyg_leadVisualEdit" onchange="previewEdit(event)"  type="file" accept="image/png, image/gif, image/jpeg , image/svg , image/jpg " class="hidden " required />
                <!-- end image file  -->
            </label>    

            <!-- preview -->
            <img id="imagePreviewEdit" onclick="editImage()" src="./../../resources/uploads/contents/<?php echo $visual;?>" class="flex flex-col items-center justify-center  object-cover w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-96" />
        </div>

     
        <!-- need to make this a article area  -->
        <div class="max-w-full mx-auto mt-8 prose">
            <article id="wysiwyg_leadTextEdit" class="lead" contenteditable="true" placeholder=""><?php echo $leadText;?></article>
            <article id="wysiwyg_contentEdit" class="h-full" contenteditable="true" placeholder="Tell your story..."><?php echo $content;?></article>
        </div>
        <!-- need to make this as a article area  -->
    </div>


    <div class="flex-none w-full h-full max-w-sm max-h-screen py-8 pl-4 pr-8">
    
    <!-- button will appearance here  -->  

   
    
    <!-- 1 approval of article , editing content , arhiving content  -->
    <?php   
    if( ($_SESSION['position'] == 'Editor-in-Chief' || $_SESSION['position'] == 'Associate Editor') && ($stage =='Upon Approval' || $stage =='Published')){ ?>

        <button id="btn_updateContent" type="button" value="<?php echo $_GET['slugID'];?>" class="inline-flex items-center px-4 py-2 text-sm text-white border border-transparent rounded-md h-fit bg-amber-600 hover:bg-amber-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 -ml-1">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
            
               Approve
            </button>    
            <button id="btn_archiveContent" type="button" value="<?php echo $_GET['slugID'];?>" class="inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md h-fit hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 -ml-1">
                        <path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 002 4.25v11.5A2.25 2.25 0 004.25 18h11.5A2.25 2.25 0 0018 15.75V4.25A2.25 2.25 0 0015.75 2H4.25zM6 13.25V3.5h8v9.75a.75.75 0 01-1.064.681L10 12.576l-2.936 1.355A.75.75 0 016 13.25z" clip-rule="evenodd" />
                    </svg>

                Archive 
                </button>  

      <?php   }  ?>
     <!-- 2 approval of article , editing content , arhiving content  -->
     <?php  if(($_SESSION['position'] == 'Literary Editor' || $_SESSION['position'] == 'News and Current Affairs Editor' ||
                $_SESSION['position'] == 'Feature Editor') && ($stage == 'Under Review' || $stage == 'Upon Approval' || $stage=='Draft')  ){ ?>       

            <button id="btn_updateContent" type="button" value="<?php echo $_GET['slugID'];?>" class="inline-flex items-center px-4 py-2 text-sm text-white border border-transparent rounded-md h-fit bg-amber-600 hover:bg-amber-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 -ml-1">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                      
              Update / Approve
            </button>      
                    
            <button id="btn_archiveContent" type="button" value="<?php echo $_GET['slugID'];?>" class="inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md h-fit hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 -ml-1">
                        <path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 002 4.25v11.5A2.25 2.25 0 004.25 18h11.5A2.25 2.25 0 0018 15.75V4.25A2.25 2.25 0 0015.75 2H4.25zM6 13.25V3.5h8v9.75a.75.75 0 01-1.064.681L10 12.576l-2.936 1.355A.75.75 0 016 13.25z" clip-rule="evenodd" />
                    </svg>

                Archive 
                </button>  

      <?php  }  ?>
       

     <!-- 3 update the article  content only  -->
      <?php     
            if(($_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff'  ||
               $_SESSION['position'] == 'Managing Editor for Administrations' || $_SESSION['position'] == 'Senior Managing Editor for Finance' || 
               $_SESSION['position'] == 'Junior Managing Editor for Finance'  || $_SESSION['position'] == 'Managing Editor for Research and Development' ||
                $_SESSION['position'] == 'Managing Editor for Community Involvement') && ($stage == 'Under Review' || $stage == 'Upon Approval' || $stage == 'Draft')  ) {  ?>

          <button id="btn_updateContent" type="button" value="<?php echo $_GET['slugID'];?>" class="inline-flex items-center px-4 py-2 text-sm text-white border border-transparent rounded-md h-fit bg-amber-600 hover:bg-amber-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 -ml-1">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                    Update 
            </button> 
                    
            <!-- saving changes -->
            <?php  if( $stage == 'Draft'){  ?>
                <button id="btn_savedraftContent" type="button" value="<?php echo $_GET['slugID'];?>" class="inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md h-fit hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 -ml-1">
                        <path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 002 4.25v11.5A2.25 2.25 0 004.25 18h11.5A2.25 2.25 0 0018 15.75V4.25A2.25 2.25 0 0015.75 2H4.25zM6 13.25V3.5h8v9.75a.75.75 0 01-1.064.681L10 12.576l-2.936 1.355A.75.75 0 016 13.25z" clip-rule="evenodd" />
                    </svg>

                  Save 
            </button>  

          <?php  }?>
            
          <button id="btn_archiveContent" type="button" value="<?php echo $_GET['slugID'];?>" class="inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md h-fit hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 -ml-1">
                        <path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 002 4.25v11.5A2.25 2.25 0 004.25 18h11.5A2.25 2.25 0 0018 15.75V4.25A2.25 2.25 0 0015.75 2H4.25zM6 13.25V3.5h8v9.75a.75.75 0 01-1.064.681L10 12.576l-2.936 1.355A.75.75 0 016 13.25z" clip-rule="evenodd" />
                    </svg>

                Archive 
                </button>  

      <?php  } ?>

        <!-- <div class="flex flex-row-reverse mb-8 gap-x-2">
            <button id="btn_addContent_submitContent" type="button" class="inline-flex items-center px-4 py-2 text-sm text-white border border-transparent rounded-md h-fit bg-amber-600 hover:bg-amber-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 -ml-1">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>

                Submit content
            </button>
            <button id="btn_content_generateReport" type="button" class="inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md h-fit hover:bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 -ml-1">
                    <path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 002 4.25v11.5A2.25 2.25 0 004.25 18h11.5A2.25 2.25 0 0018 15.75V4.25A2.25 2.25 0 0015.75 2H4.25zM6 13.25V3.5h8v9.75a.75.75 0 01-1.064.681L10 12.576l-2.936 1.355A.75.75 0 016 13.25z" clip-rule="evenodd" />
                </svg>

                Save as draft
            </button>
        </div> -->
<!-- end button appearance  -->
        <ul role="list" class="mt-4 space-y-4">

            <!-- <li class="hidden divide-y rounded-lg bg-gray-50">
                <div class="flex items-center justify-between w-full p-4 space-x-6">
                    <div class="flex-1 ">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium text-gray-900 ">Draft</h3>
                            <button class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-900">
                                View stages
                            </button>
                        </div>
                        <div class="flex flex-row mt-2">
                            <img class="flex-shrink-0 object-cover object-center w-8 h-8 my-auto bg-gray-300 rounded-full" src="./../../resources/uploads/editorial-board/<?php echo $_SESSION['image']; ?>" alt="" />
                            <p class="ml-3">
                                <span class="block text-sm font-medium text-gray-900"> <?php echo $_SESSION['fName'] . " " . $_SESSION['mName'] . " " . $_SESSION['lName'] ?></span>
                                <span class="block text-xs text-gray-700">Just now</span>
                            </p>
                        </div>
                    </div>
                </div>
            </li> -->

            <!-- <li class="hidden divide-y rounded-lg bg-green-50">
                <div class="flex items-center justify-between w-full p-4 space-x-6">
                    <div class="flex-1 ">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium text-green-900 ">Published</h3>
                            <button class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-green-100 text-green-900">
                                View stages
                            </button>
                        </div>
                        <div class="flex flex-row mt-2">
                            <img class="flex-shrink-0 object-cover object-center w-8 h-8 my-auto bg-gray-300 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="" />
                            <p class="ml-3">
                                <span class="block text-sm font-medium text-gray-900"> Marielle Jiean Teodoro </span>
                                <span class="block text-xs text-gray-700"> November 14, 2022 - 12:59 AM</span>
                            </p>
                        </div>
                    </div>
                </div>
            </li> -->

            <li class="border border-gray-300 divide-y rounded-lg">
                <div class="flex items-center justify-between w-full p-4 space-x-6">
                    <div class="flex-1">

                        <h3 class="font-medium text-gray-900 ">Content information</h3>

                        <div class="mt-4 space-y-4">
                            <div>
                                <label for="addContent_slug" class="block text-sm font-medium text-gray-700">Slug</label>
                                <div id="addContent_slug" name="addContent_slug"  class="block w-full px-3 py-2 mt-1 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                                    <?php  echo $slugID;?>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Section</label>
                                <select id="addContent_section" name="addContent_section" class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                                    <!-- <option value="Section" selected>Select a section</option> -->
                                    <option value="Announcement" <?php if($section == 'Announcement')echo "selected"; ?>>Announcement</option>
                                    <option value="News"<?php if($section == 'News')echo "selected"; ?>>News</option>
                                    <option value="Feature" <?php if($section == 'Feature')echo "selected"; ?>>Feature</option>
                                    <option value="Sports" <?php if($section == 'Sports')echo "selected"; ?>>Sports</option>
                                    <option value="Editorial" <?php if($section == 'Editorial')echo "selected"; ?>>Editorial</option>
                                    <option value="Literary"<?php if($section == 'Literary')echo "selected"; ?>>Literary</option>
                                </select>
                            </div>

                         

                           

                            <!-- status --> 
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status : </label>
                                <p class="block text-sm font-medium  text-gray-700"><?php  echo $stage; ?></p>
                            </div>

                        </div>

                    </div>
                </div>
            </li>



            <li class="hidden border border-gray-300 rounded-lg">
                <div class="flex items-center justify-between w-full px-4 pt-4 space-x-6 divide-y ">
                    <div class="flex-1">

                        <div class="flex justify-between w-full gap-x-2">
                            <h3 class="font-medium text-gray-900 ">Comments</h3>

                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-900">
                                0
                            </span>
                        </div>

                        <div class="mx-auto my-12 text-center">No comments yet</div>

                


                    </div>
                </div>
                <div class="flex px-4 py-2 bg-gray-100 gap-x-3">
                    <img class="object-cover object-center w-8 h-8 rounded-full" src="./../../resources/uploads/editorial-board/<?php echo $_SESSION['image']; ?>" alt="">

                    <div class="w-full px-0 pt-1.5 text-sm text-gray-700 bg-transparent border-0 grow-0 focus:border-0 focus:ring-0" placeholder="Add comment..." contenteditable="true"></div>
                    <div class="flex flex-col-reverse">
                        <button type="button" class="inline-flex items-center flex-none w-8 h-8 text-white border border-transparent rounded-full shadow-sm bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                            <!-- Heroicon name: solid/plus-sm -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 m-auto">
                                <path d="M3.105 2.289a.75.75 0 00-.826.95l1.414 4.925A1.5 1.5 0 005.135 9.25h6.115a.75.75 0 010 1.5H5.135a1.5 1.5 0 00-1.442 1.086l-1.414 4.926a.75.75 0 00.826.95 28.896 28.896 0 0015.293-7.154.75.75 0 000-1.115A28.897 28.897 0 003.105 2.289z" />
                            </svg>


                        </button>
                    </div>
                </div>
            </li> 


            <!-- comment section  --> 
            <li class="border border-gray-300 rounded-lg">
                    <div class="flex items-center justify-between w-full px-4 pt-4 space-x-6 divide-y ">
                        <div class="flex-1">
                            

                            <div id="commentCount" class="flex justify-between w-full gap-x-2"> 

                            <?php 
                         $slugID  = $_GET['slugID']; 
                         $countComments = mysqli_query($dbConnect,"SELECT * FROM comments WHERE slugID='$slugID' ") ;
                         $count = mysqli_num_rows($countComments); 
                        ?>  
                                <h3 class="font-medium text-gray-900 ">Comments</h3>

                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-900">
                                  <?php echo $count ; ?>
                                </span>
                            </div>
                            
                            <!-- Comment  -->
                        

                            <div id='commentSection' class="space-y-2"> 


                                <ul role="list"  class="divide-y divide-gray-200"> 

                                <?php   
                                
                                $slugID  = $_GET['slugID']; 
                                $fetchComment = "SELECT * FROM comments LEFT JOIN staffs ON staffs.staffID = comments.authorID 
                                LEFT JOIN contents ON contents.slug = comments.slugID WHERE comments.slugID = '$slugID' ORDER BY comments.commentTimestamp DESC "; 

                                $result = $dbConnect->query($fetchComment); 
                                if(mysqli_num_rows($result)> 0){
                                        while($row = $result->fetch_assoc()) {
                                            
                                            ?> 
                                    <li class="py-4">
                                        <div class="flex space-x-3">
                                            <img class="object-cover object-center w-8 h-8 rounded-full" src="./../../resources/uploads/editorial-board/<?php echo $row['image']; ?>" alt="">
                                            <div class="flex-1">
                                                <div class="flex items-center justify-between">
                                                    <h3 class="text-sm font-medium text-gray-900"><?php echo $row['fName'].' '.$row['lName'] ;?></h3>
                                                
                                                </div>
                                                <p class="mt-1 text-sm text-gray-700"><?php echo $row['message']; ?></p> 

                                                <div class="flex items-center justify-between mt-2">
                                            
                                                    <p class="text-xs text-gray-500"><?php echo date("F j , Y", strtotime($row["commentTimestamp"])).' / '.date("g:i A", strtotime($row["commentTimestamp"]));?>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                            <?php }   
                                }
                                else { ?>
                                        <div class="mx-auto my-12 text-center">No Comments</div>
                             <?php            
                                }
                                ?>
                                </ul>
                            </div>


                        </div>
                    </div>
                    
                    <!-- Published Article Will no longer accept comments  -->
                    <?php if ($stage !='Published'  )   { ?>
                    <div class="flex px-4 py-2 bg-gray-100 gap-x-3">
                        <img class="object-cover object-center w-8 h-8 rounded-full" src="./../../resources/uploads/editorial-board/<?php echo $_SESSION['image']; ?>" alt="">

                        <div id="commentArea" class="w-full px-0 pt-1.5 text-sm text-gray-700 bg-transparent border-0 grow-0 focus:border-0 focus:ring-0" placeholder="Add comment..." contenteditable="true"></div>
                        <div class="flex flex-col-reverse">
                            <button type="button" id="uploadComment" value="<?php echo $slugID;?>" class="inline-flex items-center flex-none w-8 h-8 text-white border border-transparent rounded-full shadow-sm bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                <!-- Heroicon name: solid/plus-sm -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 m-auto">
                                    <path d="M3.105 2.289a.75.75 0 00-.826.95l1.414 4.925A1.5 1.5 0 005.135 9.25h6.115a.75.75 0 010 1.5H5.135a1.5 1.5 0 00-1.442 1.086l-1.414 4.926a.75.75 0 00.826.95 28.896 28.896 0 0015.293-7.154.75.75 0 000-1.115A28.897 28.897 0 003.105 2.289z" />
                                </svg>


                            </button>
                        </div>
                    </div> 
                    <?php  }?>
                </li>

        </ul>
    </div>
</div>

</main>

</body>

</html>