<?php
$title = 'Staffs';
$page = 'staffs';

require './../auth/dbConnect.php';
require './../auth/session.php';

// CURRENT EDITORIAL BOARD COUNT
$query_ebCurrentCount = mysqli_query($dbConnect, "SELECT COUNT(*) FROM staffs INNER JOIN editorialboard ON staffs.staffID = editorialboard.staffID INNER JOIN ebyear ON editorialboard.acadYear = ebyear.acadYear WHERE ebyear.status = 'Active'");
$execute_ebCurrentCount = mysqli_fetch_assoc($query_ebCurrentCount);
$ebCurrentCount = $execute_ebCurrentCount['COUNT(*)'];

// PAST EDITORIAL BOARD COUNT
$query_ebPastCount = mysqli_query($dbConnect, "SELECT COUNT(*) FROM staffs INNER JOIN editorialboard ON staffs.staffID = editorialboard.staffID INNER JOIN ebyear ON editorialboard.acadYear = ebyear.acadYear WHERE ebyear.acadYear = ( SELECT acadYear FROM ebyear ORDER BY acadYear DESC LIMIT 1, 1 );");
$execute_ebPastCount = mysqli_fetch_assoc($query_ebPastCount);
$ebPastCount = $execute_ebPastCount['COUNT(*)'];
$ebDifferenceCount = round((($ebCurrentCount / $ebPastCount) * 100) - 100, 2);

// CURRENT HIGHER EDITORIAL BOARD COUNT
$query_hebCurrentCount = mysqli_query($dbConnect, "SELECT COUNT(DISTINCT(staffs.staffID)) FROM staffs INNER JOIN editorialboard ON staffs.staffID = editorialboard.staffID INNER JOIN ebyear ON editorialboard.acadYear = ebyear.acadYear WHERE ebyear.status = 'Active' AND editorialboard.role = 'Higher Editorial Board'");
$execute_hebCurrentCount = mysqli_fetch_assoc($query_hebCurrentCount);
$hebCurrentCount = $execute_hebCurrentCount['COUNT(DISTINCT(staffs.staffID))'];
$hebDifferenceCount = $hebCurrentCount - 3;

// CURRENT SECTION EDITOR AND SECTION HEAD COUNT
$query_sehCurrentCount = mysqli_query($dbConnect, "SELECT COUNT(DISTINCT(staffs.staffID)) FROM staffs INNER JOIN editorialboard ON staffs.staffID = editorialboard.staffID INNER JOIN ebyear ON editorialboard.acadYear = ebyear.acadYear WHERE ebyear.status = 'Active' AND (editorialboard.role = 'Section Head' or editorialboard.role = 'Section Editor');");
$execute_sehCurrentCount = mysqli_fetch_assoc($query_sehCurrentCount);
$sehCurrentCount = $execute_sehCurrentCount['COUNT(DISTINCT(staffs.staffID))'];
$sehDifferenceCount = $sehCurrentCount - 3;

// CURRENT MEMBERS AND STAFFS COUNT
$query_msCurrentCount = mysqli_query($dbConnect, "SELECT COUNT(DISTINCT(staffs.staffID)) FROM staffs INNER JOIN editorialboard ON staffs.staffID = editorialboard.staffID INNER JOIN ebyear ON editorialboard.acadYear = ebyear.acadYear WHERE ebyear.status = 'Active' AND editorialboard.role = 'Members and Staff';");
$execute_msCurrentCount = mysqli_fetch_assoc($query_msCurrentCount);
$msCurrentCount = $execute_msCurrentCount['COUNT(DISTINCT(staffs.staffID))'];
$msDifferenceCount = $msCurrentCount - 3;

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
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
   <script type="text/javascript" src="./../scripts/staffs.js" defer></script>
   <title><?php echo $title ?> - CURSOR CMS</title>
</head>

<body class="flex-row lg:flex lg:flex-none">
   <?php include './../ui/navigation.php'; ?>
   <?php include './staffsDashboard.php' ?>
   <?php include './modal_invitePerson.php' ?>

   


</body>






</html>