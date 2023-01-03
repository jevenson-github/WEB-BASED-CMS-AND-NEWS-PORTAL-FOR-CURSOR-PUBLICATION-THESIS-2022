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
    <link rel="icon" href="../resources/favicon.svg"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" defer></script>
    <script type="text/javascript" src="./../plugins/jquery.min.js" defer></script>
    <script type="text/javascript" src="./../scripts/gallery.js" defer></script> 

    
    <!-- sweet alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.all.min.js"></script>

   
    <title><?php echo $title ?> - CURSOR CMS</title> 


</head>

<body class="flex-row lg:flex lg:flex-none">
    <?php include './../ui/navigation.php'; ?>
    <?php //include './newsletterDashboard.php'; ?>
    

    <main class="flex-1 p-8">

<div class="lg:flex lg:items-center lg:justify-between">
    <div class="flex-1 min-w-0">
        <h2 class="text-2xl font-semibold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Gallery</h2>
        <div class="flex flex-col mt-1 sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
            <div class="flex items-center mt-2 text-sm text-gray-500">Manage and track the Publication's gallery within the CMS.</div>
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
<div>
    
    <!-- <form method="post" id="upload_multiple_images" enctype="multipart/form-data"> -->
                <label for="title">Album Title</label>
                <input type="text" name="title" id="title" placeholder="Album Title" required> 
                <input type="file" name="image[]" id="image" multiple="true" accept=".jpg, .png, .gif" required />
                <!-- <input type="submit" id="insert" value="Submit" class="btn btn-info" /> -->
                <button id="insert" onclick="addAlbum();" type="button" class="inline-flex items-center px-4 py-2 text-sm text-white border border-transparent rounded-md h-fit bg-amber-600 hover:bg-amber-700">INSERT</button>
            <!-- </form> -->
    </div>
    <!-- add form  -->




</main>
</body>


</html>