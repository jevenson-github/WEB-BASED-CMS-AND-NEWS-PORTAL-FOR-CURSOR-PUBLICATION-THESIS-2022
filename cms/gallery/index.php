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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CURSOR CMS Sign In page">
    <link rel="stylesheet" href="../styles/tailwind.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="../resources/favicon.svg"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" defer></script>
    <script type="text/javascript" src="./../plugins/jquery.min.js" defer></script>
    <script type="text/javascript" src="./../plugins/datatables.min.js" defer></script>
    <!-- <script src="./../scripts/public/tinymce/tinymce.min.js" defer></script>
    <script src="./../scripts/public/tinymce-jquery/tinymce-jquery.min.js" defer></script> -->
    <script type="text/javascript" src="./../scripts/gallery.js" defer></script>


   
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
            <div class="flex items-center mt-2 text-sm text-gray-500">Manage and track the Publication's album within the CMS.</div>
        </div>
    </div>
    <div class="flex flex-row items-start gap-x-2">


        <a href="addImage.php">
        <button id="btn_Videos" type="button" class="inline-flex items-center px-4 py-2 text-sm text-white border border-transparent rounded-md h-fit bg-amber-600 hover:bg-amber-700">
            <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
            </svg>
            Add Album
        </button>
        </a>



    </div> 

</div>   

<!-- <br><br><br><br><br>
<div class="grid  gap-x-8 grid-cols-4 "> 
<?php   
                    //fetch_images.php
          //  $query = "SELECT * FROM gallery GROUP BY title  ORDER BY galleryID  DESC  ";
           // $result = mysqli_query($dbConnect,$query);  

           // while ($row = mysqli_fetch_assoc($result)) {  ?>
           <div>
            <div class="container">
            <h4 class=" mb-16"><?php //echo $row['title']; ?> Album </h4>

            <br>      
            <img src='data:image/jpeg;base64,<?//= base64_encode( $row['visual'])?>' alt="Nature" style="width:500px; height:450px;">
                
            <div class="text-block">
                
                <a href="viewGallery.php?albumTitle=<?php //echo $row['title'];?>">   
                <button class="button bg-amber-600  text-white p-2 mt-10  mb-8">View Album</button>
                </a> 
            </div>
            </div>
            </div> 

            <?php  //} ?>

</div> -->

<br><br><br><br>
<div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table id="mytable" class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Staff</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Title</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max"></th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max"></th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max"></th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max"></th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">View</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max"></th>
                               
                            </tr>
                        </thead>
                        <tbody  class='divide-y'>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>
</body>


</html>