<?php

$title = 'Dashboard';
$page = 'dashboard';

require('./auth/session.php');
require('./ui/affirmation.php');

checkSession();

?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="CURSOR CMS Sign In page">
   <link rel="stylesheet" href="styles/tailwind.css">
   <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
   <link rel="icon" href="resources/favicon.svg">
   <title><?php echo $title ?> - CURSOR CMS</title>
</head>

<body class="h-full bg-[url('../resources/bg/bg_authLight.jpg')] bg-cover bg-center antialiased"> 

 <?php echo header('Location: ./dashboard/')?>
 
</body>

</html>