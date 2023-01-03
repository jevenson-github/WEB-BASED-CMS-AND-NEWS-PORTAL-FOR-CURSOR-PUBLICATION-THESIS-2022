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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CURSOR CMS Sign In page">
    <link rel="stylesheet" href="../styles/tailwind.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="resources/favicon.svg">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script type="text/javascript" src="./../plugins/jquery.min.js"></script>
    <script type="text/javascript" src="./../scripts/newsletter.js"></script>
    <title><?php echo $title ?> - CURSOR CMS</title>
</head>
<style>
    embed{
        width: 100%;
        height: 100vh;
    }
</style>
<body class="flex-row lg:flex lg:flex-none">
<embed name="plugin" src="pdf/<?php echo $_GET['pdfFilename']; ?>" type="application/pdf">

</body>


</html>