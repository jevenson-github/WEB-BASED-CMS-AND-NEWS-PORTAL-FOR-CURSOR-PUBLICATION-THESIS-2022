<?php
$title = 'Gallery';
$page = 'gallery';

require './../auth/dbConnect.php';
require './../auth/session.php';

$query = "SELECT DISTINCT * FROM activitylog";
$result = mysqli_query($dbConnect, $query);

checkSession();
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CURSOR CMS Sign In page">
    <link rel="stylesheet" href="../styles/tailwind.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="resources/favicon.svg"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" defer></script>
    <script type="text/javascript" src="./../plugins/jquery.min.js" defer></script>
    <script type="text/javascript" src="./../scripts/gallery.js" defer></script>

   
    <!-- sweet alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.all.min.js"></script>


    <title><?php echo $title ?> - CURSOR CMS</title> 


</head>

<body class="flex-row lg:flex lg:flex-none">
    <?php include './../ui/navigation.php'; ?>

    <main class="flex-1 p-8">
    <div class="lg:flex lg:items-center lg:justify-between">
    <div class="flex-1 min-w-0">
        <h2 class="text-2xl font-semibold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Gallery</h2>
        <div class="flex flex-col mt-1 sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
            <div class="flex items-center mt-2 text-sm text-gray-500">Manage and track the Publication's album within the CMS.</div>
        </div>
    </div>
    <div class="flex flex-row items-start gap-x-2">


        <a href="./index.php">
        <button id="btn_Videos" type="button" class="inline-flex items-center px-4 py-2 text-sm text-white border border-transparent rounded-md h-fit bg-amber-600 hover:bg-amber-700">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
</svg>


            &nbsp; Back
        </button>
        </a>



    </div> 

</div>   

<br><br><br><br><br>
    <div class="max-w-full px-4 pt-8 mx-auto sm:px-8 lg:max-w-full lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                        <div class="flex-1 min-w-0">
                            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Gallery <?php echo $_GET['albumTitle']; ?></h2>
                        </div>
                         
                        <div class="flex mt-4 md:mt-0 md:ml-4"> 
                        <h1>Add Image to this album : </h1>
                        <!-- <form method="post" id="upload_current_album" enctype="multipart/form-data"> -->
                        <input type="hidden" name="current_album" id="current_album" value="<?php echo $_GET['albumTitle']; ?>">
                        <input type="file" name="image_add" id="image_add" multiple="true" accept=".jpg, .png, .gif" required />
                        <button onclick="addImage();">Add Image</button>
                        <!-- <input type="submit" name="insert_current_album" id="insert_current_album" value="Add Image" class="btn btn-info" /> -->
                            
                        <!-- </form> -->
                        <!-- <a href="./addImage.php">
                                <button type="button" 
                                    class="inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-white border border-transparent rounded-md bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                    <svg class="flex-shrink-0 w-5 h-5 mr-3" viewBox="0 0 16 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.31543 19.1816H12.6846C14.5742 19.1816 15.5498 18.1885 15.5498 16.29V8.42383H8.95801C7.85938 8.42383 7.33203 7.89648 7.33203 6.79785V0.135742H3.31543C1.43457 0.135742 0.450195 1.12891 0.450195 3.03613V16.29C0.450195 18.1885 1.43457 19.1816 3.31543 19.1816ZM9.125 7.14062H15.4619C15.4092 6.73633 15.1191 6.3584 14.6621 5.89258L9.85449 1.02344C9.41504 0.575195 9.01953 0.276367 8.61523 0.223633V6.63086C8.62402 6.97363 8.79102 7.14062 9.125 7.14062Z"
                                            fill="#FFFFFF" />
                                    </svg>
            
                                </button>
                                </a> -->
                        </div>          
    </div>  
             
    <br><br><br><br><br>

<!-- display  image -->
<div class="grid gap-3 grid-cols-4 "> 
                        
                    <?php   
                    //FETCH IMAGE 
                    $albumTitle = $_GET['albumTitle']; 
                    $query = "SELECT * FROM gallery  WHERE title ='$albumTitle' ";
                    $result = mysqli_query($dbConnect,$query); 
                    while($row = mysqli_fetch_array($result)) { 
                            ?>
                    <div>  
                    <img src='data:image/jpeg;base64,<?= base64_encode( $row['visual']); ?>' style="width:300px; height:300px;" /> 
                    <button id="deleteButton" class=" bg-amber-600  text-white p-2 mt-10  mb-8" onclick="deleteId($(this).val());" value="<?php echo $row['galleryID']; ?>" >Remove this Image</button>
                     </div>  
                <?php  }?>   

</div>
     
    </div>




</main>

</body>
</html>