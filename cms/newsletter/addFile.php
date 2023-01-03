<?php
$title = 'Newsletter';
$page = 'newsletter';

require './../auth/dbConnect.php';
require './../auth/session.php';

$query = "SELECT DISTINCT * FROM activitylog";
$result = mysqli_query($dbConnect, $query);

checkSession();
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CURSOR CMS Sign In page">
    <link rel="stylesheet" href="../styles/tailwind.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="../resources/favicon.svg"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" defer></script>
    <script type="text/javascript" src="./../plugins/jquery.min.js" defer></script>
    <script type="text/javascript" src="./../scripts/newsletter.js" defer></script> 
        
       <!-- sweet alert  -->
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.all.min.js"></script>
    <title><?php echo $title ?> - CURSOR CMS</title>
</head>

<body class="flex-row lg:flex lg:flex-none">
    <?php include './../ui/navigation.php'; ?>
    

    <main class="flex-1 p-8">  

    <div class="lg:flex lg:items-center lg:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-semibold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Newsletter</h2>
            <div class="flex flex-col mt-1 sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                <div class="flex items-center mt-2 text-sm text-gray-500">Manage and track the Publication's newsletter within the CMS.</div>
            </div>
        </div>

        <a href="./index.php">
            <button id="btn_addNewsLetter" type="button" class="inline-flex items-center px-4 py-2 text-sm text-white border border-transparent rounded-md h-fit bg-amber-600 hover:bg-amber-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
</svg>

                Back 
            </button>
            </a>

    </div>   
    <!-- <div>
    <form method="post" id="upload_pdfFile" enctype="multipart/form-data">
                <label for="title">Heading</label>
                <input type="text" name="title" id="title" placeholder="Heading" required> 
                <br><hr>

                <label for="subtitle">Sub heading</label>
                <input type="text" name="subtitle" id="title" placeholder="Sub Title" >
                <br> <hr>
               
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" accept="image/png, image/jpg" required>
                <br><hr>
                <label for="version">Version</label>
                <input type="text" name="version" id="version" placeholder="Version" required >
                <br><hr>
                <label for="pdfFile">PDF FILE</label>
                <input type="file" name="pdfFile" id="pdfFile" accept = "application/pdf" required />
                <br><hr>
                <input type="submit" name="insert" id="insert" value="Upload" class="btn btn-info" />
            </form>
    </div> -->
    <!-- add form  --> 


    <form class="w-1/2 max-w-lg mt-10"  method="post" id="upload_pdfFile" enctype="multipart/form-data">
  <div class="-mx-3 mb-6 flex flex-wrap">
    <div class="mb-6 w-full px-3 p-12   md:mb-0 md:w-1/2">
      <label class="mb-2 block text-md font-bold uppercase tracking-wide text-gray-700" for="grid-first-name"> Heading </label>
      <input class="block w-full appearance-none rounded border border-gray-200  py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"  name="title" id="title" type="text" placeholder="Heading" />
    </div>
    <div class="w-full px-3 md:w-1/2">
      <label class="mb-2 block text-md font-bold uppercase tracking-wide text-gray-700" for="grid-last-name"> Subheading </label>
      <input class="block w-full appearance-none rounded border border-gray-200  py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none" name="subtitle" id="title"  placeholder="Subheading" />
    </div>
  </div>
  <div class="-mx-3 mb-6 flex flex-wrap">
    <div class="w-full px-3">
      <label class="mb-2 block text-md font-bold uppercase tracking-wide text-gray-700" for="grid-password"> Thumbnail </label>
      <input class="mb-3 block w-full appearance-none rounded  border border-gray-200   p-12 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"  name="thumbnail" id="thumbnail" accept="image/png, image/jpg" type="file"  />
    </div>

    <div class="w-full px-3">
      <label class="mb-2 block text-md font-bold uppercase tracking-wide text-gray-700" for="grid-password"> PDF File </label>
      <input class="mb-3 block w-full appearance-none rounded  border border-gray-200   p-12  leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none" name="pdfFile" id="pdfFile" accept = "application/pdf" type="file"  />
    </div>
  </div>
  <div class="-mx-3 mb-2 flex flex-wrap">
    <div class="mb-6 w-full px-3 md:mb-0 md:w-1/3">
     <button class="bg-amber-600 text-white py-2 px-4 rounded">
    Add
</button>
    </div>

   
  </div>
</form>


</main>


    
</body>
</html>
