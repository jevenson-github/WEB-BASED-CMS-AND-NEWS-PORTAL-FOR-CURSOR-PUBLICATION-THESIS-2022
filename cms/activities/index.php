<?php
$title = 'Activities';
$page = 'activities';

require './../auth/dbConnect.php';
require './../auth/session.php';

$query = "SELECT DISTINCT * FROM activitylog";
$result = mysqli_query($dbConnect, $query);

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
    <link rel="icon" href="../resources/favicon.svg"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" defer></script>
    <script type="text/javascript" src="./../plugins/jquery.min.js" defer></script>
    <script type="text/javascript" src="./../plugins/datatables.min.js" defer></script>
    <!-- <script src="./../scripts/public/tinymce/tinymce.min.js" defer></script>
    <script src="./../scripts/public/tinymce-jquery/tinymce-jquery.min.js" defer></script> -->
    <script type="text/javascript" src="./../scripts/activities.js" defer></script>

    <title><?php echo $title ?> - CURSOR CMS</title>
</head>

<body class="flex-row lg:flex lg:flex-none">
    <?php include './../ui/navigation.php'; ?>
    <?php include './activitiesDashboard.php'; ?>






</body>


</html>