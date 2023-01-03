<?php

require './../configs/dbConnect.php';

# PAGE DETAILS
$title = "About";

$ebAY = "2022-2023";

# EDITOR IN CHIEF
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Editor-in-Chief' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$heb_eic = mysqli_fetch_assoc($result);

#ASSOCIATE EDITOR
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Associate Editor' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$heb_ae = mysqli_fetch_assoc($result);

#MANAGING EDITOR FOR ADMINISTRATION
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Managing Editor for Administration' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$heb_mea = mysqli_fetch_assoc($result);

#MANAGING EDITOR FOR COMMUNITY INVOLVEMENT
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Managing Editor for Community Involvement' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$heb_meci = mysqli_fetch_assoc($result);

#MANAGING EDITOR FOR RESEARCH AND DEVELOPMENT
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Managing Editor for Research and Development' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$heb_merd = mysqli_fetch_assoc($result);

#SENIOR MANAGING EDITOR FOR FINANCE
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Senior Managing Editor for Finance' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$heb_smef = mysqli_fetch_assoc($result);

#JUNIOR MANAGING EDITOR FOR FINANCE
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Junior Managing Editor for Finance' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$heb_jmef = mysqli_fetch_assoc($result);

#ART EDITOR
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Art Editor' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$seh_ae = mysqli_fetch_assoc($result);

#FEATURES AND LIFESTYLE EDITOR
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Features and Lifestyle Editor' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$seh_fle = mysqli_fetch_assoc($result);

#LITERARY EDITOR
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Literary Editor' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$seh_le = mysqli_fetch_assoc($result);

#NEWS AND CURRENT AFFAIRS EDITOR
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'News and Current Affairs Editor' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$seh_ncae = mysqli_fetch_assoc($result);

#HEAD CARTOONIST
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Head Cartoonist' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$seh_hc = mysqli_fetch_assoc($result);

#HEAD LAYOUT ARTIST
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Head Layout Artist' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$seh_hla = mysqli_fetch_assoc($result);

#HEAD PHOTOJOURNALIST
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Head Photojournalist' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$seh_hp = mysqli_fetch_assoc($result);

#HEAD VIDEO EDITOR
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Head Video Editor' AND acadYear = '$ebAY'";
$result = mysqli_query($dbConnect, $query);
$seh_hve = mysqli_fetch_assoc($result);

#CARTOONIST
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Cartoonist' AND acadYear = '$ebAY'";
$result_ms_c = mysqli_query($dbConnect, $query);

#LAYOUT ARTIST
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Layout Artist' AND acadYear = '$ebAY'";
$result_ms_la = mysqli_query($dbConnect, $query);

#PHOTOJOURNALIST
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Photojournalist' AND acadYear = '$ebAY'";
$result_ms_p = mysqli_query($dbConnect, $query);

#STAFF WRITER
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Staff Writer' AND acadYear = '$ebAY'";
$result_ms_sw = mysqli_query($dbConnect, $query);

#SOUND DESIGNER
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Sound Designer' AND acadYear = '$ebAY'";
$result_ms_sd = mysqli_query($dbConnect, $query);


#VIDEO EDITOR
$query = "SELECT CONCAT(staffs.fName, ' ', staffs.lName) as name, editorialboard.image, username FROM editorialboard LEFT OUTER JOIN staffs ON editorialboard.staffID = staffs.staffID WHERE editorialboard.position = 'Video Editor' AND acadYear = '$ebAY'";
$result_ms_ve = mysqli_query($dbConnect, $query);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- WEBPAGE META DATA -->
    <title><?= $title ?> | CURSOR eConnect</title>
    <meta name="description" content="<?= $leadText ?>">
    <meta property="og:url" content="https://www.cursorpub.me/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $title ?> | CURSOR eConnect">
    <meta property="og:description" content="<?= $leadText ?>">
    <meta property="og:image" content="./../resources/uploads/contents/<?= ($leadVisual) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://www.cursorpub.me/">
    <meta property="twitter:url" content="https://www.cursorpub.me/">
    <meta name="twitter:title" content="<?= $title ?> | CURSOR eConnect">
    <meta name="twitter:description" content="<?= $leadText ?>">
    <meta name="twitter:image" content="./../resources/uploads/contents/<?= ($leadVisual) ?>">
    <link rel="shortcut icon" href="./../../resources/favicon.svg" type="image/x-icon">

    <!-- STYLESHEETS AND SCRIPTS -->
    <link rel="stylesheet" href="./../styles/style.css">
    <link rel="stylesheet" href="./../styles/tailwind.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- THEME COLOR -->
    <meta name="theme-color" content="#f59e0b">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black or black-translucent">
</head>

<body class="overflow-x-hidden">

    <?php include "./components/ui/header.php" ?>

    <div class="h-32"></div>

    <div class="flex flex-col items-center max-w-screen-xl mx-auto">
        <span class="px-6 py-3 font-medium border border-black rounded-full ">A.Y. 2022-2023</span>
        <h1 class="mt-4 font-bold text-7xl">Editorial Board and Staffs</h1>
    </div>

    <div class="h-16"></div>

    <div class="flex flex-col items-center w-full max-w-screen-xl mx-auto">
        <h2 class="mt-4 mb-8 text-4xl font-medium">Higher Editorial Board</h2>


        <div class="flex flex-row flex-wrap justify-center gap-y-8 gap-x-4">

            <a href="./staff.php?username=<?= $heb_eic['username'] ?>" class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $heb_eic['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $heb_eic['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Editor-in-Chief</span>
            </a>
            <a href="./staff.php?username=<?= $heb_ae['username'] ?>" class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $heb_ae['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $heb_ae['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Associate Editor</span>
            </a>
            <a href="./staff.php?username=<?= $heb_mea['username'] ?>" class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $heb_mea['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $heb_mea['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Managing Editor for Administration</span>
            </a>
            <a href="./staff.php?username=<?= $heb_meci['username'] ?>" class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $heb_meci['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $heb_meci['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Managing Editor for Community Involvement</span>
            </a>
            <a href="./staff.php?username=<?= $heb_merd['username'] ?>" class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $heb_merd['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $heb_merd['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Managing Editor for Administration</span>
            </a>
            <a href="./staff.php?username=<?= $heb_smef['username'] ?>" class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $heb_smef['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $heb_smef['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Senior Managing Editor for Finance</span>
            </a>
            <a href="./staff.php?username=<?= $heb_jmef['username'] ?>" class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $heb_jmef['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $heb_jmef['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Junior Managing Editor for Finance</span>
            </a>

        </div>
    </div>

    <div class="h-16"></div>

    <div class="flex flex-col items-center w-full max-w-screen-xl mx-auto">
        <h2 class="mt-4 mb-8 text-4xl font-medium">Section Editors</h2>

        <div class="flex flex-row flex-wrap justify-center gap-y-8 gap-x-4">

            <a href="./staff.php?username=<?= $seh_ae['username'] ?>" class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $seh_ae['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $seh_ae['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Art Editor</span>
            </a>
            <a href="./staff.php?username=<?= $seh_fle['username'] ?>" class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $seh_fle['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $seh_fle['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Features and Lifestyle Editor</span>
            </a>
            <a href="./staff.php?username=<?= $seh_le['username'] ?>" class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $seh_le['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $seh_le['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Literary Editor</span>
            </a>
            <a href="./staff.php?username=<?= $seh_ncae['username'] ?>" class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $seh_ncae['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $seh_ncae['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">News and Current Affairs Editor</span>
            </a>

        </div>
    </div>

    <div class="h-16"></div>

    <div class="flex flex-col items-center w-full max-w-screen-xl mx-auto">
        <h2 class="mt-4 mb-8 text-4xl font-medium">Section Heads</h2>

        <div class="flex flex-row flex-wrap justify-center gap-y-8 gap-x-4">

            <a href="./staff.php?username=<?= $seh_hc['username'] ?>"  class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $seh_hc['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $seh_hc['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Head Cartoonist</span>
            </a>
            <a href="./staff.php?username=<?= $seh_hla['username'] ?>"  class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $seh_hla['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $seh_hla['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Head Layout Artist</span>
            </a>
            <a href="./staff.php?username=<?= $seh_hp['username'] ?>"  class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $seh_hp['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $seh_hp['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Head Photojournalistr</span>
            </a>
            <a href="./staff.php?username=<?= $seh_hve['username'] ?>"  class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $seh_hve['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $seh_hve['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Head Video Editor</span>
            </a>

        </div>
    </div>

    <div class="h-16"></div>

    <div class="flex flex-col items-center w-full max-w-screen-xl mx-auto">
        <h2 class="mt-4 mb-8 text-4xl font-medium">Staffs</h2>

        <div class="flex flex-row flex-wrap justify-center gap-y-8 gap-x-4">

            <?php 
                while ($row = mysqli_fetch_assoc($result_ms_c)) {
            ?>
            <a href="./staff.php?username=<?= $row['username'] ?>"  class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $row['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $row['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Cartoonist</span>
            </a>
            <?php 
                }
            ?>

            <?php 
                while ($row = mysqli_fetch_assoc($result_ms_la)) {
            ?>
            <a href="./staff.php?username=<?= $row['username'] ?>"  class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $row['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $row['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Layout Artist</span>
            </a>
            <?php 
                }
            ?>

            <?php 
                while ($row = mysqli_fetch_assoc($result_ms_p)) {
            ?>
            <a href="./staff.php?username=<?= $row['username'] ?>"  class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $row['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $row['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Photojournalist</span>
            </a>
            <?php 
                }
            ?>

            <?php 
                while ($row = mysqli_fetch_assoc($result_ms_sw)) {
            ?>
            <a href="./staff.php?username=<?= $row['username'] ?>"  class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $row['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $row['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Staff Writer</span>
            </a>
            <?php 
                }
            ?>

            <?php 
                while ($row = mysqli_fetch_assoc($result_ms_sd)) {
            ?>
            <a href="./staff.php?username=<?= $row['username'] ?>"  class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $row['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $row['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Sound Designer</span>
            </a>
            <?php 
                }
            ?>

            <?php 
                while ($row = mysqli_fetch_assoc($result_ms_ve)) {
            ?>
            <a href="./staff.php?username=<?= $row['username'] ?>"  class="flex flex-col items-center w-64 ">
                <img class="w-32 h-32 rounded-full" src="./../resources/uploads/editorial-board/<?= $row['image'] ?>">
                <h3 class="mt-4 text-xl font-semibold text-center"><?= $row['name'] ?></h3>
                <span class="mt-0.5 text-sm text-center">Video Editor</span>
            </a>
            <?php 
                }
            ?>

            




            

        </div>
    </div>

    <?php include "./components/ui/footer.php" ?>

</body>

<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<div id="fb-root"></div>

<div id="fb-customer-chat" class="fb-customerchat"></div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "109909348621946");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v15.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

</html>